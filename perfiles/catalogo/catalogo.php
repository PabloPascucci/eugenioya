<?php
    // Iniciamos Sesión
    session_start();

    /// Validar sesión
    if (!empty($_SESSION['user_loged_id'])) {
        $user_id = $_SESSION['user_loged_id'];
        if ($user_id === 1) {
            header("Location: ../../admin/admin.php");
            exit;
        }
    } else {
        // Usuario anonimo
        $user_id = 0;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!empty($_GET['id-profesional'])) {
            $id_perfil = htmlspecialchars(trim($_GET['id-profesional']));
        } else {
            // En caso de que no se este recibiendo la petición get
            $url = urlencode("../perfiles/perfil.php");
            header("Location: ../../pantallas/error.php?e=fatal-error-files&url-redirect-user=$url");
            exit();
        }
        // conectar con las bases de datos
        require_once("../../server_.php");

        $conn = mysqli_connect($server,$user,$password,$db_name);
        
        // Extraer los datos del usuario de acuerdo con el id del usuario.
        $sql_usuario = "SELECT * FROM usuario WHERE id_usuario = '$id_perfil'";
        $query_usuario = mysqli_query($conn,$sql_usuario);

        if($query_usuario->num_rows === 1){
            $row_user = mysqli_fetch_assoc($query_usuario);
            $user_name = $row_user['nombre'];
            $apellido = isset($row_user['apellido']) ? $row_user['apellido'] : '';
            $user_photo = isset($row_user['foto_perfil']) ? $row_user['foto_perfil'] : "../imagenes/user_icon.png";
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
    <link rel="stylesheet" href="../../style/normalize.css">
    <link rel="stylesheet" href="../style_perfil_1_7.css">
    <link rel="stylesheet" href="../../style/estilo_1_7.css">
    <link rel="shortcout icon" href="../../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Catálogo de <?php echo $user_name . " " . $apellido?></title>

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
            <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav"> -->
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo"> -->
                    <a href="../../index.html" class="a_nav">Inicio</a>
                    <a href="../../categorias/indice.php" class="a_nav">Oficios</a>
                    <a href="../../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                    <a href="../../formularios/registrar.php" class="a_nav">Regístrate</a>
                    <a href="../../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <div class="div_nav">
            <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav"> -->
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <!-- <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo"> -->
                    <a href="../perfil.php" class="a_nav">Perfil</a>
                    <a href="../../categorias/indice.php" class="a_nav">Oficios</a>
                    <a href="../../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <header class="header_catalogo">
        <img src="../<?php echo $user_photo ?>" alt="<?php echo $user_name ?>" title="<?php echo $user_name . " " . $apellido ?>" class="img_perfil_catalogo">
        <p class="p_catalogo"><?php echo $user_name . " " . $apellido; ?></p>
        <?php
            if($user_id == $id_perfil) {
                echo "<h1 class='h1_catalogo'>Editá tu catálogo aquí</h1>";
            } else {
                echo "<h2 class='h1_catalogo'>Bienvenido a mi Catálogo</h2>";
            }
        ?>
    </header>

    <section class="sec_catalogo">
    <?php
    // Conectar a la base de datos
    require_once("../../server_.php");

    $conn = mysqli_connect($server, $user, $password, $db_name);

    // ========== Sanitizar el id_perfil para evitar inyecciones SQL
    $id_perfil = mysqli_real_escape_string($conn, $id_perfil);

    // ========== Consulta a la BD
    $sql_info_catalogo = "SELECT * FROM catalogo WHERE id_usuario = '$id_perfil'";
    $query_info_catalogo = mysqli_query($conn, $sql_info_catalogo);

    // ========== Extraer datos
    if($query_info_catalogo->num_rows > 0) {
        while ($row_info_catalogo = mysqli_fetch_array($query_info_catalogo)) {
            $id_producto = $row_info_catalogo['id_producto'];
            $id_usuario = $row_info_catalogo['id_usuario'];
            $nombre_producto = $row_info_catalogo['nombre_producto'];
            $precio = $row_info_catalogo['precio'];
            $estado = $row_info_catalogo['estado_producto'];
            $ruta_img_1 = isset($row_info_catalogo['imagen_1']) ? $row_info_catalogo['imagen_1'] : NULL;
            $ruta_img_2 = isset($row_info_catalogo['imagen_2']) ? $row_info_catalogo['imagen_2'] : NULL;
            $ruta_img_2 = $row_info_catalogo['imagen_2'];
            // ========== Mostrar información 
            if($estado == "activo") { ?>
                <article class="art_catalogo">
                    <div class="div_titulo_catalogo">
                        <?php if($ruta_img_1 != NULL){ ?>
                            <img src="<?php echo $ruta_img_1; ?>" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_catalogo">
                        <?php }else { ?>
                            <img src="imagenes/no-photo.png" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_catalogo">
                        <?php } if($ruta_img_2 != NULL){ ?>
                            <img src="imagenes/<?php echo $id_usuario; ?>/<?php echo $ruta_img_2; ?>" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_publicacion">
                        <?php } ?>
                    </div>
                    <div class="div_info">
                        <p class="des_catalogo"><?php echo $nombre_producto; ?></p>
                        <p class="precio_catalogo">$<?php echo $precio; ?></p>
                        <?php if($user_id == $id_perfil) {
                            echo "<a href='catalogo-config.php?action=1&product=$id_producto' class='a_catalogo'>Pausar producto</p></a>";
                        } ?>
                    </div>
                </article>
            <?php } 
            if($estado == 'inactivo' && $user_id == $id_perfil) { ?>
                <article class="art_catalogo">
                    <div class="div_titulo_catalogo">
                        <?php if($ruta_img_1 != NULL){ ?>
                            <img src="<?php echo $ruta_img_1; ?>" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_catalogo_pause">
                        <?php }else { ?>
                            <img src="imagenes/no-photo.png" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_catalogo_pause">
                        <?php } if($ruta_img_2 != NULL){ ?>
                            <img src="imagenes/<?php echo $id_usuario; ?>/<?php echo $ruta_img_2; ?>" alt="<?php echo $nombre_producto; ?>" title="<?php echo $nombre_producto ?>" class="img_publicacion_pause">
                        <?php } ?>
                    </div>
                    <div class="div_info">
                        <p class="des_catalogo_pause"><?php echo $nombre_producto; ?></p>
                        <p class="precio_catalogo_pause">$<?php echo $precio; ?></p>
                        <?php if($user_id == $id_perfil) {
                            echo "<a href='catalogo-config.php?action=2&product=$id_producto' class='a_catalogo'>Activar Producto</p></a>";
                            echo "<a href='catalogo-config.php?action=3&product=$id_producto' class='a_catalogo_delete'>Eliminar Producto</p></a>";
                        } ?>
                    </div>
                </article>
            <?php }
         }
    } 
    if($user_id == $id_perfil && $query_info_catalogo->num_rows < 5) {
        // ========== No hay productos y hay menos de 5 ========== 
        ?>
        <form action="catalogo-config.php" method="post" enctype="multipart/form-data" class="form_catalogo">
        <h2 class="h1_form">¡Agrega un producto!</h2>
            <?php 
            // error:
            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                if(isset($_GET['empty-input'])) {
                    $error_input = htmlspecialchars($_GET['empty-input'], ENT_QUOTES, 'UTF-8');
                    switch ($error_input) {
                        case 'nombre-producto-error':
                            echo "<p class='wrong'>Debes colocar un nombre a tu producto.</p>";
                            break;
                        case 'precio-producto-error':
                            echo "<p class='wrong'>Debes colocar un precio a tu producto.</p>";
                            break;
                        case 'product-files-error':
                            echo "<p class='wrong'>Debes colocar una imagen de tu producto.</p>";
                            break;
                        default:
                            echo "<p class='wrong'>Error Desconocido, por favor comunicarlo a soporte a soporte@eugenioya.com o vía Instagram.</p>";
                            break;
                    }
                }
            }
            ?>
            <input type="file" name="foto_producto" class="inp">
            <input type="text" name="producto" placeholder="Nombre del Producto" class="inp" autocomplete="off" >
            <input type="number" name="precio" placeholder="Precio" class="inp" autocomplete="off" >
            <input type="submit" value="Cargar Producto" class="inp_sub">
        </form>
    <?php } 
        // Liberar resultados y cerrar la conexión
        mysqli_close($conn);
        mysqli_free_result($query_info_catalogo);
    ?>
    </section>
    
</body>
</html>