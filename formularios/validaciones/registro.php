<?php
// Vamos a importar los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$confirm_password = $_POST['password_1'];
$categoria = $_POST['rubro'];
$profesion = isset($_POST['oficio']) ? $_POST['oficio'] : 'usuario';

// Validar que la contraseña sea similar
if ($password === $confirm_password) {
    // Conectar con la base de datos
    $server = "localhost";
    $server_user = "root";
    $server_password = "";
    $server_db_name = "eugenioya";

    $conn = mysqli_connect($server,$server_user,$server_password,$server_db_name);
    
    // Verificar la conexión
    if ($conn->connect_error){
        die("Conexión Fallida: " . $conn->connect_error);
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Procesar los datos
    // Utiliza la función mysqli_real_escape_string para evitar la inyección de SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $correo = mysqli_real_escape_string($conn, $correo);
    $categoria = mysqli_real_escape_string($conn, $categoria);
    $profesion = mysqli_real_escape_string($conn, $profesion);

    // Prepara la consulta SQL
    $query = "INSERT INTO usuario (nombre, correo, acceso, categoria, profesion) VALUES ('$nombre', '$correo', '$hashed_password', '$categoria', '$profesion')";

    // ==> Verificar que la cuenta con el correo sea nueva y no repetida <==
    $query_very = "SELECT * FROM usuario WHERE correo = '$correo'";
    $resultado = $conn->query($query_very);

    if($resultado->num_rows > 0) {
        // El usuario con el correo ya existe
        header("Location: ../iniciar.php?exist=1&correo=$correo");
    }else {
        // El usuario es nuevo
        // Ejecutar la consulta
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
