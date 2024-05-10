<?php
// Vamos a importar los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$confirm_password = $_POST['password_1'];
$categoria = $_POST['rubro'];
$profesion = $_POST['oficio'];

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

    // Cifrar la contraseña con hash y salt
    function hash_password($password) {
        // Generar un salt aleatorio
        $salt = random_bytes(16);

        // Aplicar un hash a la contraseña combinada con el salt
        $hashed_password = hash('sha256', $password . $salt);

        // Devolver el hash y el salt como array asociativo
        return array(
            'hashed_password' => $hashed_password,
            'salt' => $salt
        );
    }

    // Obtener el hash y el salt de la contraseña
    $hashed_data = hash_password($password);
    $hashed_password = $hashed_data['hashed_password'];
    $salt = $hashed_data['salt'];

    // Procesar los datos
    // Utiliza la función mysqli_real_escape_string para evitar la inyección de SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $correo = mysqli_real_escape_string($conn, $correo);
    $categoria = mysqli_real_escape_string($conn, $categoria);
    $profesion = mysqli_real_escape_string($conn, $profesion);

    // Prepara la consulta SQL
    $query = "INSERT INTO usuario (nombre, correo, acceso, salt, categoria, profesion) VALUES ('$nombre', '$correo', '$hashed_password', '$salt', '$categoria', '$profesion')";

    // Ejecutar la consulta
    if ($conn->query($query) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "Las contraseñas no coinciden";
}
?>
