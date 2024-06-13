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
    <title>Bolsa de Trabajo</title>
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
            header("Location: ../../pantallas/error.php?e=error-conect-bolsa-de-trabajo&url-redirect-user=$url_redirect");
            exit();
        }

        // SQL
        $sql = "SELECT * FROM bolsa";
        $query = mysqli_query($conn, $sql);

        if($query->num_rows > 0) {
            while($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $titulo = $row['empresa'];
                $cuerpo = $row['texto'];
                $created_at = $row['created_at']; ?>
                <article>
                    <h5><?php echo $titulo ?></h5>
                    <p><?php echo $cuerpo ?></p>
                    <p><?php echo $created_at ?></p>
                    <a href="php/bolsa-de-trabajo.php?id=<?php echo $id ?>">Eliminar clasificado</a>
                </article>
            <?php }
        } else {
            echo "No hay clasificados";
        }

        $conn->close();
    ?>
    
</body>
</html>