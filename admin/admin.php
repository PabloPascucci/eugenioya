    <?php
        // Iniciamos Sesión
        session_start();

        // Traemos a través de session el id del usuario.
        $admin = $_SESSION['user_loged_id'];
        if($admin !== 1) {
            header("Location: ../categorias/indice.php");
        }
        
        // Conexión con la BD
        require_once("../server_.php");

        $conn = new mysqli($server, $user, $password, $db_name);

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
    <link rel="stylesheet" href="../perfiles/style_perfil_1_7.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
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
                <img src="" title="Nombre" class="logo">
                <a href="https://analytics.google.com/analytics/web/provision/?hl=es#/p445202277/reports/intelligenthome" class="a_nav" target="_BLANK">Google Analytics</a>
                <a href="https://search.google.com/search-console?resource_id=https%3A%2F%2Feugenioya.com%2F" class="a_nav" target="_BLANK">Google Search Console</a>
                <a href="banner.php" class="a_nav">Ver Banners</a>
                <a href="bolsa-de-trabajo.php" class="a_nav">Editar Bolsa de Trabajo</a>
                <a href="../perfiles/configuraciones.php?edicion=1" class="a_nav">Editar Perfil</a>
                <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                <a href="../categorias/indice.php" class="a_nav">Oficios</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <img src="../imagenes/avatar/eugenio.png" class="img_perfil">
        <div class="div_perfil">
            <p class="user_name">EugenioYa</p>
            <p class="user_category">Perfil de Admin</p>
        </div>
    </header>

    <!-- Sección para configuraciones de la página -->
    <section class="sec">
        <article class="art_config">
            <div id="cant_user">Usuarios Registrados: </div>
            <button id="userCountButton">Usuarios Registrados</button>
        </article>
        <article class="art_config">
            <form action="php/banners.php" method="post" enctype="multipart/form-data" class="form_admin">
                <fieldset>
                    <legend>Banners Propios</legend>
                    <input type="file" name="banner_eugenio">
                </fieldset>
                <fieldset>
                    <legend>Banners Publicitarios</legend>
                    <input type="file" name="banner_ads">
                </fieldset>
                <input type="submit" value="Cargar Banner" class="button_admin">
            </form>
        </article>
        <article class="art_config">
            <form action="php/bolsa-de-trabajo.php" method="post" class="form_admin">
                <fieldset class="field_admin">
                    <legend>Agregar trabajo a la bolsa</legend>
                    <input type="text" name="titulo" placeholder="Titulo" automplete="off" class="input_admin">
                    <textarea name="cuerpo" placeholder="Cuerpo del Clasificado" class="text_admin"></textarea>
                </fieldset>
                <input type="submit" value="Cargar" class="button_admin">
            </form>
        </article>
    </section>

    <form action="php/mail.php" method="post" enctype="multipart/form-data" class="form_admin">
        <fieldset class="field_admin">
            <legend>Destinatario</legend>
            <select name="destinatario">
                <option value="1">Usuarios</option>
                <option value="2">Artistas</option>
                <option value="3">Belleza y Estética</option>
                <option value="4">Carpintería</option>
                <option value="5">Cerrajería</option>
                <option value="6">Construcción y Reformas</option>
                <option value="7">Cuidado del Hogar y Limpieza</option>
                <option value="8">Cuidado Infantil y Acomp. Hospitalario</option>
                <option value="9">Educación y Tutoría</option>
                <option value="10">Electricistas</option>
                <option value="11">Fotógrafo</option>
                <option value="12">Gasistas</option>
                <option value="13">Jardinería y Paisajismo</option>
                <option value="14">Plomería</option>
                <option value="15">Reparación de Automóviles y Mecánica</option>
                <option value="16">Reparación de Celulares y PC</option>
                <option value="17">Reparación de Electrodomésticos</option>
                <option value="18">Servicios de Catering y Eventos</option>
                <option value="19">Servicios de Diseño Gráfico y Web</option>
                <option value="20">Servicios de Marketing y Publicidad</option>
                <option value="21">Transporte y Mudanzas</option>
                <option value="prueba">Correo de Prueba</option>
            </select>
            <input type="text" name="asunto" placeholder="Asunto" class="inp_asunto" autocomplete="off">
            <input type="text" name="cuerpo_1" placeholder="Encabezado" class="inp_encabezado" autocomplete="off">
            <input type="file" name="banner_1">
            <input type="text" name="cuerpo_2" placeholder="cuerpo del mensaje" class="cuerpo" autocomplete="off">
        </fieldset>
        <input type="submit" value="ENVIAR" class="button_admin">
    </form>
    
    <script src="js/admin.js" defer></script>
    
    <a href="../formularios/validaciones/inicio.php?session=1" class="button_admin">Cerrar Sesión</a>
    
    
</body>
</html>