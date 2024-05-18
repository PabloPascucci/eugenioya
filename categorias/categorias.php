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
    <meta name="description" content="Encuentra en este indice el profesional que estas necesitando. EugenioYa.com">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex,follow">
<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/estilo_1.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title><?php echo $profesion ?></title>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        $categoria = $_GET['profesion'];
        if($categoria == '2'){
            $categoria_definida = "Electricista";
        }elseif($categoria == '3'){
            $categoria_definida = "Plomerìa";
        }elseif($categoria == '4'){
            $categoria_definida = "Gasista";
        }elseif($categoria == '5'){
            $categoria_definida = "Reparación de Celulares y PC";
        }elseif($categoria == '6'){
            $categoria_definida = "Fotógrafo";
        }elseif($categoria == '7'){
            $categoria_definida = "Artista";
        }elseif($categoria == '8'){
            $categoria_definida = "Construcción y Reformas";
        }elseif($categoria == '9'){
            $categoria_definida = "Jardinería y Paisajismo";
        }elseif($categoria == '10'){
            $categoria_definida = "Cuidado del Hogar y Limpieza";
        }elseif($categoria == '11'){
            $categoria_definida = "Servicios de Catering y Eventos";
        }elseif($categoria == '12'){
            $categoria_definida = "Educación y Tutoría";
        }elseif($categoria == '13'){
            $categoria_definida = "Servicios de Marketing y Publicidad";
        }elseif($categoria == '14'){
            $categoria_definida = "Belleza y Estética";
        }elseif($categoria == '15'){
            $categoria_definida = "Transporte y Mudanza";
        }elseif($categoria == '16'){
            $categoria_definida = "Servicios de Diseño Gráfico y Web";
        }elseif($categoria == '17'){
            $categoria_definida = "Reparación de Electrodomésticos";
        }elseif($categoria == '18'){
            $categoria_definida = "Carpintería";
        }elseif($categoria == '19'){
            $categoria_definida = "Reparación de Automóviles y Mecánica";
        }elseif($categoria == '20'){
            $categoria_definida = "Cerrajería";
        }elseif($categoria == '21'){
            $categoria_definida = "Ñineras/os";
        }else{
            header("Location: indice.html");
        }

        // Conectar con la BD de usuarios
        $server = "localhost";
        $user_server = "root";
        $user_password = "";
        $server_db_name = "eugenioya";

        $conn = mysqli_connect($server,$user_server,$user_password,$server_db_name)

        // Query para extraer datos de los perfiles de los usuarios
        $sql_perfil_publico = "SELECT * FROM usuario WHERE categoria = '$categoria'";
        $query_perfil_publico = mysqli_query($conn,$sql_perfil_publico);

        if($query_perfil_publico->num_rows > 0) { ?>
        <section>
        <?php
            while ($row = mysqli_fetch_array($query_perfil_publico)) {
                $usuario = $row['nombre'];
                $profesion = $row['profesion'];
                $sobre_usuario = $row['sobre_mi'];
                $zona = $row['barrio'];
                $ruta = $row['foto_perfil'];
                $disponibilidad = $row['horas'];
                ?>
                <article class="art_publicaciones">
                    <div class="div_titulo">
                        <img src="../perfiles/imagenes/<?php echo $ruta ?>" alt="<?php echo $nombre ?>" title="<?php echo $nombre ?>" class="img_publicacion">
                    </div>
                </article>
                <?php 
            }
        }
    }
    ?>
        </section>
</body>