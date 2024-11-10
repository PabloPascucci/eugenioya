<?php
    // ==> Perfiles públicos <==
    // corroborar que el usuario haya iniciado sesión
    session_start();

    // Traemos a través de session el id del usuario.
    $user_id = isset($_SESSION['user_loged_id']) ? $_SESSION['user_loged_id'] : "";
    
    // Corroborar que se exista el get
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        // Traer el dato de la variable get
        $id_usuario = $_GET['profesional'];

        // conectar con las bases de datos
        require_once("../server_.php");

        $conn = mysqli_connect($server,$user,$password,$db_name);
        
        // Extraer los datos del usuario de acuerdo con el id del usuario.
        $sql_usuario = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
        $query_usuario = mysqli_query($conn,$sql_usuario);

        if($query_usuario->num_rows === 1){
            $row_user = mysqli_fetch_assoc($query_usuario);
            $user_name = $row_user['nombre'];
            $apellido = isset($row_user['apellido']) ? $row_user['apellido'] : '';
            $user_photo = isset($row_user['foto_perfil']) ? $row_user['foto_perfil'] : "../imagenes/user_icon.png";
            $user_profession = $row_user['profesion'];
            $user_area = isset($row_user['barrio']) ? $row_user['barrio'] : "";
            $hours = $row_user['horas'];
            $about_user = isset($row_user['sobre_mi']) ? $row_user['sobre_mi'] : "";
            $matricula = isset($row_user['matricula']) ? $row_user['matricula'] : "";
            $telefono = isset($row_user['telefono']) ? $row_user['telefono'] : "";
        }
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
    <link rel="stylesheet" href="style_perfil_1_7.css">
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
    <title><?php echo $user_name ?> - <?php echo $user_profession ?></title>

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
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
                    <a href="../index.html" class="a_nav">Inicio</a>
                    <a href="../categorias/indice.php" class="a_nav_1">Oficios</a>
                    <a href="../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                    <a href="../formularios/registrar.php" class="a_nav">Regístrate</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <div class="div_nav">
            <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
                    <a href="perfil.php" class="a_nav">Perfil</a>
                    <a href="../categorias/indice.php" class="a_nav_1">Oficios</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <header class="header_perfil">
            <img src="<?php echo $user_photo ?>" title="<?php echo $user_name ?>" class="img_perfil">
        <div class="div_perfil">
            <div class="div_categorias">
                <p class="user_name"><?php echo $user_name . " " . $apellido; ?></p>
            </div>
            <?php if($matricula != null) { ?>
                <div class="div_categorias">
                    <span class="material-symbols-outlined">contract</span>
                    <p class="user_area">Matricula: <?php echo $matricula ?></p>
                </div>
            <?php } ?>
            <div class="div_categorias">
                <span class="material-symbols-outlined">work</span>
                <p class="user_category"><?php echo $user_profession ?></p>
            </div>
            <div class="div_categorias">
                <span class="material-symbols-outlined">location_on</span>
                <p class="user_area"><?php echo $user_area ?></p>
            </div>
            <?php
                if($hours == '0') {
                    echo "";
                } else {
                    echo "<div class='div_categorias'>
                            <span class='material-symbols-outlined'>schedule</span>
                            <p class='hours'>Está disponible las 24 hs</p>
                        </div>";
                }
            ?>
        </div>
        
    </header>
    <article class="art_perfil">
        <p class="about_user"><?php echo $about_user ?></p>
        <?php if(!$_SESSION) { ?>
            <a href="../formularios/iniciar.php" class="mensaje_btn">Iniciar Sesión para Envíar Mensaje</a>
        <?php } elseif($user_id != $id_usuario) { ?>
            <a href="https://wa.me/+54<?php echo $telefono ?>" class="mensaje_btn">Envíar Mensaje</a>
        <?php } else { ?>
            <p class="comment_btn"></p>
        <?php } ?>
    </article>

    <section class="sec_publicaciones">
    <?php
    // Extraer los datos de las publicaciones
    $sql_publicaciones = "SELECT * FROM publicacion WHERE id_usuario = '$id_usuario'";
    $query_publicaciones = mysqli_query($conn, $sql_publicaciones);

    if ($query_publicaciones->num_rows > 0) {
        while ($row = mysqli_fetch_array($query_publicaciones)) { 
            $nombre = $row['nombre_proyecto'];
            $carpeta = $row['id_usuario'];
            $nombre_imagen = $row['foto_proyecto'];
            $ruta = $carpeta . "/" . $nombre_imagen;
            $descripcion = $row['descripcion_proyecto'];
            $fecha = $row['fecha_subida'];?>
                <article class="art_publicaciones">
                    <div class="div_titulo">
                        <h5 class="h_titulo"><?php echo $nombre ?></h5>
                    </div>
                    <div class="div_info">
                        <img src="imagenes/<?php echo $ruta ?>" alt="<?php echo $nombre ?>" title="<?php echo $nombre ?>" class="img_publicacion">
                        <p class="des_publicacion"><?php echo $descripcion ?></p>
                        <p class="fecha"><?php echo $fecha ?></p>
                    </div>
                </article>
            <?php
            }
        }
        mysqli_free_result($query_publicaciones);
    ?>
    </section>

    <!-- Sección para el puntaje -->

    <section class="sec_rating">
        <form action="procesar_rating.php" method="post" class="form">
            <h5 class="h5_form_rating">Puntúa al Profesional</h5>
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>"> <!-- ID del usuario -->
            <input type="hidden" name="professional_id" value="<?php echo $id_usuario ?>"> <!-- ID del profesional a evaluar -->
            <input type="hidden" name="rating" id="rating_value">
            
            <div class="rating">
                <span class="star" data-value="1">&#9734;</span>
                <span class="star" data-value="2">&#9734;</span>
                <span class="star" data-value="3">&#9734;</span>
                <span class="star" data-value="4">&#9734;</span>
                <span class="star" data-value="5">&#9734;</span>
            </div>
            <textarea class="inp_comment" name="comment" placeholder="Escribe un comentario" autocomplete="off"></textarea>
            <?php if(!$_SESSION){ ?>
                <a href="../formularios/iniciar.php" class="comment_btn">Inicia Sesión para Comentar</a>
            <?php }elseif($id_usuario != $user_id) { ?>
                <input type="submit" value="Envíar Comentario" class="comment_btn">
            <?php } else{ ?>
                <p class="comment_btn">No puedes calificar tu propio perfil</p>
            <?php } ?>
        </form>
        <div class="div_comments_made">
            <h5 class="h5_c_m">Comentarios al Profesional</h5>
            <?php
            // Verificar que la conexión a la base de datos esté activa
            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Extraer datos de la tabla de ratings de la BD
            $stmt_rating_usuario = $conn->prepare("SELECT user_id, rating, comment, created_at FROM ratings WHERE professional_id = ?");
            $stmt_rating_usuario->bind_param("i", $id_usuario);
            $stmt_rating_usuario->execute();
            $stmt_rating_usuario->store_result();

            if ($stmt_rating_usuario->num_rows >= 1) {
                // Vincular los resultados de la consulta a variables
                $stmt_rating_usuario->bind_result($id_rating_user, $rating_star, $rating_comment, $rating_date);

                while ($stmt_rating_usuario->fetch()) {
                    // Localizar al perfil del usuario en la tabla usuarios
                    $stmt_user_rater = $conn->prepare("SELECT foto_perfil, nombre, apellido FROM usuario WHERE id_usuario = ?");
                    $stmt_user_rater->bind_param("i", $id_rating_user);
                    $stmt_user_rater->execute();
                    $stmt_user_rater->store_result();

                    if ($stmt_user_rater->num_rows > 0) {
                        $stmt_user_rater->bind_result($foto_perfil, $rater_name, $rater_apellido);
                        while ($stmt_user_rater->fetch()) {
                            ?>
                            <article class="art_comments_made">
                                <div class="div_user_comments">
                                <?php 
                                    if($foto_perfil != null){
                                ?>
                                    <img src="<?php echo $foto_perfil ?>" title="<?php echo $rater_name ?>" class="img_user_comments">
                                <?php } else { ?>
                                    <img src="../imagenes/user_icon.png" class="img_user_comments">
                                <?php } 
                                    if($id_rating_user === 1) { ?>
                                        <p class="user_name_comments"><?php echo $rater_name ?> [admin]</p>
                                    <?php } else { ?>
                                        <p class="user_name_comments"><?php echo $rater_name . " " . $rater_apellido; ?></p>
                                    <?php }
                                    ?>
                                    <span class="stars" data-value="<?php echo $rating_star ?>"></span>
                                    <p class="rating_comment"><?php echo $rating_comment ?></p>
                                    <p class="rating_date"><?php echo $rating_date ?></p>
                                </div>
                            </article>
                            <?php
                        }
                        $stmt_user_rater->close();
                    } else {
                        echo "No se encontró el perfil del usuario.";
                    }
                }
            } else {
                echo "<p class='rating_comment'>No hay comentarios para el profesional</p>";
            }
            $stmt_rating_usuario->close();
            ?>
        </div>
    </section>

    <script src="rating.js"></script>
    
    <footer class="footer">
        <div class="div_footer">
            <article class="art_div_footer">
                <img src="../imagenes/logo/logo_footer.png" title="EugenioYa" class="logo_footer">
            </article>
            <article class="art_div_footer">
                <a href="../nosotros.html" class="a_footer">Sobre Eugenio</a>
                <a href="../nosotros.html" class="a_footer">Contacto</a>
                <a href="../formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                <a href="../formularios/iniciar.php" class="a_footer">Inicia Sesión</a>
                <a href="../categorias/indice.php" class="a_footer">Oficios</a>
            </article>
            <article class="art_div_footer">
                <a href="../politicas-de-privacidad.html" class="a_footer">Política de Privacidad</a>
                <a href="../terminos-y-condiciones.html" class="a_footer">Términos y Condiciones</a>
            </article>
            <article class="art_div_footer">
                <img src="../imagenes/avatar/eugenio_footer.png" title="EuGENIO" class="genio_footer">
            </article>
        </div>
        <div class="div1_footer">
            <p class="p_footer_ubi" id="footer_ubi"></p>
            <p class="p_footer_legal" id="footer_legal"></p>
        </div>
        <script src="../JS/version_1_7.js"></script>
    </footer>
    
</body>
</html>