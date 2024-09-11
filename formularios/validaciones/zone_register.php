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
    
    <section class="sec_inicio">
            <form action="zone_register.php" method="post" class="form">
                <input type="hidden" name="nombre_usuario" value="<?php echo $nombre ?>">
                <input type="hidden" name="correo_usuario" value="<?php echo $correo ?>">
                <select name="zona" id="zona">
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
                <input type="submit" value="CARGAR" class="inp_sub">
            </form>
    </section>

</body>
</html>

