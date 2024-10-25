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
    <link rel="stylesheet" href="../style/estilo_halloween.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
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
<?php session_start();
    if(!$_SESSION){?>
    <header class="header_inicio">
        <!-- <img src="../imagenes/avatar/eugenio.png" title="EugenioYa" class="img"> -->
        <img src="../imagenes/especial/genio-halloween.png" alt="EugenioYa.com" title="EuGENIO" class="img">
        <h1 class="h1_inicio">EugenioYa</h1>
    </header>

    <section class="sec_inicio">
        <?php
            if($_SERVER['REQUEST_METHOD']=$_GET) {
                $exist = isset($_GET['exist']) ? $_GET['exist'] : '';
                $correo = isset($_GET['correo']) ? $_GET['correo'] : '';
                $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
                $wrong = isset($_GET['wrong']) ? $_GET['wrong'] : '';
                if($exist === '1'){
                    echo "<p class='success'>El usuario con el correo ". $correo . " ya existe.";
                }
                if($exist === '2'){
                    echo "<p class='success'>Hola " . $nombre . " Bienvenido a Eugenioya, solo te queda iniciar sesión.";
                }
                if($wrong === '1'){
                    echo "<p class='wrong'>La contraseña es incorrecta";
                }
            }
        ?>
        <form action="validaciones/inicio.php" method="post" class="form">
            <h2 class="h2_form">Inicia Sesión</h2>
            <input type="email" name="correo" placeholder="Correo Electrónico" required class="inp_form" autocomplete="off">
            <input type="password" name="password" placeholder="Contraseña" required class="inp_form">
            <input type="submit" value="INGRESAR" class="inp_sub">
        </form>
        <a href="registrar.php" class="a_form">Crea una Cuenta</a>
        <a href="reset_password.php" class="a_form">¿Has olvidado tu contraseña?</a>
    </section><?php
    }else{
        header("Location: ../perfiles/perfil.php");
    }
?>

    <div class="div1_footer">
        <p class="p_footer_ubi" id="footer_ubi"></p>
        <p class="p_footer_legal" id="footer_legal"></p>
    </div>
    <script src="../JS/version_1_7.js"></script>
    
</body>
</html>