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
                <a href="perfil.php" class="a_nav">Volver</a>
            </ul>
        </nav>
    </div>

    <header class="header_perfil">
        <form action="procesar_imagen.php" enctype="multipart/form-data" method="post" class="art_perfil_configuracion">
            <img src="<?php echo $user_photo ?>" alt="" class="img_perfil">
            <input type="file" name="foto_perfil">
            <input type="submit" value="Actualizar Foto" class="inp_sub">
        </form>
        <article class="art_perfil_configuracion">
            <p class="user_category"><?php echo $user_name ?></p>
            <form action="configuraciones.php" method="post" class="art_perfil_configuracion">
                <input type="text" name="profesion" placeholder="<?php echo $user_profession ?>" class="inp" autocomplete="off">
                <label for="barrio" class="label">Elije tu zona</label>
                <select name="barrio" class="inp">
                    <option value="ninguno" id="ninguno">Ninguna</option>
                    <option value="Zona Centro">Zona Centro</option>
                    <option value="Cordones del Chapelco">Cordones del Chapelco</option>
                    <option value="Vega Maipú">Vega Maipú</option>
                    <option value="Rucha Hue">Rucha Hue</option>
                    <option value="Faldeos del Chapelco">Faldeos del Chapelco</option>
                    <option value="Villa Vega San Martín">Villa Vega San Martín</option>
                    <option value="Altos del Cahpelco">Altos del Cahpelco</option>
                    <option value="Lolog">Lolog</option>
                    <option value="Rincón Radales">Rincón Radales</option>
                    <option value="Alihuen Alto">Alihuen Alto</option>
                    <option value="Alihuen">Alihuen</option>
                    <option value="Villa Paur">Villa Paur</option>
                    <option value="Kantec">Kantec</option>
                    <option value="Gobernadores Neuquinos">Gobernadores Neuquinos</option>
                    <option value="El Arenal">El Arenal</option>
                    <option value="Los Radales">Los Radales</option>
                    <option value="Intercultural">Intercultural</option>
                    <option value="Buenos Aires Chico">Buenos Aires Chico</option>
                </select>
                <label for="horas" class="label">¿Estas disponible las 24 Horas?</label>
                <input type="checkbox" name="horas" class="inp">
                <textarea name="sobre_mi" placeholder="<?php echo $about_user ?>" class="inp_about" autocomplete="off"></textarea>
                <input type="submit" value="Guardar Cambios" class="inp_sub">
            </form>
        </article>
    </header>
    
    <a href="../formularios/validaciones/inicio.php?session=1">Cerrar Sesión</a>
    
    
</body>
</html>