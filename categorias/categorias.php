<?php
    // ====>> Conectar con la BD de usuarios
    require_once("../server_.php");

    $conn = mysqli_connect($server,$user,$password,$db_name);

    // Iniciamos Sesión
    session_start();

    $url_redirect_categoria = urlencode("../categorias/indice.php");

    // Traemos a través de session el id del usuario.
    if($_SESSION){
        $user_id = $_SESSION['user_loged_id'];

        // ===>> Extraemos la ciudad del usuario que busca el servicio
        $sql_ubicacion = "SELECT ciudad, barrio FROM usuario WHERE id_usuario = '$user_id'";
        $query_ubicacion = mysqli_query($conn,$sql_ubicacion);

        // ===>> Guardamos la ciudad
        if($query_ubicacion->num_rows > 0) {
            $resultado_ciudad = mysqli_fetch_assoc($query_ubicacion);
            
            $barrio_cliente = $resultado_ciudad['barrio'];
            $ciudad_usuario = $resultado_ciudad['ciudad'];
            if($ciudad_usuario === '1') {
                $ciudad_definidda = "San Martín de los Andes";
            } elseif ($ciudad_usuario === '2') {
                $ciudad_definidda = "Ciudad de Neuquén";
            }
        }
    }
    
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        $categoria = $_GET['profesion'];
        }if($categoria == '2'){
            $categoria_definida = "Artistas";
        }elseif($categoria == '3'){
            $categoria_definida = "Belleza y Estética";
        }elseif($categoria == '4'){
            $categoria_definida = "Carpintería";
        }elseif($categoria == '5'){
            $categoria_definida = "Cerrajería";
        }elseif($categoria == '6'){
            $categoria_definida = "Construcción y Reformas";
        }elseif($categoria == '7'){
            $categoria_definida = "Cuidado del Hogar y Limpieza";
        }elseif($categoria == '8'){
            $categoria_definida = "Cuidado Infantil y Acompañamiento Hospitalario";
        }elseif($categoria == '9'){
            $categoria_definida = "Educación y Tutoría";
        }elseif($categoria == '10'){
            $categoria_definida = "Electricistas";
        }elseif($categoria == '11'){
            $categoria_definida = "Fotógrafos";
        }elseif($categoria == '12'){
            $categoria_definida = "Gasistas";
        }elseif($categoria == '13'){
            $categoria_definida = "Jardinería y Paisajismo";
        }elseif($categoria == '14'){
            $categoria_definida = "Plomería";
        }elseif($categoria == '15'){
            $categoria_definida = "Reparación de Automóviles y Mecánica";
        }elseif($categoria == '16'){
            $categoria_definida = "Reparación de Celulares y PC";
        }elseif($categoria == '17'){
            $categoria_definida = "Reparación de Electrodomésticos";
        }elseif($categoria == '18'){
            $categoria_definida = "Servicios de Catering y Eventos";
        }elseif($categoria == '19'){
            $categoria_definida = "Servicios de Diseño Gráfico y Web";
        }elseif($categoria == '20'){
            $categoria_definida = "Servicios de Marketing y Publicidad";
        }elseif($categoria == '21'){
            $categoria_definida = "Transporte y Mudanzas";
        }elseif($categoria == '22'){
            $categoria_definida = "Mascotas";
        }elseif($categoria == '23'){
            $categoria_definida = "Salud y Bienestar";
        }else{
            header("Location: ../pantallas/error.php?e=categoria-inexistente&url-redirect-user=$url_redirect_categoria");
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
    <meta name="description" content="Encuentra en este indice el profesional que estas necesitando. EugenioYa.com">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex,follow">
<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/estilo_1.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title><?php echo $categoria_definida ?></title>

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
<body>

    <div id="cookie-banner" style="display:none; position:fixed; bottom:0; width:100%; background:#000; color:#fff; text-align:center; padding:10px;">
        Este sitio utiliza cookies para mejorar tu experiencia. <a href="../politicas-de-privacidad.html" style="color:#fff; text-decoration:underline;">Más información</a>.
        <button onclick="acceptCookies()" style="margin-left: 20px; padding: 5px 10px; background: #007BFF; color: #fff; border: none; cursor: pointer;">Aceptar</button>
    </div>

    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                    <p class="p_categoria_definida" id="<?php echo $categoria_definida ?>"><?php echo $categoria_definida ?></p>
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="Nombre" class="logo">
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
        <img src="../imagenes/logo/logo_nav.png" alt="EugenioYa.com" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                    <p class="p_categoria_definida" id="<?php echo $categoria_definida ?>"><?php echo $categoria_definida ?></p>
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
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

        <!-- Configuramos los profesionales según: Zona, e inicio de sesión -->
         <?php 
            if(!$_SESSION) { ?>
                <!-- NO EXISTE UNA SESIÓN -->
            <section class="sec_categorias_dinamico">
                <?php
                // ====>> Query para extraer datos de los perfiles de los usuarios con la zona del cliente

                $sql_perfil_sma = "SELECT * FROM usuario WHERE categoria = '$categoria' AND ciudad = 1";
                $query_perfil_sma = mysqli_query($conn,$sql_perfil_sma);

                // ====>> Query para extraer datos de los perfiles de los usuarios de otras zonas
                $sql_perfil_nqn = "SELECT * FROM usuario WHERE categoria = '$categoria' AND ciudad = 2";
                $query_perfil_nqn = mysqli_query($conn, $sql_perfil_nqn);

                // ====>> Bucle para visualizar y leer los datos de los usuarios SMA
                if($query_perfil_sma->num_rows > 0) { ?>
                    <p class="p_ciudad">Profesionales en San Martín de los Andes</p>
                    <?php
                    while ($row = mysqli_fetch_array($query_perfil_sma)) {
                        $id_usuario = $row['id_usuario'];
                        $usuario = $row['nombre'];
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
                                <p class="p1_usuario"><?php echo $usuario ?></p>
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
                                    if($disponibilidad == '1') {
                                        echo "<p class='p4_usuario'>disponible las 24hs</p>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </div>
                            <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
                        </article>
                        <article class="art_publicaciones">
                            <p class="p3_usuario">San Martín de los Andes</p>
                        </article>
                    </section>
                            
            <?php }
                }

                 // ====>> Bucle para visualizar y leer los datos de los usuarios NQN
                 if($query_perfil_nqn->num_rows > 0) { ?>
                    <p class="p_ciudad">Profesionales en Ciudad de Neuquén</p>
                    <?php
                    while ($row = mysqli_fetch_array($query_perfil_nqn)) {
                        $id_usuario = $row['id_usuario'];
                        $usuario = $row['nombre'];
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
                                <p class="p1_usuario"><?php echo $usuario ?></p>
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
                                    if($disponibilidad == '1') {
                                        echo "<p class='p4_usuario'>disponible las 24hs</p>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </div>
                            <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
                        </article>
                        <article class="art_publicaciones">
                            <p class="p3_usuario">Ciudad de Neuquén</p>
                        </article>
                    </section> <?php
                    }
                }
                    // === MENSAJE PARA SMA
                if($query_perfil_sma->num_rows == 0 && $query_perfil_nqn->num_rows > 0) {
                    ?>
                    <article class="art_empty">
                        <h3 class="h3_empty">¡Lo sentimos! Aún no hay profesionales en <span class="span_empty"><?php echo $categoria_definida ?> </span> en San Martín de los Andes.</h3>
                        <p class="p_empty">¡Regístrate ahora y sé el primero en conectar con nuevos clientes!</p>
                        <a href="../formularios/registrar.php" class="call_to_action">Regístrate Aquí</a>
                    </article>
                    <?php
                }

                    // === MENSAJE PARA NEUQUÉN
                if($query_perfil_nqn->num_rows == 0 && $query_perfil_sma->num_rows > 0) {
                    ?>
                    <article class="art_empty">
                        <h3 class="h3_empty">¡Lo sentimos! Aún no hay profesionales en <span class="span_empty"><?php echo $categoria_definida ?> </span> en Ciudad de Neuquén.</h3>
                        <p class="p_empty">¡Regístrate ahora y sé el primero en conectar con nuevos clientes!</p>
                        <a href="../formularios/registrar.php" class="call_to_action">Regístrate Aquí</a>
                    </article>
                    <?php
                }

                if($query_perfil_sma->num_rows == 0 && $query_perfil_nqn->num_rows == 0) { 
                    ?>
                    <!-- <<< Si no hay profesionales >>> -->
                    <article class="art_empty">
                        <h3 class="h3_empty">¡Lo sentimos! Aún no hay profesionales en <span class="span_empty"><?php echo $categoria_definida ?></span>.</h3>
                        <p class="p_empty">Parece que todavía no contamos con expertos en este servicio en tu área, pero eso puede cambiar pronto. ¿Eres un profesional que ofrece este servicio?</p>
                        <p class="p_empty">¡Regístrate ahora y sé el primero en conectar con nuevos clientes!</p>
                        <a href="../formularios/registrar.php" class="call_to_action">Regístrate Aquí</a>
                    </article>
        </section>
            <?php }
            mysqli_free_result($query_perfil_sma);
            mysqli_free_result($query_perfil_nqn);
            } else { ?>
                <!-- SESIÓN INICIADA -->
                <!-- >>> Acá iran los profesiones que estan en tu zona. -->
                <section class="sec_categorias_dinamico">
                    <?php

                    // ====>> Query para extraer datos de los perfiles de los usuarios con la zona del cliente
                    $sql_perfil_publico = "SELECT * FROM usuario WHERE categoria = '$categoria' AND barrio = '$barrio_cliente' AND ciudad = '$ciudad_usuario'";
                    $query_perfil_publico = mysqli_query($conn,$sql_perfil_publico);

                    // ====>> Query para extraer datos de los perfiles de los usuarios de otras zonas
                    $sql_perfil_publico_general = "SELECT * FROM usuario WHERE categoria = '$categoria' AND barrio != '$barrio_cliente' AND ciudad = '$ciudad_usuario'";
                    $query_perfil_publico_general = mysqli_query($conn, $sql_perfil_publico_general);

                    // ====>> Bucle para visualizar y leer los datos de los usuarios
                    if($query_perfil_publico->num_rows > 0) { ?>
                        <p class="p_ciudad">Profesionales en tu zona</p>
                        <?php
                        while ($row = mysqli_fetch_array($query_perfil_publico)) {
                            $id_usuario = $row['id_usuario'];
                            $usuario = $row['nombre'];
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
                                    <p class="p1_usuario"><?php echo $usuario ?></p>
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
                                        if($disponibilidad == '1') {
                                            echo "<p class='p4_usuario'>disponible las 24hs</p>";
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                    <p class="p2_usuario"><?php echo $ciudad_definidda ?></p>
                                </div>
                                <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
                            </article>
                        </section>
                        <?php
                        }
                } 
                
                if($query_perfil_publico_general->num_rows > 0) { ?>
                            <p class="p_ciudad">Profesionales en otras zonas</p>
                            <?php
                            while ($row = mysqli_fetch_array($query_perfil_publico_general)) {
                                $id_usuario = $row['id_usuario'];
                                $usuario = $row['nombre'];
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
                            <article class="art_publicaciones">
                                <div class="div_categoria">
                                    <img src="../perfiles/<?php echo $ruta ?>" alt="<?php echo $usuario ?>" title="<?php echo $usuario ?>" class="img_perfil">
                                </div>
                                <div class="div_categoria">
                                    <p class="p1_usuario"><?php echo $usuario ?></p>
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
                                        if($disponibilidad == '1') {
                                            echo "<p class='p4_usuario'>disponible las 24hs</p>";
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                    <p class="p2_usuario"><?php echo $ciudad_definidda ?></p>
                                </div>
                                <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
                            </article>
                        <?php
                    }
                }
                if($query_perfil_publico_general->num_rows == 0 && $query_perfil_publico->num_rows == 0) { 
                    ?>
                    <!-- <<< Si no hay profesionales >>> -->
                    <article class="art_empty">
                        <h3 class="h3_empty">¡Lo sentimos! Aún no hay profesionales en <span class="span_empty"><?php echo $categoria_definida ?></span>.</h3>
                        <p class="p_empty">Parece que todavía no contamos con expertos en este servicio en tu área, pero eso puede cambiar pronto. ¿Eres un profesional que ofrece este servicio?</p>
                        <p class="p_empty">¡Regístrate ahora y sé el primero en conectar con nuevos clientes!</p>
                        <a href="../formularios/registrar.php" class="call_to_action">Regístrate Aquí</a>
                    </article>
            <?php }
            mysqli_free_result($query_perfil_publico_general);
            mysqli_free_result($query_perfil_publico);
                }
                ?>
                </section>
            <?php
         ?>
        
    <script src="rating.js"></script>

        <footer class="footer">
            <div class="div_footer">
                <article class="art_div_footer">
                    <img src="../imagenes/logo/logo_footer.png" alt="EugenioYa.com" title="EugenioYa" class="logo_footer">
                </article>
                <article class="art_div_footer">
                    <a href="../nosotros.html" class="a_footer">Sobre Eugenio</a>
                    <a href="../nosotros.html" class="a_footer">Contacto</a>
                    <a href="../formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                    <a href="../formularios/iniciar.php" class="a_footer">Inicia Sesión</a>
                    <a href="indice.php" class="a_footer">Oficios</a>
                </article>
                <article class="art_div_footer">
                    <a href="../politicas-de-privacidad.html" class="a_footer">Política de Privacidad</a>
                    <a href="../terminos-y-condiciones.html" class="a_footer">Trabaja Junto a Nosotros</a>
                </article>
                <article class="art_div_footer">
                    <img src="../imagenes/avatar/eugenio_footer.png" alt="EugenioYa.com" title="EuGENIO" class="genio_footer">
                </article>
            </div>
            <div class="div1_footer">
                <p class="p_footer_ubi" id="footer_ubi"></p>
                <p class="p_footer_legal" id="footer_legal"></p>
            </div>
            <script src="../JS/version.js"></script>
        </footer>
</body>