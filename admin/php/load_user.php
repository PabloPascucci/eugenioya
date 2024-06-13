<?php
// Archivo encargado de leer cuantos usuarios estan registrados

// Conectar con la BD
require_once("../../server_.php");

$conn = new mysqli($server, $user, $password, $db_name);

$url_redirect = urlencode("../admin/admin.php");

// Verificar la conexión
if($conn->connect_error) {
    header("Location: ../../pantallas/error.php?e=cantidad-de-usuarios&url-redirect-user=$url_redirect");
    exit();
}

// Consulta para obtener el número de usuarios
$sql = "SELECT COUNT(*) as user_count FROM usuario";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['user_count'];
} else {
    echo "0";
}

$conn->close();
?>
