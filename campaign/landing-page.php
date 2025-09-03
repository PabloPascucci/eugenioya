<?php
// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// Esta página es destinada a ser una landing page
// para acceder a ella se podra hacer mediante el QR de la campaña que se este haciendo en folleteria
// Generalmente se usara este archivo para todas las campañas QR, exeptuando casos personalizados
// Para acceder a esta página, la URL debe contener variables para extrearlas con GET, caso contrario el visitante sera expulsado al index.html
// ==========================
// Landing page para las siguientes campañas --> 'Folleteria a oficina de empleo SMA' con el utm_source=oficina-de-empleo.
// ==========================
// Creación de archivo: 18/06/2025 N/D
// Última Modificación: 1/09/2025 07:25h
// Subido a GitHub: / /
// ==========================
// Este archivo transmite datos de rastreo a través de la URL con UTM.
// Este archivo transmite datos de acciones a través de la URL.
// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- === Meta datos === -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="spanish">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="audience" content="all">
    <meta name="category" content="service">
    <meta name="keywords" content="prestadores de servicios en neuquen, plomeros en neuquen, en san martin de los andes">
    <meta name="description" content="Encontrá al profesional que necesites cerca tuyo">
    <meta name="author" content="Eugennioya">
    <meta name="copyright" content="Eugenioya">
    <meta name="robots" content="noindex">

    <!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/estilo_1_7.css">
    <link rel="stylesheet" href="style_campaign.css">
    <link rel="shortcout icon" href="../imagenes/logo/icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- === Scripts === -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>

    <title>¡Bienvenido a EugenioYa!</title>
</head>
<body>
    <?php
    // Verificar si las variables UTM esta presentes
    if (isset($_GET['utm_source']) || isset($_GET['utm_medium']) || isset($_GET['utm_campaign']) || isset($_GET['utm_target'])) {
        // Procesar las UTMs
        $utm_source = $_GET['utm_source'] ?? 'Fail';
        $utm_medium = $_GET['utm_medium'] ?? 'Fail';
        $utm_campaign = $_GET['utm_campaign'] ?? 'Fail';
        $target = $_GET['utm_target'] ?? 'Fail';
    ?>

    <header class="header">
        <img src="../imagenes/avatar/eugenio.png" title="Genio Eugenio" class="genio_head">
    </header>

    <section class="sec_1">
        <h1 class="bold_text">EugenioYa</h1>
        <?php if($target == 'profesional') {
            echo "<h2 class='blue_text'>Ofrecé tu servicio en tu zona</h2>";
        } else {
            echo "<h2 class='blue_text'>Encontrá al profesional que necesites en tu zona</h2>";
        }
            ?>

        <article class="art">
            <div class="div_art">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M480-80q-106 0-173-31t-67-79q0-26 23-49.5t63-38.5l45 42q-20 5-39 18.5T299-190q17 20 70.5 35T480-140q57 0 111-15t71-35q-14-15-35-28t-41-18l46-42q42 15 65 38.5t23 49.5q0 48-67 79T480-80Zm1-195q109-81 164-164t55-155q0-112-71-169t-149-57q-77 0-148.5 57T260-594q0 73 55 152t166 167Zm-1 75Q340-304 270-402t-70-192q0-71 25.5-124.5t66-89.5q40.5-36 90-54t98.5-18q49 0 99 18t90 54q40 36 65.5 89.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520Zm0-80Z"/></svg>
                <?php 
                    if($target == 'profesional') {
                        echo "<p class='icon_down_p'>Mostrate en tu zona</p>";
                    } else {
                        echo "<p class='icon_down_p'>Elegí por zona</p>";
                    }
                ?>

            </div>
            <div class="div_art">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M480-711v324l137 104-55-173 126-82H537l-57-173ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Z"/></svg>
                <?php
                    if($target == 'profesional') {
                        echo "<p class='icon_down_p'>Recibí opiniones reales</p>";
                    } else {
                        echo "<p class='icon_down_p'>Opiniones reales</p>";
                    }
                ?>

            </div>
        </article>
    </section>

    <section class="sec_1">
        <a href="evento.php?utm_source=<?php echo $utm_source ?>&utm_medium=<?php echo $utm_medium ?>&utm_campaign=<?php echo $utm_campaign ?>&redirect=register" class="register_button">Registrate Aquí</a>
        <p class="bold_text_2">Conectamos a personas con profesionales confiables, en minutos, sin complicaciones.</p>
    </section>

    <section class="sec_profiles">
            <?php
                    // URL en caso de error
                $url_redirect_user = urlencode("https://eugenioya.com/");

                    // Conectamos a la BD
                require_once("../server_.php");

                $conn = mysqli_connect($server, $user, $password, $db_name);

                    // Verificar la conexión
                if ($conn->connect_error) {
                    header("Location: ../pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect_user");
                    exit();
                    $conn->close();
                }

                    // Seleccionar usuarios con foto de perfil al azar y como máximo 3.
                $users_query = "SELECT * from usuario WHERE foto_perfil IS NOT NULL AND categoria != '1' ORDER BY RAND() LIMIT 3";
                $result = mysqli_query($conn, $users_query);
                
                $usuarios = [];

                if($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $usuarios[] = $row;
                    }
                }

                foreach ($usuarios as $usuario) { ?>
                    <article class="art_profiles">
                        <div class="div_profile">
                            <img src="<?php echo'../perfiles/' . $usuario['foto_perfil'] ?>" title="<?php echo $usuario['nombre'] ?>" class="img_profile">
                        </div>
                        <div class="div_profile">
                            <h3 class="user_name"><?php echo $usuario['nombre'] . " " . $usuario['apellido'] ?></h3>
                            <p class="user_prof"><?php echo $usuario['profesion'] ?></p>
                        </div class="div_profile">
                        <a href="evento.php?utm_source=<?php echo $utm_source ?>&utm_medium=<?php echo $utm_medium ?>&utm_capaign=<?php echo $utm_campaign ?>&redirect=profile_view&id_profile=<?php echo $usuario['id_usuario'] ?>" class="a_usuario">Ver Perfil</a>
                    </article>
                <?php } 
                $conn->close();
            ?>

            <a href="evento.php?utm_source=<?php echo $utm_source ?>&utm_medium=<?php echo $utm_medium ?>&utm_campaign=<?php echo $utm_campaign ?>&action=index_view" class="a_index">Descubre Más Profesionales Aquí</a>

        </section>

    <section class="art">
        <div class="div_art_2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M730-400v-130H600v-60h130v-130h60v130h130v60H790v130h-60Zm-370-81q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM40-160v-94q0-35 17.5-63.5T108-360q75-33 133.34-46.5t118.5-13.5Q420-420 478-406.5T611-360q33 15 51 43t18 63v94H40Zm60-60h520v-34q0-16-9-30.5T587-306q-71-33-120-43.5T360-360q-58 0-107.5 10.5T132-306q-15 7-23.5 21.5T100-254v34Zm260-321q39 0 64.5-25.5T450-631q0-39-25.5-64.5T360-721q-39 0-64.5 25.5T270-631q0 39 25.5 64.5T360-541Zm0-90Zm0 411Z"/></svg>
            <p class="icon_down_p_2">Regístrate</p>
        </div>
        <div class="div_art_2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M796-121 533-384q-30 26-69.96 40.5Q423.08-329 378-329q-108.16 0-183.08-75Q120-479 120-585t75-181q75-75 181.5-75t181 75Q632-691 632-584.85 632-542 618-502q-14 40-42 75l264 262-44 44ZM377-389q81.25 0 138.13-57.5Q572-504 572-585t-56.87-138.5Q458.25-781 377-781q-82.08 0-139.54 57.5Q180-666 180-585t57.46 138.5Q294.92-389 377-389Z"/></svg>
            <?php
                if($target == 'profesional') {
                    echo "<p class='icon_down_p_2'>Publicá lo que ofreces</p>";
                } else {
                    echo "<p class='icon_down_p_2'>Busca lo que necesites</p>";
                }
            ?> 
            
        </div>
        <div class="div_art_2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M880-81 721-240H300q-24.75 0-42.37-17.63Q240-275.25 240-300v-80h440q24.75 0 42.38-17.63Q740-415.25 740-440v-280h80q24.75 0 42.38 17.62Q880-684.75 880-660v579ZM140-425l75-75h405v-320H140v395ZM80-280v-540q0-24.75 17.63-42.38Q115.25-880 140-880h480q24.75 0 42.38 17.62Q680-844.75 680-820v320q0 24.75-17.62 42.37Q644.75-440 620-440H240L80-280Zm60-220v-320 320Z"/></svg>
            <?php
                if($target == 'profesional') {
                    echo "<p class='icon_down_p_2'>Conectá con clientes</p>";
                } else {
                    echo "<p class='icon_down_p_2'>Contacta</p>";
                }
            ?>
            
        </div>
        <div class="div_art_2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#007BFF"><path d="M480-711v324l137 104-55-173 126-82H537l-57-173ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Z"/></svg>
            <?php
                if($target == 'profesional') {
                    echo "<p class='icon_down_p_2'>Recibí calificaciones</p>";
                } else {
                    echo "<p class='icon_down_p_2'>Califica</p>";
                }
            ?>
            
        </div>
    </section>

    <section class="sec_1">
        <p class="bold_text">¿Qué estas esperando?</p>
        <a href="evento.php?utm_source=<?php echo $utm_source ?>&utm_medium=<?php echo $utm_medium ?>&utm_campaign=<?php echo $utm_campaign ?>&redirect=register" class="register_button">Unirme Gratis</a>
        <a href="evento.php?utm_source=<?php echo $utm_source ?>&utm_medium=<?php echo $utm_medium ?>&utm_campaign=<?php echo $utm_campaign ?>&redirect=index_view" class="proffesional_button">Descubre Más Profesionales Aquí</a>
    </section>

    <footer class="footer">
        <div class="art">
            <img src="../imagenes/avatar/eugenio.png" title="Genio Eugenio" class="img_footer">
            <img src="../imagenes/logo/logo_1_7.png" title="EugenioYa" class="img_footer">
        </div>
        <div>
            <a href="../politicas-de-privacidad.html" class="a_footer">Políticas de Privacidad |</a>
            <a href="../terminos-y-condiciones.html" class="a_footer">Términos y Condiciones</a>
        </div>
        <div class="div1_footer">
            <p class="p_footer_ubi_campaign" id="footer_ubi"></p>
            <p class="p_footer_legal_campaign" id="footer_legal"></p>
        </div>
        <script src="../JS/version_1_8_1.js"></script>
    </footer>
    
</body>
</html>
<?php
} else {
    // Si no hay UTM
    header("Location: https://eugenioya.com/");
    exit();
}
?>