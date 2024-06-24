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
    <title>Banners</title>
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
                <a href="admin.php" class="a_nav">Perfil</a>
                <a href="configuraciones.php?edicion=1" class="a_nav">Editar Perfil</a>
                <a href="----" class="a_nav">Bolsa de Trabajo</a>
                <a href="../categorias/indice.php" class="a_nav">Oficios</a>
            </ul>
        </nav>
    </div>

    <?php
        $url_redirect = urlencode("../admin/admin.php");
        // Conectar a la BD
        require_once("../server_.php");

        $conn = new mysqli($server, $user, $password, $db_name);

        if($conn->connect_error) {
            header("Location:../pantallas/error.php?e=error-show-banner&url-redirect-user=$url_redirect");
            exit();
        }

        // Leer datos de la tabla banner para sacar los banners propios
        $sql_banner_propios = "SELECT * FROM banner WHERE tipo_banner = 'propio'";
        $query_banner_propios = mysqli_query($conn, $sql_banner_propios);

        if ($query_banner_propios->num_rows > 0) { ?>
            <p>Banners Propios</p>
            <?php while ($row_propios = mysqli_fetch_array($query_banner_propios)) {
                $id = $row_propios['id'];
                $url = $row_propios['url_banner']; ?>
                <article>
                    <img src="<?php echo $url ?>" title="Banner Propio" class="img">
                    <a href="php/delete_banner.php?id=<?php echo $id ?>&url=<?php echo urlencode($url) ?>">Eliminar Banner</a>
                </article>
            <?php }
        } else {
            echo "No hay banners propios";
        }

        // Leer datos de la tabla banner para sacar los banners ads
        $sql_ad_banner = "SELECT * FROM banner WHERE tipo_banner = 'advertisement'";
        $query_ad_banner = mysqli_query($conn, $sql_ad_banner);

        if ($query_ad_banner->num_rows > 0) { ?>
            <p>Banners Publicitarios</p>
            <?php while ($row_ad = mysqli_fetch_array($query_ad_banner)) {
                $id_ad = $row_ad['id'];
                $url_ad = $row_ad['url_banner']; ?>
                <article>
                    <img src="<?php echo $url_ad ?>" title="Banner Publicitario" class="img">
                    <a href="php/delete_banner.php?id=<?php echo $id_ad ?>&url=<?php echo urlencode($url_ad) ?>">Eliminar Banner</a>
                </article>
            <?php }
        } else {
            echo "No hay banners ads";
        }

        $conn->close();
    ?>
    
</body>
</html>