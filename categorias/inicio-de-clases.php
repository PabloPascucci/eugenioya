<?php
    // Iniciamos Sesión
    session_start();

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
    <meta name="description" content="Encuentra el mejor profesional para hacer un regalo de San Valentín"> 
    <!-- !!! Cambiar el description por cada categoria especial !!! -->
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex,follow">
<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style_1_7.css">
    <link rel="stylesheet" href="../style/estilo_1_7.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>¡Inicio de Clases!</title>

    <!-- ==== Cookie GA ==== -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
    </script>

    <script>
        function acceptCookies() {
            document.cookie = "consent=true; max-age=31536000; path=/";
            gtag('js', new Date());
            gtag('config', 'G-6B9S4R8L22');
            document.getElementById('cookie-banner').style.display = 'none';
        }

        function checkConsent() {
            return document.cookie.split(';').some((item) => item.trim().startsWith('consent='));
        }

        window.onload = function() {
            if (!checkConsent()) {
                document.getElementById('cookie-banner').style.display = 'block';
            } else {
                gtag('js', new Date());
                gtag('config', 'G-6B9S4R8L22');
            }
        }
    </script>
</head>
<body class="bdy_especial">
    
    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav"> -->
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <!-- <img src="../imagenes/logo/logo_nav.png" title="Nombre" class="logo"> -->
                    <a href="../index.html" class="a_nav">Inicio</a>
                    <a href="indice.php" class="a_nav_1">Oficios</a>
                    <a href="../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                    <a href="../formularios/registrar.php" class="a_nav">Regístrate</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                    <a href="../nosotros.html" class="a_nav">Contacto</a>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <div class="div_nav">
        <!-- <img src="../imagenes/logo/logo_nav.png" alt="EugenioYa.com" title="EugenioYa" class="logo_nav"> -->
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo"> -->
                    <?php if ($user_id === '1') {?>
                        <a href="../admin/admin.php" class="a_nav">Perfil</a>
                    <?php } else { ?>
                        <a href="../perfiles/perfil.php" class="a_nav">Perfil</a>
                    <?php } ?>
                    <a href="indice.php" class="a_nav_1">Oficios</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <section class="sec_categorias_dinamico">
    <?php
        require_once("../server_.php");
        $conn = mysqli_connect($server, $user, $password, $db_name);

        // Consulta para obtener los usuarios de la categoría 9
        $sql_usuario = "SELECT id_usuario, nombre, profesion, barrio, foto_perfil, horas, apellido FROM usuario WHERE categoria = '25' OR categoria = '9'";
        $query_usuario = mysqli_query($conn, $sql_usuario);

        while ($row = mysqli_fetch_array($query_usuario)) {
            $id_usuario = $row['id_usuario'];
            $usuario = $row['nombre'];
            $apellido = isset($row['apellido']) ? $row['apellido'] : '';
            $profesion = $row['profesion'];
            $zona = $row['barrio'];
            $ruta = isset($row['foto_perfil']) ? $row['foto_perfil'] : "../imagenes/user_icon.png";
            $disponibilidad = $row['horas'];

            // Consulta para obtener el total de rating_count del profesional
            $sql_total_rating_count = "SELECT SUM(rating_count) AS total_rating_count FROM average WHERE professional_id = $id_usuario";
            $query_total_rating_count = mysqli_query($conn, $sql_total_rating_count);
            $row_total_rating_count = mysqli_fetch_assoc($query_total_rating_count);
            $total_rating_count = $row_total_rating_count['total_rating_count'] ? $row_total_rating_count['total_rating_count'] : 0;

            // Consulta para obtener el promedio de puntuación del profesional
            $sql_promedio = "SELECT average_rating, rating_count FROM average WHERE professional_id = $id_usuario";
            $query_promedio = mysqli_query($conn, $sql_promedio);
            $row_promedio = mysqli_fetch_assoc($query_promedio);
            if ($row_promedio) {
                $promedio_rating = $row_promedio['average_rating'];
                $rating_count = $row_promedio['rating_count'];
            } else {
                $promedio_rating = 0;
                $rating_count = 0;
            }
    ?>
    <section>
        <article class="art_publicaciones">
            <div class="div_categoria">
                <img src="../perfiles/<?php echo $ruta ?>" alt="<?php echo $usuario ?>" title="<?php echo $usuario ?>" class="img_perfil">
            </div>
            <div class="div_categoria">
                <p class="p1_usuario"><?php echo $usuario . " " . $apellido; ?></p>
                <p class="p2_usuario"><?php echo $profesion ?></p>
            </div>
            <div class="div_categoria">
                <div class="div_stars">
                    <span class="stars" data-value="<?php echo $promedio_rating ?>"></span>
                    <p class="p_stars"><?php echo $total_rating_count ?></p>
                </div>
                <p class="p3_usuario"><?php echo $zona ?></p>
            </div>
            <div class="div_categoria">
                <?php 
                    if ($disponibilidad == '1') {
                        echo "<p class='p4_usuario'>disponible las 24hs</p>";
                    }
                ?>
            </div>
            <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
        </article>
    </section>
    <?php 
        // }

        // // Mostrar a los usuarios con ID 1 y 36
        // $sql_usuario_aparte = "SELECT id_usuario, nombre, profesion, barrio, foto_perfil, horas, apellido FROM usuario WHERE id_usuario IN ('1', '36')";
        // $query_usuario_aparte = mysqli_query($conn, $sql_usuario_aparte);

        // while ($row = mysqli_fetch_array($query_usuario_aparte)) {
        //     $id_usuario = $row['id_usuario'];
        //     $usuario = $row['nombre'];
        //     $apellido = isset($row['apellido']) ? $row['apellido'] : '';
        //     $profesion = $row['profesion'];
        //     $zona = $row['barrio'];
        //     $ruta = isset($row['foto_perfil']) ? $row['foto_perfil'] : "../imagenes/user_icon.png";
        //     $disponibilidad = $row['horas'];

        //     // Consulta para obtener el total de rating_count del profesional
        //     $sql_total_rating_count = "SELECT SUM(rating_count) AS total_rating_count FROM average WHERE professional_id = $id_usuario";
        //     $query_total_rating_count = mysqli_query($conn, $sql_total_rating_count);
        //     $row_total_rating_count = mysqli_fetch_assoc($query_total_rating_count);
        //     $total_rating_count = $row_total_rating_count['total_rating_count'] ? $row_total_rating_count['total_rating_count'] : 0;

        //     // Consulta para obtener el promedio de puntuación del profesional
        //     $sql_promedio = "SELECT average_rating, rating_count FROM average WHERE professional_id = $id_usuario";
        //     $query_promedio = mysqli_query($conn, $sql_promedio);
        //     $row_promedio = mysqli_fetch_assoc($query_promedio);
        //     if ($row_promedio) {
        //         $promedio_rating = $row_promedio['average_rating'];
        //         $rating_count = $row_promedio['rating_count'];
        //     } else {
        //         $promedio_rating = 0;
        //         $rating_count = 0;
        //     }
    ?>
    <!-- <section>
        <article class="art_publicaciones">
            <div class="div_categoria">
                <img src="../perfiles/<?php //echo $ruta ?>" alt="<?php //echo $usuario ?>" title="<?php //echo $usuario ?>" class="img_perfil">
            </div>
            <div class="div_categoria">
                <p class="p1_usuario"><?php //echo $usuario . " " . $apellido; ?></p>
                <p class="p2_usuario"><?php //echo $profesion ?></p>
            </div>
            <div class="div_categoria">
                <div class="div_stars">
                    <span class="stars" data-value="<?php //echo $promedio_rating ?>"></span>
                    <p class="p_stars"><?php //echo $total_rating_count ?></p>
                </div>
                <p class="p3_usuario"><?php //echo $zona ?></p>
            </div>
            <div class="div_categoria">
                <?php 
                    // if ($disponibilidad == '1') {
                    //     echo "<p class='p4_usuario'>disponible las 24hs</p>";
                    // }
                ?>
            </div>
            <a href="../perfiles/perfiles.php?profesional=<?php //echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
        </article>
    </section> -->
    <?php 
        }

        // Limpiar recursos y cerrar la conexión
        mysqli_free_result($query_usuario);
        // mysqli_free_result($query_usuario_aparte);
        mysqli_free_result($query_promedio);
        mysqli_free_result($query_total_rating_count);
        mysqli_close($conn);
    ?>
</section>

<script src="rating.js"></script>


</body>
</html>