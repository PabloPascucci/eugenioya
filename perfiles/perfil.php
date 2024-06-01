    <?php
        // Iniciamos Sesión
        session_start();

        // Traemos a través de session el id del usuario.
        $user_id = $_SESSION['user_loged_id'];
        
        // Conexión con la BD
        $server = "localhost";
        $server_user_name = "root";
        $server_password = "";
        $data_base_name = "eugenioya";

        $conn = mysqli_connect($server,$server_user_name,$server_password,$data_base_name);
        
        // Recuperando datos relacionados al usuario que inicio sesión
        $query_data = "SELECT * from usuario WHERE id_usuario = '$user_id'";
        $resultado_data = mysqli_query($conn,$query_data);

        if($resultado_data->num_rows == 1){
            $row = mysqli_fetch_assoc($resultado_data);
            $user_name = $row['nombre'];
            $user_category = $row['categoria'];
            $user_profession = $row['profesion'];
            $about_user = isset($row['sobre_mi']) ? $row['sobre_mi'] : "Agregá una presentación a tu perfil.";
            $user_area = isset($row['barrio']) ? $row['barrio'] : "Configura tu barrio";
            $hours = isset($row['horas']) ? $row['horas'] : "¿Trabajas las 24hs?";
            $user_photo = isset($row['foto_perfil']) ? $row['foto_perfil'] : "../imagenes/user_icon.png";
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
                <a href="" class="a_nav">Chat</a>
                <a href="configuraciones.php?edicion=2" class="a_nav">Añadir Experiencia</a>
                <a href="configuraciones.php?edicion=1" class="a_nav">Editar Perfil</a>
                <a href="----" class="a_nav">Bolsa de Trabajo</a>
                <a href="../categorias/indice.html" class="a_nav">Oficios</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <img src="<?php echo $user_photo ?>" alt="" class="img_perfil">
        <div class="div_perfil">
            <p class="user_name"><?php echo $user_name ?></p>
            <!-- Aca va la matricula con condicional -->
            <p class="user_category"><?php echo $user_profession ?></p>
            <p class="user_area"><?php echo $user_area ?></p>
            <?php
                if($hours == '0') {
                    echo "<p class='hours'>¿Trabajas las 24 horas?</p>";
                } else {
                    echo "<p class='hours'>24 hs</p>";
                }
            ?>
            </div>
    </header>
    <article class="art_perfil">
        <p class="about_user"><?php echo $about_user ?></p>
    </article>

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
    
    <a href="../formularios/validaciones/inicio.php?session=1">Cerrar Sesión</a>
    
    
</body>
</html>