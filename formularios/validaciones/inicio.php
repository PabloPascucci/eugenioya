<?php
// recibimos los datos del formulario de inicio de sesión
$correo = $_POST['correo'];
$password = $_POST['password'];

// Conexión a la base de datos
$server = "localhost";
$server_user = "root";
$server_password = "";
$server_db_name = "eugenioya";
$conn = mysqli_connect($server, $server_user, $server_password, $server_db_name);

// Verificar que la cuenta con el correo exista dentro de la base de datos
$query_very = "SELECT * FROM usuario WHERE correo = '$correo'";
$resultado = mysqli_query($conn, $query_very);

if ($resultado->num_rows > 0) {
    // El usuario existe en la BD, por ende verificaremos las credenciales de acceso
    $sql = "SELECT acceso from usuario WHERE correo = '$correo'";
    $resultado_acceso = mysqli_query($conn, $sql);

    if ($resultado_acceso->num_rows == 1) {
        $row = mysqli_fetch_assoc($resultado_acceso);
        $hashed_password_db = $row['acceso'];

        // Verificación si la contraseña introducida coincide con el hash almacenado
        if (password_verify($password, $hashed_password_db)) {
            // La contraseña es correcta, iniciar sesión
            echo "Inicio de sesión exitoso";
        } else {
            // La contraseña es incorrecta
            header("Location: ../iniciar.php?wrong=1");
            exit; // Detener la ejecución del script después de la redirección
        }
    }
} else {
    // El usuario es nuevo
    header("Location: ../registrar.php?new=1");
    exit; // Detener la ejecución del script después de la redirección
}

// Cierra la conexión
mysqli_close($conn);
?>