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
    <meta name="description" content="¿Quieres ofrecer tu talento al mundo? Es más fácil de lo que crees. Regístrate hoy y comienza a llegar a quienes te buscan.">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="index,all,follow">

<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style_form_1_7.css">
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
    <title>Crea una Cuenta</title>
</head>
<body>

    <header class="header_inicio">
        <img src="../imagenes/avatar/eugenio.png" title="EuGENIO" class="img">
        <h1 class="h1_inicio">EugenioYa</h1>
    </header>

    <script src="registro.js"></script>
    <section class="sec_inicio">
        <form action="validaciones/registro.php" method="post" class="form">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['error'])) {
                    $error = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
                
                    switch ($error) {
                        case 'empty-input':
                            echo "<p class='wrong'>Error: Todos los campos son obligatorios.</p>";
                            break;
                        case 'empty-phone':
                            echo "<p class='wrong'>Error: El teléfono es obligatorio si no seleccionas la categoría 1.</p>";
                            break;
                        case 'empty-birthday':
                            echo "<p class='wrong'>Error: La fecha de nacimiento es obligatoria.</p>";
                            break;
                        case 'underage':
                            echo "<p class='wrong'>Error: Debes ser mayor de 18 años para registrarte.</p>";
                            break;
                        case 'password-mismatch':
                            echo "<p class='wrong'>Error: Las contraseñas no coinciden.</p>";
                            break;
                        default:
                            echo "<p class='wrong'>Error desconocido.</p>";
                            break;
                    }
                }
                if (isset($_GET['new'])) {
                    echo "<p class='wrong'>DEBES REGISTRARTE</p>";
                }
            }
            ?>
            <h2 class="h2_form">Crea una Cuenta</h2>
            <input type="text" name="nombre" placeholder="Nombre" class="inp_form" autocomplete="off">
            <input type="text" name="apellido" placeholder="Apellido" class="inp_form" autocomplete="off">
            <input type="email" name="correo" placeholder="Correo Electrónico" class="inp_form" autocomplete="off">
            <input type="password" name="password" placeholder="Contraseña" class="inp_form">
            <input type="password" name="password_1" placeholder="Confirma tu Contraseña" class="inp_form">
            <label for="date" class="a_form">Fecha de Nacimiento</label>
            <input type="date" name="date" class="inp_form">
            <label for="city" class="a_form">Elije tu Localidad</label>
            <select name="city" id="city" class="inp_form">
                <option value="1">San Martín de los Andes</option>
                <option value="2">Ciudad de Neuquén</option>
            </select>
            <label for="rubro" class="a_form">Elije una Categoría</label>
            <select name="rubro" id="rubro" class="inp_form">
                <option value="1" id="ninguno">Ninguna</option>
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
            <input type="text" name="oficio" id="oficio" placeholder="Profesión/Oficio" class="inp_disabled" autocomplete="off" disabled>
            <input type="number" name="telefono" id="telefono" class="inp_disabled" placeholder="Tu Número de Contacto" autocomplete="off">
            <article class="art_form">
                <label for="check" class="p_check">Estoy de acuerdo con la <a href="../politicas-de-privacidad.html" class="a_form">Política de Privacidad</a></label>
                <input type="checkbox" name="check" id="check_1" class="check">
            </article>
            <article class="art_form">
                <label for="check" class="p_check">Estoy de acuerdo con los <a href="../terminos-y-condiciones.html" class="a_form">Terminos y Condiciones</a></label>
                <input type="checkbox" name="check" id="check_2" class="check">
            </article>
            <input type="submit" value="REGISTRAR" id="btn_registro" class="btn_disabled" disabled>
        </form>
    <a href="iniciar.php" class="a_form">Inicia Sesión</a>
    <!-- <script src="path/to/your/banner.js"></script> -->
    </section>

    <div class="div1_footer">
        <p class="p_footer_ubi" id="footer_ubi"></p>
        <p class="p_footer_legal" id="footer_legal"></p>
    </div>
    <script src="../JS/version_1_7.js"></script>
    
</body>
</html>