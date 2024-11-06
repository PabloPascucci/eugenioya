<?php
// Iniciamos Sesión
session_start();

if (!isset($_SESSION['user_loged_id'])) {
    header("Location: ../formularios/iniciar.php");
    exit();
}

$user_id = $_SESSION['user_loged_id'];
// Conexión con la BD
require_once("../server_.php");

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recuperando datos relacionados al usuario que inicio sesión
$query_data = "SELECT * FROM usuario WHERE id_usuario = '$user_id'";
$resultado_data = mysqli_query($conn, $query_data);

if ($resultado_data->num_rows == 1) {
    $row = mysqli_fetch_assoc($resultado_data);
    $user_name = $row['nombre'];
    $user_category = $row['categoria'];
    $user_profession = $row['profesion'];
    $about_user = $row['sobre_mi'] ?? "Agregá una presentación a tu perfil.";
    $user_area = $row['barrio'] ?? "Configura tu barrio";
    $hours = $row['horas'] ?? "¿Trabajas las 24hs?";
    $user_photo = $row['foto_perfil'] ?? "../imagenes/user_icon.png";
    $user_phone = $row['telefono'];
    $ciudad = $row['ciudad'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $profesion = isset($_POST['profesion']) && $_POST['profesion'] !== "" ? $_POST['profesion'] : $user_profession;
    $zona = isset($_POST['barrio']) && $_POST['barrio'] !== "" ? $_POST['barrio'] : $user_area;
    $horas = isset($_POST['horas']) ? 1 : 0; // Checkbox debe ser tratado como booleano
    $telefono = isset($_POST['telefono']) && $_POST['telefono'] !== "" ? $_POST['telefono'] : $user_phone;
    $sobre_usuario = isset($_POST['sobre_mi']) && $_POST['sobre_mi'] !== "" ? $_POST['sobre_mi'] : "";

    // Escapar los datos para evitar inyecciones SQL
    $profesion = mysqli_real_escape_string($conn, $profesion);
    $zona = mysqli_real_escape_string($conn, $zona);
    $sobre_usuario = mysqli_real_escape_string($conn, $sobre_usuario);

    // Query
    $sql_update_data = "UPDATE usuario SET profesion = '$profesion', sobre_mi = '$sobre_usuario', barrio = '$zona', horas = '$horas', telefono = '$telefono' WHERE id_usuario = '$user_id'";
    $query_update = mysqli_query($conn, $sql_update_data);

    if ($query_update) {
        header("Location: perfil.php");
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conn);
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
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title><?php echo htmlspecialchars($user_name); ?></title>
</head>
<body>
    <div class="div_nav">
        <nav class="nav">
            <input type="checkbox" name="check" id="check">
                <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars"></i>
                </label>
            <ul class="barr_nav">
            <?php if ($user_id === '1') {?>
                        <a href="../admin/admin.php" class="a_nav">Volver</a>
                    <?php } else { ?>
                        <a href="perfil.php" class="a_nav">Volver</a>
                    <?php } ?>
            </ul>
        </nav>
    </div>

<?php
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        $edicion = isset($_GET['edicion']) ? $_GET['edicion'] : '';
        if($edicion === '1'){ ?>
           <header class="header_perfil">
           <form action="procesar_imagen.php" enctype="multipart/form-data" method="post" class="art_perfil_configuracion">
               <img src="<?php echo htmlspecialchars($user_photo); ?>" alt="" class="img_perfil">
               <input type="file" name="foto_perfil">
               <input type="submit" value="Actualizar Foto" class="inp_sub">
           </form>
           <article class="art_perfil_configuracion">
               <p class="user_category"><?php echo htmlspecialchars($user_name); ?></p>
               <form action="configuraciones.php" method="post" class="art_perfil_configuracion">
                   <?php
                   if($ciudad == 1) { ?>
                    <input type="text" name="profesion" placeholder="<?php echo $user_profession ?>" class="inp" autocomplete="off">
                   <label for="barrio" class="label">Elije tu zona</label>
                   <select name="barrio" class="inp">
                       <option value="<?php echo $user_area ?>" id="ninguno"><?php echo $user_area ?></option>
                       <option value="Alihuen Alto">Alihuen Alto</option>
                       <option value="Alihuen Bajo">Alihuen Bajo</option>
                       <option value="Barrio El Arenal">Barrio El Arenal</option>
                       <option value="Barrio Intercultural">Barrio Intercultural</option>
                       <option value="Barrio Kaleuche">Barrio Kaleuche</option>
                       <option value="Barrio Las Rosas">Barrio Las Rosas</option>
                       <option value="Barrio Los Robles">Barrio Los Robles</option>
                       <option value="Barrio Militar">Barrio Militar</option>
                       <option value="Barrio Parque Los Radales">Barrio Parque Los Radales</option>
                       <option value="Bickel">Bickel</option>
                       <option value="Callejón de Bello">Callejón de Bello</option>
                       <option value="Centro">Centro</option>
                       <option value="Chacra 2">Chacra 2</option>
                       <option value="Chacra 4">Chacra 4</option>
                       <option value="Chacra 28">Chacra 28</option>
                       <option value="Cordones del Chapelco">Cordones del Chapelco</option>
                       <option value="El Oasis">El Oasis</option>
                       <option value="La Cascada">La Cascada</option>
                       <option value="Las Pendientes">Las Pendientes</option>
                       <option value="Los Riscos">Los Riscos</option>
                       <option value="Rincón Radales">Rincón Radales</option>
                       <option value="Ruca Hue">Ruca Hue</option>
                       <option value="San Fernando">San Fernando</option>
                       <option value="Valle Alto">Valle Alto</option>
                       <option value="Vega Chica">Vega Chica</option>
                       <option value="Vega Maipú">Vega Maipú</option>
                       <option value="Villa Paur">Villa Paur</option>
                   </select>
                   <?php }
                    if($ciudad == 2) { ?>
                        <input type="text" name="profesion" placeholder="<?php echo $user_profession ?>" class="inp" autocomplete="off">
                        <label for="barrio" class="label">Elije tu zona</label>
                        <select name="barrio" class="inp">
                            <option value="<?php echo $user_area ?>" id="ninguno"><?php echo $user_area ?></option>
                            <option value="Ciudad de Neuquén">Ciudad de Neuquén</option>
                            <option value="14 de Octubre">14 de Octubre</option>
                            <option value="Alta Barda">Alta Barda</option>
                            <option value="Altos del Limay">Altos del Limay</option>
                            <option value="Área Centro Este">Área Centro Este</option>
                            <option value="Área Centro Oeste">Área Centro Oeste</option>
                            <option value="Área Centro Sur">Área Centro Sur</option>
                            <option value="Bardas Soleadas">Bardas Soleadas</option>
                            <option value="Barrio Nuevo">Barrio Nuevo</option>
                            <option value="Belgrano">Belgrano</option>
                            <option value="Bouquet Roldán">Bouquet Roldán</option>
                            <option value="Canal V">Canal V</option>
                            <option value="Ciudad Industrial Jaime de Nevares">Ciudad Industrial Jaime de Nevares</option>
                            <option value="Colonia Nueva Esperanza">Colonia Nueva Esperanza</option>
                            <option value="Confluencia Rural">Confluencia Rural</option>
                            <option value="Confluencia Urbana">Confluencia Urbana</option>
                            <option value="Cumelén">Cumelén</option>
                            <option value="Cuenca XV">Cuenca XV</option>
                            <option value="Don Bosco II">Don Bosco II</option>
                            <option value="Don Bosco III">Don Bosco III</option>
                            <option value="El Progreso">El Progreso</option>
                            <option value="Esfuerzo">Esfuerzo</option>
                            <option value="Gran Neuquén Norte">Gran Neuquén Norte</option>
                            <option value="Gran Neuquén Sur">Gran Neuquén Sur</option>
                            <option value="Gregorio Álvarez">Gregorio Álvarez</option>
                            <option value="Hipódromo Barrio Parque">Hipódromo Barrio Parque</option>
                            <option value="Huilliches">Huilliches</option>
                            <option value="Islas Malvinas">Islas Malvinas</option>
                            <option value="La Sirena">La Sirena</option>
                            <option value="Limay">Limay</option>
                            <option value="Mariano Moreno">Mariano Moreno</option>
                            <option value="Melipal">Melipal</option>
                            <option value="Barrio Militar">Barrio Militar</option>
                            <option value="Provincias Unidas">Provincias Unidas</option>
                            <option value="Rincón de Emilio">Rincón de Emilio</option>
                            <option value="Río Grande">Río Grande</option>
                            <option value="San Lorenzo Norte">San Lorenzo Norte</option>
                            <option value="San Lorenzo Sur">San Lorenzo Sur</option>
                            <option value="Santa Genoveva">Santa Genoveva</option>
                            <option value="Sapere">Sapere</option>
                            <option value="Terrazas Neuquén">Terrazas Neuquén</option>
                            <option value="Unión de Mayo">Unión de Mayo</option>
                            <option value="Valentina Norte Rural">Valentina Norte Rural</option>
                            <option value="Valentina Norte Urbana">Valentina Norte Urbana</option>
                            <option value="Valentina Sur Rural">Valentina Sur Rural</option>
                            <option value="Valentina Sur Urbana">Valentina Sur Urbana</option>
                            <option value="Villa Ceferino">Villa Ceferino</option>
                            <option value="Villa Farrell">Villa Farrell</option>
                            <option value="Villa Florencia">Villa Florencia</option>
                            <option value="Villa María">Villa María</option>
                        </select>
                    <?php }
                   ?>
                   <label for="horas" class="label">¿Estas disponible las 24 Horas?</label>
                   <input type="checkbox" name="horas" class="inp" <?php echo $hours ? "checked" : ''; ?>>
                   <label for="telefono" class="label">Coloca tu número de Contacto</label>
                   <input type="number" name="telefono" class="inp" placeholder="Por ejemplo: 2604265786">
                   <textarea name="sobre_mi" placeholder="<?php echo htmlspecialchars($about_user); ?>" class="inp_about" autocomplete="off"></textarea>
                   <input type="submit" value="Guardar Cambios" class="inp_sub">
               </form>
           </article>
       </header>
       <?php }
            if($edicion === '2'){ ?>
                <form action="procesar_publicacion.php" method="post" enctype="multipart/form-data" class="form_publicacion">
                    <h1 class="h1_form">Agrega una publicación de tu trabajo</h1>
                    <input type="text" name="nombre" placeholder="Titulo del Proyecto" class="inp" autocomplete="off" required>
                    <input type="file" name="foto" required class="inp">
                    <textarea name="descripcion" placeholder="Describe tu Proyecto" class="inp_about" autocomplete="off" required></textarea>
                    <input type="submit" value="Publicar Proyecto" class="inp_sub">
                </form>
            <?php }
    }
    ?>

</body>
</html>
