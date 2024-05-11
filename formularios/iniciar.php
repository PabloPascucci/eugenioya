<!DOCTYPE html>
<html lang="en">
<head>
    <!-- === Etiquetas meta === -->
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="spanish">
    <meta name="audience" content="all">
    <meta name="category" content="service">
    <meta name="keywords" content="electricistas, plomeros, fotografos, oficios, en san martin de los andes, gasistas">
    <meta name="description" content="EugenioYa.com, tu puente directo a un mundo de servicios. Encuentra todo lo que necesitas en un solo lugar.">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="index,all,follow">

<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style_form.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Inicia Sesión</title>
</head>
<body>

    <header class="header_inicio">
        <img src="" alt="">
        <h1 class="h1_inicio">EugenioYa</h1>
    </header>

    <?php
        if($_SERVER['REQUEST_METHOD']=$_GET) {
            $exist = $_GET['exist'];
            $correo = $_GET['correo'];
            echo "<p class='success'>El usuario con el correo ". $correo . " ya existe.";
        }
    ?>

    <section class="sec_inicio">
        <form action="validaciones/inicio.php" method="post" class="form">
            <h2 class="h2_form">Inicia Sesión</h2>
            <input type="email" name="correo" placeholder="Correo Electrónico" required class="inp_form">
            <input type="password" name="password" placeholder="Contraseña" required class="inp_form">
            <input type="submit" value="INGRESAR" class="inp_sub">
        </form>
        <a href="registrar.php" class="a_form">Crea una Cuenta</a>
        <a href="----" class="a_form">¿Has olvidado tu contraseña?</a>
    </section>
    
</body>
</html>