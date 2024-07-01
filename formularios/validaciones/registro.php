<?php
// Vamos a importar los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password_user = $_POST['password'];
$confirm_password = $_POST['password_1'];
$categoria = $_POST['rubro'];
$profesion = isset($_POST['oficio']) ? $_POST['oficio'] : 'usuario';
$contacto = isset($_POST['telefono']) ? $_POST['telefono'] : 0;

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
    $correo = mysqli_real_escape_string($conn, $correo);
    $categoria = mysqli_real_escape_string($conn, $categoria);
    $profesion = mysqli_real_escape_string($conn, $profesion);
    $telefono = mysqli_real_escape_string($conn, $telefono);

    // Prepara la consulta SQL
    $query = "INSERT INTO usuario (nombre, correo, acceso, categoria, profesion, telefono) VALUES ('$nombre', '$correo', '$hashed_password', '$categoria', '$profesion', '$telefono')";

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
            header("Location: ../iniciar.php?exist=2&nombre=$nombre");
        } else {
            echo "Error al registrar usuario: " . $conn->error;
        }
    }

    // Cierra la conexión
    $conn->close();
} else {
    header("Location:../registrar.php?wrong=1");
}
?>
