<?php
// Archivo que muestra el formulario para restablecer la contraseña

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = $_GET['token'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="copyright" content="EugenioYa">
        <meta name="robots" content="noindex">
        <!-- === Links === -->
        <link rel="stylesheet" href="../style/normalize.css">
        <link rel="stylesheet" href="style_form.css">
        <link rel="shortcut icon" href="../imagenes/logo/icon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Restablecer Contraseña</title>
    </head>
    <body>
        <section class="sec_inicio">
            <form action="validaciones/reset_password_process.php" method="post" class="form">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <h2 class="h2_form">Nueva Contraseña</h2>
                <input type="password" name="new_password" placeholder="Nueva Contraseña" required class="inp_form" autocomplete="off">
                <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required class="inp_form" autocomplete="off">
                <input type="submit" value="Restablecer Contraseña" class="inp_sub">
            </form>
        </section>
    </body>
    </html>
    <?php
}
?>
