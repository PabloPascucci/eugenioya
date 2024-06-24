<?php
    // Iniciamos Sesión
    session_start();

    // Traemos a través de session el id del usuario.
    if($_SESSION){
        $user_id = $_SESSION['user_loged_id'];
    }
?>
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
    <meta name="description" content="En la bolsa de trabajo de EugenioYa podrás encontrar ese trabajo que te impulsará en tu desarrollo profesional.">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="index,all,follow">

<!-- === Links === -->
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/estilo_1.css">
    <link rel="shortcout icon" href="imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
<!-- ==>> Scripts de Google <<== -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6B9S4R8L22"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'G-6B9S4R8L22');
    </script>
    <title>Bolsa de Trabajo</title>
</head>
<body>

    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
        <img src="imagenes/logo/logo_nav.png" alt="EugenioYa.com" title="EugenioYa" class="logo_nav">
        <nav class="nav">
            <input type="checkbox" name="check" id="check">
                <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars"></i>
                </label>
            <ul class="barr_nav">
                <img src="imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
                <a href="index.html" class="a_nav">Inicio</a>
                <a href="categorias/indice.php" class="a_nav">Oficios</a>
                <a href="formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                <a href="formularios/registrar.php" class="a_nav">Regístrate</a>
                <a href="bolsa-de-trabajo.php" class="a_nav_1">Bolsa de Trabajo</a>
            </ul>
        </nav>
        </div>
    <?php } else { ?>
        <div class="div_nav">
            <img src="imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <img src="imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
                    <?php if ($user_id === '1') {?>
                        <a href="admin/admin.php" class="a_nav">Perfil</a>
                    <?php } else { ?>
                        <a href="perfiles/perfil.php" class="a_nav">Perfil</a>
                    <?php } ?>
                    <a href="indice.php" class="a_nav">Oficios</a>
                    <a href="bolsa-de-trabajo.php" class="a_nav_1">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <section class="sec_bolsa">
        <?php
            $url_redirect = urlencode("../bolsa-de-trabajo.php");
            // Conectar a la BD
            require_once("server_.php");
            $conn = new mysqli($server, $user, $password, $db_name);
            
            // Interceptar errores de conexión
            if($conn->connect_error) {
                header("Location: pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect");
                exit();
            }

            // Preparar las query
            $sql = "SELECT * FROM bolsa";
            $query = mysqli_query($conn, $sql);

            // Verificar que haya contenido en la tabla
            if($query->num_rows > 0) {
                while($row = mysqli_fetch_array($query)) {
                    $titulo = $row['empresa'];
                    $cuerpo = $row['texto'];
                    $fecha = $row['created_at']; ?>
                    <article class="art_bolsa">
                        <h5 class="h5_bolsa"><?php echo $titulo ?></h5>
                        <p class="cuerpo_bolsa"><?php echo $cuerpo ?></p>
                        <p class="fecha_bolsa"><?php echo $fecha ?></p>
                    </article>
                <?php }
            } else { ?>
                <article class="art_empty">
                    <p class="p_bolsa">Por el momento no tenemos clasificados en nuestra bolsa de trabajo</p>
                </article>
            <?php }
            $conn->close();
        ?>
        <p class="p_bolsa">Si quieres publicar un clasificado envía un correo a: <span class="span_bolsa">info@eugenioya.com</span> con el asunto: <span class="span_bolsa">Clasificado Laboral</span></p>
    </section>

    <footer class="footer">
        <div class="div_footer">
            <article class="art_div_footer">
                <img src="imagenes/logo/logo_footer.png" alt="EugenioYa.com" title="EugenioYa" class="logo_footer">
            </article>
            <article class="art_div_footer">
                <a href="nosotros.html" class="a_footer">Sobre Eugenio</a>
                <a href="nosotros.html" class="a_footer">Contacto</a>
                <a href="formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                <a href="formularios/iniciar.php" class="a_footer">Inicia Sesión</a>
                <a href="categorias/indice.php" class="a_footer">Oficios</a>
            </article>
            <article class="art_div_footer">
                <a href="politicas-de-privacidad.html" class="a_footer">Política de Privacidad</a>
                <a href="terminos-y-condiciones.html" class="a_footer">Términos y Condiciones</a>
            </article>
            <article class="art_div_footer">
                <img src="imagenes/avatar/eugenio_footer.png" alt="EugenioYa.com" title="EuGENIO" class="genio_footer">
            </article>
        </div>
        <div class="div1_footer">
            <p class="p_footer_ubi">San Martín de los Andes, Neuquén, Argentina</p>
            <p class="p_footer_legal">EugenioYa © 2024 | Todos los Derechos Reservados</p>
        </div>
    </footer>
    
</body>
</html>