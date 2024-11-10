<?php
// Vamos a importar los datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$password_user = isset($_POST['password']) ? $_POST['password'] : '';
$confirm_password = isset($_POST['password_1']) ? $_POST['password_1'] : '';
$localidad = $_POST['city'];
$categoria = $_POST['rubro'];
$profesion = isset($_POST['oficio']) ? $_POST['oficio'] : 'usuario';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

// Verificar que los datos no esten vacios
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($password_user) || empty($confirm_password)) {
        header("Location: ../registrar.php?error=empty-input");
        exit();
    } elseif ($categoria != "1" && empty($telefono)) {
        header("Location: ../registrar.php?error=empty-input");
        exit();
    } else {
// Validar que la contraseña sea similar
        if ($password_user === $confirm_password) {
// Conectar con la base de datos
            require_once("../../server_.php");

            $conn = mysqli_connect($server,$user,$password,$db_name);
            
// Verificar la conexión
            if ($conn->connect_error){
                die("Conexión Fallida: " . $conn->connect_error);
            }

            $hashed_password = password_hash($password_user, PASSWORD_BCRYPT);

// Procesar los datos
// Utiliza la función mysqli_real_escape_string para evitar la inyección de SQL
            $nombre = mysqli_real_escape_string($conn, $nombre);
            $apellido = mysqli_real_escape_string($conn, $apellido);
            $correo = mysqli_real_escape_string($conn, $correo);
            $categoria = mysqli_real_escape_string($conn, $categoria);
            $profesion = mysqli_real_escape_string($conn, $profesion);
            $telefono = mysqli_real_escape_string($conn, $telefono);
            $localidad = mysqli_real_escape_string($conn, $localidad);

// Prepara la consulta SQL
            $query = "INSERT INTO usuario (nombre, correo, acceso, categoria, profesion, telefono, ciudad, apellido) VALUES ('$nombre', '$correo', '$hashed_password', '$categoria', '$profesion', '$telefono', '$localidad', '$apellido')";

// ==> Verificar que la cuenta con el correo sea nueva y no repetida <==
            $query_very = "SELECT * FROM usuario WHERE correo = '$correo'";
            $resultado = $conn->query($query_very);

            if($resultado->num_rows > 0) {
// El usuario con el correo ya existe
                header("Location: ../iniciar.php?exist=1&correo=$correo");
            }else {
// El usuario es nuevo
// Ejecutar la consulta y crear carpeta de imagenes
                if ($conn->query($query) === TRUE) {
                    if($profesion === "usuario") {
                        header("Location: zone_register.php?category=user&email=$correo&name=$nombre&location=$localidad");
                        exit();
                    } else {
                        header("Location: zone_register.php?category=professional&email=$correo&name=$nombre&location=$localidad");
                        exit();
                    }
                } else {
                    echo "Error al registrar usuario: " . $conn->error;
                }
            }

// Cierra la conexión
            $conn->close();
        } else {
            header("Location:../registrar.php?error=password-mismatch");
        }
    }
?>
