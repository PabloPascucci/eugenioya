<?php
// Archivo que procesa el restablecimiento de la contraseña

require_once("../../server_.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    // Conectar con la BD
    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verificar el token
    $sql = "SELECT email FROM pasword_resets WHERE token = ? AND expires_at > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Actualizar la contraseña del usuario
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET acceso = ? WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $hashed_password, $email);
        $stmt->execute();

        // Eliminar el token después de usarlo
        $sql = "DELETE FROM pasword_resets WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();

        echo "Tu contraseña ha sido restablecida exitosamente.";
    } else {
        echo "El token es inválido o ha expirado.";
    }

    $stmt->close();
    $conn->close();
}
?>