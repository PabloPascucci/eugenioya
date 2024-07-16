<?php
// Archivo que envía token al correo del usuario para recuperar la contraseña

require_once("../../server_.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Conectar con la BD
    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verificar si el correo existe en la base de datos
    $sql = "SELECT id_usuario FROM usuario WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); // Generar token
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token válido por 1 hora

        // Insertar token en la base de datos
        $sql = "INSERT INTO pasword_resets (email, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $email, $token, $expiry);
        $stmt->execute();
        
        // Enviar correo electrónico con el token
        $reset_link = "https://eugenioya.com/formularios/reset_password_form.php?token=" . $token;
        $subject = "Restablecimiento de contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: " . $reset_link;
        $headers = 'From: no-reply@eugenioya.com' . "\r\n" .
                   'Reply-To: no-reply@eugenioya.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($email, $subject, $message, $headers);

        header("Location: ../../pantallas/error.php?e=pasword&url-redirect-user=../index.html");
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}
?>