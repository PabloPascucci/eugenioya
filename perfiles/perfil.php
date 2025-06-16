    <?php
        // Iniciamos Sesión
        session_start();

        // Traemos a través de session el id del usuario.
        $user_id = $_SESSION['user_loged_id'];
        if($user_id === 1) {
            header("Location: ../admin/admin.php");
        }
        
        // Conexión con la BD
        require_once("../server_.php");

        $conn = mysqli_connect($server,$user,$password,$db_name);
        
        // Recuperando datos relacionados al usuario que inicio sesión
        $query_data = "SELECT * from usuario WHERE id_usuario = '$user_id'";
        $resultado_data = mysqli_query($conn,$query_data);

        if($resultado_data->num_rows == 1){
            $row = mysqli_fetch_assoc($resultado_data);
            $user_name = $row['nombre'];
            $user_surname = isset($row['apellido']) ? $row['apellido'] : " ";
            $user_category = $row['categoria'];
            $user_profession = $row['profesion'];
            $about_user = isset($row['sobre_mi']) ? $row['sobre_mi'] : "Agregá una presentación a tu perfil.";
            $user_area = isset($row['barrio']) ? $row['barrio'] : "Configura tu barrio";
            $hours = isset($row['horas']) ? $row['horas'] : "¿Trabajas las 24hs?";
            $user_photo = isset($row['foto_perfil']) ? $row['foto_perfil'] : "../imagenes/user_icon.png";
            $matricula = isset($row['matricula']) ? $row['matricula'] : "";
        }
        if(!$_SESSION){
            header("Location: ../formularios/iniciar.php");
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
    <title><?php echo $user_name . " " . $user_surname; ?></title>

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

    <div class="div_nav">
        <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav"> -->
        <nav class="nav">
            <input type="checkbox" name="check" id="check">
                <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars"></i>
                </label>
            <ul class="barr_nav">
                <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo"> -->
                <a href="configuraciones.php?edicion=2" class="a_nav">Añadir Experiencia</a>
                <a href="configuraciones.php?edicion=1" class="a_nav">Editar Perfil</a>
                <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                <a href="../categorias/indice.php" class="a_nav">Oficios</a>
                <a href="../formularios/validaciones/inicio.php?session=1" class="a_nav">Cerrar Sesión</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <img src="<?php echo $user_photo ?>" alt="" class="img_perfil">
        <div class="div_perfil">
            <p class="user_name"><?php echo $user_name . " " . $user_surname; ?></p>
            <?php if($matricula != null) { ?>
                    <p class="user_area">Matricula: <?php echo $matricula ?></p>
            <?php } ?>
            <p class="user_category"><?php echo $user_profession ?></p>
            <p class="user_area"><?php echo $user_area ?></p>
            <?php
                if ($user_category != 1) {
                    if($hours == '0') {
                        echo "<p class='hours'>¿Trabajas las 24 horas? <a href='configuraciones.php?edicion=1' class='a_question'><span class='material-symbols-outlined'>help</span></a></p>";
                    } else {
                        echo "<p class='hours'>24 hs</p>";
                    }
                } else {
                    echo "";
                }
            ?>
            <a href="catalogo/catalogo.php?id-profesional=<?php echo $user_id ?>" class="inp_sub_catalogo">Editá tu Catálogo aquí</a>
        </div>
    </header>
    
    <article class="art_perfil">
        <p class="about_user"><?php echo $about_user ?></p>
    </article>

    <!-- -------------------------------
     -- Proximamente esta herramienta --
     ----------------------------------- -->
     
    <!-- <article class="art_perfil">
        <form action="procesar_peticion_presupuesto.php" class="form_presup">
            <textarea name="" id="" placeholder="Escribe lo que necesites y recibe presupuestos" class="textA_presupuesto"></textarea>
            <select name="rubro" id="rubro" class="inp_form">
                <option value="1" id="ninguno">Eljie una Categoría</option>
                <option value="2">Artistas</option>
                <option value="3">Belleza y Estética</option>
                <option value="24">Cadetería</option>
                <option value="4">Carpintería</option>
                <option value="5">Cerrajería</option>
                <option value="6">Construcción y Reformas</option>
                <option value="7">Cuidado del Hogar y Limpieza</option>
                <option value="8">Cuidado Infantil y Acompañamiento Hospitalario</option>
                <option value="9">Educación y Tutoría</option>
                <option value="10">Electricistas</option>
                <option value="11">Fotógrafo</option>
                <option value="12">Gasistas</option>
                <option value="13">Jardinería y Paisajismo</option>
                <option value="22">Mascotas</option>
                <option value="14">Plomería</option>
                <option value="15">Reparación de Automóviles y Mecánica</option>
                <option value="16">Reparación de Celulares y PC</option>
                <option value="17">Reparación de Electrodomésticos</option>
                <option value="23">Salud y Bienestar</option>
                <option value="18">Servicios de Catering y Eventos</option>
                <option value="19">Servicios de Diseño Gráfico y Web</option>
                <option value="20">Servicios de Marketing y Publicidad</option>
                <option value="21">Transporte y Mudanzas</option>
            </select>
            <input type="submit" value="Publicar Solicitud" class="inp_sub">
        </form>
    </article> -->

    <section class="sec_publicaciones">
    <?php
    // Extraer los datos de las publicaciones
    $sql_publicaciones = "SELECT * FROM publicacion WHERE id_usuario = '$user_id'";
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

    <div class="div_comments_made">
        <h5 class="h5_c_m">Comentarios a tu Perfil</h5>
        <?php
        // Verificar que la conexión a la base de datos esté activa
        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Extraer datos de la tabla de ratings de la BD
        $stmt_rating_usuario = $conn->prepare("SELECT user_id, rating, comment, created_at FROM ratings WHERE professional_id = ?");
        $stmt_rating_usuario->bind_param("i", $user_id);
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
                    $stmt_user_rater->bind_result($foto_perfil, $rater_name, $rater_surname);
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
                            <?php } ?>
                                <p class="user_name_comments"><?php echo $rater_name . " " . $rater_surname; ?></p>
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
            echo "<p class='rating_comment'>No hay comentarios por el momento.</p>";
        }
        $stmt_rating_usuario->close();
    ?>
    </div>

    <script src="rating.js"></script>

    <footer class="footer">
        <div class="div_footer">
            <article class="art_div_footer">
                <img src="../imagenes/logo/logo_1_7.png" title="EugenioYa" class="logo_footer">
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
        <script src="../JS/version_1_8.js"></script>
    </footer>    
    
</body>
</html>