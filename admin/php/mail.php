<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../php_mailer/Exception.php';
    require '../../php_mailer/PHPMailer.php';
    require '../../php_mailer/SMTP.php';

   // Conexión al servidor
    require_once("../../server_.php");

    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        header("Location: ../../pantallas/error.php?error=banner-error-admin-ad&url-redirect-user=$url_redirect");
        exit();
    }

    // Recibir los datos del formulario
    $asunto = $_POST['asunto'];
    $encabezado = $_POST['cuerpo_1'];
    $mensaje = $_POST['cuerpo_2'];
    $destino = $_POST['destinatario'];

    // Procesar la imagen
    $imagen = $_FILES['banner_1'];
    $imagen_content = file_get_contents($imagen['tmp_name']);
    $imagen_data = base64_encode($imagen_content);
    $imagen_type = $imagen['type'];

    // Validar que la imagen esté bien procesada
    if (empty($imagen_data) || empty($imagen_type)) {
        echo "Error en el archivo de imagen.";
        exit();
    }

    $correos_destino = [];

    if (is_numeric($destino) && $destino > 0 && $destino < 22) {
        $sql = "SELECT correo FROM usuario WHERE categoria = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $destino);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $correos_destino[] = $row['correo'];
            }
        }
        $stmt->close();
    } elseif ($destino === "prueba") {
        $correos_destino[] = "pascuccipablo20@gmail.com";
    }

    $html_content = "
    <html>
    <body>
        <h1>$encabezado</h1>
        <p>
            <img src='data:$imagen_type;base64,$imagen_data' alt='Banner' style='width:100%;'>
        </p>
        <p>$mensaje</p>
        <br><br>
        <p>Si tienes dudas comunicate con soporte al correo: soporte@eugenioya.com</p>
        <br><br>
        <p>
            <a href='https://eugenioya.com/' style='display:inline-block;padding:10px 20px;background-color:#007BFF;color:white;text-decoration:none;border-radius:5px;'>Visita nuestro Sitio Web</a>
        </p>
        <br><br>
        <p>
            <a href='https://www.instagram.com/_eugenioya/'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/800px-Instagram_logo_2022.svg.png' style='padding:5px;width:30px;'></a>
        </p>
    </body>
    </html>";

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Reemplaza con tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'info@eugenioya.com'; // Reemplaza con tu correo
        $mail->Password = 'info_Eugenioya1'; // Reemplaza con tu contraseña
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

         // Remitente y destinatarios
        $mail->setFrom('info@eugenioya.com', 'EugenioYa');
        foreach ($correos_destino as $email) {
            $mail->addAddress($email);
        }

        // Contenido del correo
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; // Aseguramos que la codificación sea UTF-8
        $mail->Subject = $asunto;
        $mail->Body = $html_content;

        // Enviar el correo
        $mail->send();
        echo 'Correo(s) enviado(s) con éxito';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

    $conn->close();
?>