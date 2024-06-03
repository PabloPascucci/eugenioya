<?php
    // Iniciamos Sesión
    session_start();

    // Traemos a través de session el id del usuario.
    if($_SESSION){
        $user_id = $_SESSION['user_loged_id'];
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
    <meta name="description" content="Encuentra en este indice el profesional que estas necesitando. EugenioYa.com">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="index,all,follow">
<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/estilo_1.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Categorías</title>
</head>
<body>

    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <!-- <img src="" title="Nombre" class="logo"> -->
                    <a href="index.html" class="a_nav">Inicio</a>
                    <a href="categorias/indice.php" class="a_nav_1">Oficios</a>
                    <a href="../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                    <a href="../formularios/registrar.php" class="a_nav">Regístrate</a>
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
                    <a href="../perfiles/perfil.php" class="a_nav">Perfil</a>
                    <a href="categorias/indice.php" class="a_nav_1">Oficios</a>
                    <a href="../mensajes/chat.php" class="a_nav">Chat</a>
                    <a href="---" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <div class="div2_header_indice">
        <!-- <img src="---" alt=""> Acá va el genio -->
        <p class="p2_header_indice">Navegá por nuestras categorías y descrubrí una selección de servicios que se adaptan a tus necesidades especificas.</p>
    </div>

    <section class="sec_categorias">
        <h2 class="h__categorias">Categorías</h2>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=2" class="p_categoria">Artistas</a>
                <span class="material-symbols-outlined">
                    brush
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=3" class="p_categoria">Belleza y Estética</a>
                <span class="material-symbols-outlined">
                    spa
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=4" class="p_categoria">Carpintería</a>
                <span class="material-symbols-outlined">
                    carpenter
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=5" class="p_categoria">Cerrajería</a>
                <span class="material-symbols-outlined">
                    key
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=6" class="p_categoria">Construcción y Reformas</a>
                <span class="material-symbols-outlined">
                    construction
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=7" class="p_categoria">Cuidado del Hogar y Limpieza</a>
                <span class="material-symbols-outlined">
                    cottage
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=8" class="p_categoria">Cuidado Infantil y Acompañamiento Hospitalario</a>
                <span class="material-symbols-outlined">
                    digital_wellbeing
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=9" class="p_categoria">Educación y Tutoría</a>
                <span class="material-symbols-outlined">
                    school
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=10" class="p_categoria">Electricistas</a>
                <span class="material-symbols-outlined">
                    bolt
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=11" class="p_categoria">Fotógrafo</a>
                <span class="material-symbols-outlined">
                    photo_camera
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=12" class="p_categoria">Gasistas</a>
                <span class="material-symbols-outlined">
                    local_fire_department
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=13" class="p_categoria">Jardinería y Paisajismo</a>
                <span class="material-symbols-outlined">
                    garden_cart
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=14" class="p_categoria">Plomería</a>
                <span class="material-symbols-outlined">
                    water_drop
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=15" class="p_categoria">Reparación de Automóviles y Mecánica</a>
                <span class="material-symbols-outlined">
                    car_repair
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=16" class="p_categoria">Reparación de Celulares y PC</a>
                <span class="material-symbols-outlined">
                    devices
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=17" class="p_categoria">Reparación de Electrodomésticos</a>
                <span class="material-symbols-outlined">
                    coffee_maker
                    </span>
            </div>
        </article>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=18" class="p_categoria">Servicios de Catering y Eventos</a>
                <span class="material-symbols-outlined">
                    event
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=19" class="p_categoria">Servicios de Diseño Gráfico y Web</a>
                <span class="material-symbols-outlined">
                    space_dashboard
                    </span>
            </div>
        </article><article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=18" class="p_categoria">Servicios de Marketing y Publicidad</a>
                <span class="material-symbols-outlined">
                    ad
                    </span>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=19" class="p_categoria">Transporte y Mudanza</a>
                <span class="material-symbols-outlined">
                    local_shipping
                    </span>
            </div>
        </article>
        <?php if(!$_SESSION){ ?>
            <a href="../formularios/registrar.php" class="call_to_action">¡Registrate Ahora!</a>
        <?php } ?>
    </section>

    <footer class="footer">
        <div class="div_footer">
            <article class="art_div_footer">
                <!-- <img src="" alt=""> Logo -->
            </article>
            <article class="art_div_footer">
                <a href="----" class="a_footer">Sobre Eugenio</a>
                <a href="----" class="a_footer">Contacto</a>
                <a href="../formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                <a href="../formularios/inicio.php" class="a_footer">Inicia Sesión</a>
                <a href="indice.php" class="a_footer">Oficios</a>
            </article>
            <article class="art_div_footer">
                <a href="----" class="a_footer">Política de Privacidad</a>
                <a href="----" class="a_footer">Requisitos para Unirte como Oficio</a>
                <a href="----" class="a_footer">Trabaja Junto a Nosotros</a>
            </article>
            <article class="art_div_footer">
                <!-- <img src="" alt=""> Imagen del avatar -->
            </article>
        </div>
        <div class="div1_footer">
            <p class="p_footer_ubi">San Martín de los Andes, Neuquén, Argentina</p>
            <p class="p_footer_legal">EugenioYa © 2024 | Todos los Derechos Reservados</p>
        </div>
    </footer>
    
</body>
</html>