<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibimos el barrio
        $zona = $_POST['zona'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $correo_usuario = $_POST['correo_usuario'];
        
        // Conectar a la BD
        require_once("../../server_.php");
        $conn = mysqli_connect($server,$user,$password,$db_name);

        // Prepara la consulta
        $query = "UPDATE usuario SET barrio = '$zona' WHERE correo = '$correo_usuario'";

        if($conn->query($query) === TRUE) {
            header("Location: ../iniciar.php?exist=2&nombre=$nombre_usuario");
            exit();
        } else {
            echo "Error al registrar la zona: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<!-- === Etiquetas meta === -->
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="spanish">
    <meta name="audience" content="all">
    <meta name="category" content="service">
    <meta name="author" content="EugenioYaSupport">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex">

<!-- === Links === -->
    <link rel="stylesheet" href="../../style/normalize.css">
    <link rel="stylesheet" href="../style_form.css">
    <link rel="shortcout icon" href="../../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Crea una Cuenta</title>
</head>
<body>

    <?php
        $nombre = $_GET['name'];
        $categoria = $_GET['category'];
        $correo = $_GET['email'];
        $location = $_GET['location'];
    ?>

    <header class="header_inicio">
        <img src="../../imagenes/avatar/eugenio.png" title="EuGENIO" class="img">
        <article class="art_z">
            <p class="h1_inicio">¿Por qué es importante cargar tu zona?</p>
            <?php if ($categoria === "user") { ?>
            <p class="a_form">Cargar tu zona garantiza que veas primero a los profesionales más cercanos. ¡Así encuentras a tu experto ideal más rápido!</p>
            <?php } else { ?>
            <p class="a_form">Al agregar tu zona, tu perfil será mostrado prioritariamente a los clientes cercanos. ¡Optimiza tu visibilidad y atrae más clientes locales!</p>
            <?php } ?>
        </article>
    </header>
    
    <?php
        // Zonas para San Martín de los Andes
        if($location === '1') { ?>
            <section class="sec_inicio">
                <form action="zone_register.php" method="post" class="form">
                    <input type="hidden" name="nombre_usuario" value="<?php echo $nombre ?>">
                    <input type="hidden" name="correo_usuario" value="<?php echo $correo ?>">
                    <select name="zona" id="zona">
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
                    <input type="submit" value="CARGAR" class="inp_sub">
                </form>
            </section>
        <?php
        } elseif ($location === '2') { ?>
            <section class="sec_inicio">
                <form action="zone_register.php" method="post" class="form">
                    <input type="hidden" name="nombre_usuario" value="<?php echo $nombre ?>">
                    <input type="hidden" name="correo_usuario" value="<?php echo $correo ?>">
                    <select name="zona" id="zona">
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
                    <input type="submit" value="CARGAR" class="inp_sub">
                </form>
            </section>
        <?php } ?>

</body>
</html>

