<?php
session_start();

// Recibimos los datos del formulario de inicio de sesión
$correo = $_POST['correo'];
$password_user = $_POST['password'];

// Conexión a la base de datos
require_once("../../server_.php");

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Tiempo límite y máximo de intentos fallidos
$time_limit = 15 * 60; // 15 minutos
$max_attempts = 5;

// Contar intentos fallidos recientes
$query_attempts = "SELECT COUNT(*) AS attempts FROM login_attempts WHERE correo = ? AND attempt_time > NOW() - INTERVAL ? SECOND";
$stmt_attempts = $conn->prepare($query_attempts);
$stmt_attempts->bind_param('si', $correo, $time_limit);
$stmt_attempts->execute();
$result_attempts = $stmt_attempts->get_result();
$row_attempts = $result_attempts->fetch_assoc();

if ($row_attempts['attempts'] >= $max_attempts) {
    echo "Has alcanzado el número máximo de intentos. Inténtalo de nuevo más tarde.";
    header("Location: ../../pantallas/intentos.html");
    exit;
}

// Verificar que la cuenta con el correo exista dentro de la base de datos
$query_very = "SELECT * FROM usuario WHERE correo = ?";
$stmt = $conn->prepare($query_very);
$stmt->bind_param('s', $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // El usuario existe en la BD, por ende verificaremos las credenciales de acceso
    $sql = "SELECT acceso FROM usuario WHERE correo = ?";
    $stmt_acceso = $conn->prepare($sql);
    $stmt_acceso->bind_param('s', $correo);
    $stmt_acceso->execute();
    $resultado_acceso = $stmt_acceso->get_result();

    if ($resultado_acceso->num_rows == 1) {
        $row = $resultado_acceso->fetch_assoc();
        $hashed_password_db = $row['acceso'];

        // Verificación si la contraseña introducida coincide con el hash almacenado
        if (password_verify($password_user, $hashed_password_db)) {
            // La contraseña es correcta, iniciar sesión
            $sql_pre_sesion = "SELECT id_usuario FROM usuario WHERE correo = ?";
            $stmt_id = $conn->prepare($sql_pre_sesion);
            $stmt_id->bind_param('s', $correo);
            $stmt_id->execute();
            $result_id = $stmt_id->get_result();

            if ($result_id->num_rows === 1) {
                $row_id = $result_id->fetch_assoc();
                $id_usuario = $row_id['id_usuario'];
                $_SESSION['user_loged_id'] = $id_usuario;

                // Redirigir según el usuario
                if ($id_usuario === 1) {
                    header("Location: ../../admin/admin.php");
                    exit;
                } else {
                    header("Location: ../../perfiles/perfil.php");
                    exit;
                }
            } else {
                echo "Error: no se encontró el ID del usuario.";
                exit;
            }
        } else {
            // La contraseña es incorrecta, registrar intento fallido
            $sql_insert_attempt = "INSERT INTO login_attempts (correo) VALUES (?)";
            $stmt_insert = $conn->prepare($sql_insert_attempt);
            $stmt_insert->bind_param('s', $correo);
            $stmt_insert->execute();
            header("Location: ../iniciar.php?wrong=1");
            exit;
        }
    } else {
        echo "Error: múltiples registros de acceso encontrados.";
        exit;
    }
} else {
    // El usuario no existe o la sesión ha expirado
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $session = isset($_GET['session']) ? $_GET['session'] : '';
        if ($session == '1') {
            session_destroy();
            header("Location: ../../index.html");
            exit;
        }
    }
    // El usuario es nuevo
    header("Location: ../registrar.php?new=1");
    exit;
}

// Cierra la conexión
mysqli_close($conn);
?>