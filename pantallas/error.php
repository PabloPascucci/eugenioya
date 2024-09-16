<?php
    // Iniciamos Sesión
        session_start();

    // Traemos a través de session el id del usuario.
    if($_SESSION){
        $user_id = $_SESSION['user_loged_id'];
    } else {
        $user_id = 0;
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
    <link rel="stylesheet" href="../style/estilo_1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Ha Ocurrido un error</title>
</head>
<body>
    
    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
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
        <nav class="nav">
            <input type="checkbox" name="check" id="check">
                <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars"></i>
                </label>
            <ul class="barr_nav">
                <!-- <img src="" title="Nombre" class="logo"> -->
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

    <div class="contendor">
        <img src="../imagenes/error.png" title="Ha Ocurrido un error" class="img">

    <?php if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $error = $_GET['e'];
        if($user_id === 1) {
            $url = "../admin/admin.php";
        } else {
            $url = $_GET['url-redirect-user'];
        }

        // Pantallazos breves para el admin (sabe como reparar el error)
        if($error === 'banner-error-admin') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un Error en la conexión con la base de datos, verificar línea 37</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'banner-error-admin-ad') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un Error en la conexión con la base de datos, verificar la línea en donde esta la conexión a la Base de Datos.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-conect-bolsa-de-trabajo') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error en la sección de "Bolsa de Trabajo" por favor, verifica, que la carga y/o la eliminación de clasificados sea hecha de la manera correcta.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }if($error === 'error-insert-bolsa-de-trabajo') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error con la inserción de clasificados al registro.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-delete-bolsa-de-trabajo') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error con la eliminación de un clasificado del registro.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-connect-banner') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error en la sección de "Delete Banner" por favor, verifica la conexión a la BD.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-delete-banner') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error en la sección de "Delete Banner", el banner no fue eliminado de la BD.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'cantidad-de-usuarios') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error con el botón que permite ver la cantidad de usuarios, por favor, verifica la conexión con la BD.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-show-banner') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error en la sección "banner" por favor verifica la conexión a la BD.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'error-conect-bolsa-de-trabajo') { ?>
            <p class="h1">e=> <?php echo $error ?></p>
            <p class="p">Ocurrio un error en la sección "bolsa-de-trabajo" por favor verifica la conexión a la BD.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }

        // << Pantallas para los usuarios >>
        if($error === 'pasword') { ?>
            <p class="p">Se ha enviado un enlace para restablecer la contraseña a tu correo electrónico</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'db-connect-error') { ?>
            <p class="h1">Error 500 Internal Server Error=> <?php echo $error ?></p>
            <p class="p">Ha ocurrido un error, conectando con el servidor. Por favor, intente nuevamente.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'wrong-image-type') { ?>
            <p class="h1">Error 404 Not Found => <?php echo $error ?></p>
            <p class="p">El tipo de imagen que quieres introducir, no es el permitido. Los permitidos son los siguientes tipos de imagen: jpeg, jpg o png. Intenta cargar esos tipos de imágenes nuevamente.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'fatal-error-files') { ?>
            <p class="h1">Error 500 Internal Server Error=> <?php echo $error ?></p>
            <p class="p">Ha ocurrido un error con el servidor y su manejo de ficheros, por favor comunicarlo a soporte a traves del correo <span>soporte@eugenioya.com</span>, adjuntar en el correo tu nombre de perfil.</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'insert-error') { ?>
            <p class="h1">Error 500 Internal Server Error=> <?php echo $error ?></p>
            <p class="p">Ha ocurrido un error en el manejo de inserción de datos. Intentalo más tarde, si el problema persiste, comunicarse con soporte a: <span>soporte@eugenioya.com</span></p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'connect-server-error') { ?>
            <p class="h1">Error 500 Internal Server Error=> <?php echo $error ?></p>
            <p class="p">Ha ocurrido un error de conexión con el servidor. Intentalo más tarde, si el problema persiste, comunicarse con soporte a: <span>soporte@eugenioya.com</span></p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'rating-type') { ?>
            <p class="h1">Error 404 Not Found=> <?php echo $error ?></p>
            <p class="p">El tipo de puntuación no es el permitido, trata de puntar de los rangos establecidos entre 1 (una) estrella y 5 (cinco) estrellas</p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'rating') { ?>
            <p class="h1">Error 500 Internal Server Error=> <?php echo $error ?></p>
            <p class="p">Ha ocurrido un error al actualizar o insertar tu comentario y puntuación, por favor, intente más tarde. Si el error persiste comunicarlo a soporte a través del correo: <span>soporte@eugenioya.com</span></p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
        if($error === 'categoria-inexistente') { ?>
            <p class="h1">Error 404 Not Found => <?php echo $error ?></p>
            <p class="p">No se ha encontrado la categoría que estás buscando, si el error persiste, por favor comunicarse con soporte al correo <b>soporte@eugenioya.com</b></p>
            <a href="<?php echo $url ?>" class="a_redirect">Clic aquí para volver atrás</a>
        <?php }
    }
    ?>
    </div>

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
                <a href="../categorias/indice.php" class="a_footer">Oficios</a>
            </article>
            <article class="art_div_footer">
                <a href="../politicas-de-privacidad.html" class="a_footer">Política de Privacidad</a>
                <a href="../terminos-y-condiciones.html" class="a_footer">Términos y Condiciones</a>
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
</html>