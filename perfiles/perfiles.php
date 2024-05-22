<!-- ==> Perfiles públicos <== -->

<?php
    // corroborar que el usuario haya iniciado sesión
    session_start();

    // Traemos a través de session el id del usuario.
    $user_id = isset($_SESSION['user_loged_id']) ? $_SESSION['user_loged_id'] : "";
    
    // Corroborar que se exista el get
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        // Traer el dato de la variable get
        $id_usuario = $_GET['profesional'];

        // conectar con las bases de datos
        $server = "localhost";
        $user_server = "root";
        $password_server = "";
        $name_db_server = "eugenioya";

        $conn = mysqli_connect($server,$user_server,$password_server,$name_db_server);
        
        // Extraer los datos del usuario de acuerdo con el id del usuario.
        $sql_usuario = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
        $query_usuario = mysqli_query($conn,$sql_usuario);

        if($query_usuario->num_rows == 1){
            $row_user = mysqli_fetch_assoc($query_usuario);
            $user_name = $row_user['nombre'];
            $user_photo = $row_user['foto_perfil'];
            $user_photo_null = "../imagenes/user_icon.png";
            $user_profession = $row_user['profesion'];
            $user_area = isset($row_user['barrio']) ? $row_user['barrio'] : "";
            $hours = $row_user['horas'];
            $about_user = isset($row_user['sobre_mi']) ? $row_user['sobre_mi'] : "";
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
    <link rel="stylesheet" href="style_perfil.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title><?php echo $user_name; ?></title>
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
                <a href="../index.html" class="a_nav">Inicio</a>
                <a href="../categorias/indice.html" class="a_nav_1">Oficios</a>
                <a href="../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                <a href="../formularios/registrar.php" class="a_nav">Regístrate</a>
                <a href="----" class="a_nav">Bolsa de Trabajo</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <?php if($user_photo == 'null'){ ?> 
            <img src="<?php echo $user_photo_null ?>" alt="" class="img_perfil">
        <?php } else { ?>
            <img src="<?php echo $user_photo ?>" alt="" class="img_perfil">
        <?php } ?>
        <div class="div_perfil">
            <div class="div_categorias">
                <p class="user_name"><?php echo $user_name ?></p>
            </div>
            <!-- <div> -->
                <!-- Aca va la matricula con condicional -->
            <!-- </div> -->
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
        <a href="" class="mensaje_btn">Enviar mensaje</a>
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

    <form action="submit_rating.php" method="post" class="form">
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>"> <!-- ID del usuario -->
        <input type="hidden" name="professional_id" value="<?php echo $id_usuario ?>"> <!-- ID del profesional a evaluar -->
        <input type="hidden" name="rating" id="rating_value">
        
        <div class="rating">
            <span class="star" data-value="5">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="1">&#9733;</span>
        </div>
        <textarea name="comment" placeholder="Escribe un comentario"></textarea>
        <input type="submit" value="Enviar">
    </form>

    <script src="rating.js"></script>
    
    
</body>
</html>