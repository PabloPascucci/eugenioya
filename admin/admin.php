<?php
        // Iniciamos Sesión
        session_start();

        // Traemos a través de session el id del usuario.
        $admin = $_SESSION['user_loged_id'];
        if($admin !== '1') {
            header("Location: ../categorias/indice.php");
        }
        
        // Conexión con la BD
        $server = "localhost";
        $server_user_name = "root";
        $server_password = "";
        $data_base_name = "eugenioya";

        $conn = mysqli_connect($server,$server_user_name,$server_password,$data_base_name);

        if(!$_SESSION){
            header("Location: ../formularios/iniciar.php");
            exit();
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
    <meta name="description" content="EugenioYa.com, tu puente directo a un mundo de servicios. Encuentra todo lo que necesitas en un solo lugar.">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex,follow">

<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../perfiles/style_perfil.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
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
    <title>EugenioYa</title>
</head>
<body>

    <div class="div_nav">
        <nav class="nav">
            <input type="checkbox" name="check" id="check">
                <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars"></i>
                </label>
            <ul class="barr_nav">
                <!-- <img src="" title="Nombre" class="logo"> -->
                <a href="https://analytics.google.com/analytics/web/provision/?hl=es#/p445202277/reports/intelligenthome" class="a_nav" target="_BLANK">Google Analytics</a>
                <a href="https://search.google.com/search-console?resource_id=https%3A%2F%2Feugenioya.com%2F" class="a_nav" target="_BLANK">Google Search Console</a>
                <a href="banner.php" class="a_nav">Ver Banners</a>
                <a href="bolsa-de-trabajo.php" class="a_nav">Editar Bolsa de trabajo</a>
                <a href="configuraciones.php?edicion=1" class="a_nav">Editar Perfil</a>
                <a href="----" class="a_nav">Bolsa de Trabajo</a>
                <a href="../categorias/indice.php" class="a_nav">Oficios</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <img src="../imagenes/user_icon.png" class="img_perfil">
        <div class="div_perfil">
            <p class="user_name">EugenioYa</p>
            <p class="user_category">Perfil de Admin</p>
        </div>
    </header>

    <!-- Sección para configuraciones de la página -->
    <section>
        <article>
            <div id="cant_user"></div>
            <button id="userCountButton">Usuarios Registrados</button>
        </article>
        <article>
            <form action="php/banners.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Banners Propios</legend>
                    <input type="file" name="banner_eugenio">
                </fieldset>
                <fieldset>
                    <legend>Banners Publicitarios</legend>
                    <input type="file" name="banner_ads">
                </fieldset>
                <input type="submit" value="Cargar Banner">
            </form>
        </article>
        <article>
            <form action="php/bolsa-de-trabajo.php" method="post">
                <fieldset>
                    <legend>Agregar trabajo a la bolsa</legend>
                    <input type="text" name="titulo" placeholder="Titulo" automplete="off">
                    <textarea name="cuerpo" placeholder="Cuerpo del Clasificado"></textarea>
                    <input type="submit" value="Cargar">
                </fieldset>
            </form>
        </article>
    </section>
    
    <script src="js/admin.js" defer></script>
    
    <a href="../formularios/validaciones/inicio.php?session=1">Cerrar Sesión</a>
    
    
</body>
</html>