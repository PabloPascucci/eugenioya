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
    <link rel="stylesheet" href="style_1_7.css">
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
    <title>Categorías</title>

    <!-- ==== Cookie GA ==== -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
    </script>

    <script>
        function acceptCookies() {
            document.cookie = "consent=true; max-age=31536000; path=/";
            gtag('js', new Date());
            gtag('config', 'G-6B9S4R8L22');
            document.getElementById('cookie-banner').style.display = 'none';
        }

        function checkConsent() {
            return document.cookie.split(';').some((item) => item.trim().startsWith('consent='));
        }

        window.onload = function() {
            if (!checkConsent()) {
                document.getElementById('cookie-banner').style.display = 'block';
            } else {
                gtag('js', new Date());
                gtag('config', 'G-6B9S4R8L22');
            }
        }
    </script>
</head>
<body>

    <div id="cookie-banner" style="display:none; position:fixed; bottom:0; width:100%; background:#000; color:#fff; text-align:center; padding:10px;">
        Este sitio utiliza cookies para mejorar tu experiencia. <a href="../politicas-de-privacidad.html" style="color:#fff; text-decoration:underline;">Más información</a>.
        <button onclick="acceptCookies()" style="margin-left: 20px; padding: 5px 10px; background: #007BFF; color: #fff; border: none; cursor: pointer;">Aceptar</button>
    </div>

    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
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
            <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                <ul class="barr_nav">
                    <img src="../imagenes/logo/logo_nav.png" title="EugenioYa" class="logo">
                    <?php if ($user_id === '1') {?>
                        <a href="../admin/admin.php" class="a_nav">Perfil</a>
                    <?php } else { ?>
                        <a href="../perfiles/perfil.php" class="a_nav">Perfil</a>
                    <?php } ?>
                    <a href="categorias/indice.php" class="a_nav_1">Oficios</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                    <a href="../nosotros.html" class="a_nav">Contacto</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <section class="sec_categorias">
        <h2 class="h__categorias">Categorías</h2>
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=2" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M213.56-111.26q-34.79 0-69.78-13.06-35-13.05-62.39-43.59 36.91-12 52.03-34.41 15.12-22.4 15.84-61.88.72-44.46 32.18-75.69 31.45-31.22 77.25-31.22 45.79 0 77.6 31.95 31.82 31.95 31.82 77.59 0 65.92-44.82 108.11-44.81 42.2-109.73 42.2Zm.01-64.31q35 0 62.5-25t27.5-61q0-20-12.5-32.5t-32.5-12.5q-20 0-32.5 12.5t-12.5 32.5q0 39-8.5 57.5t-31.5 22.5q6 1 20 3.5t20 2.5Zm235.02-176.52-95.5-100.5 384.13-384.37q14-13.76 31-14.38 17-.62 32 14.38l34.74 34.74q15 15 14.38 32.5-.62 17.5-14.38 31.5L448.59-352.09Zm-190.02 90.52Z"/></svg></a>
                <p class="p_categoria">Artistas</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=3" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M480.24-74.02q-74.63-8-147.47-42.37T202.36-211.3q-57.58-60.55-93.08-148.88-35.5-88.34-35.5-204.8v-44.24h43.98q51.23 0 110.44 20.02 59.21 20.03 104.5 50.59 9.01-90.25 50.54-186.34 41.52-96.09 96.52-165.05 55 68.96 96.76 165.05 41.77 96.09 50.78 186.34 46.24-29.04 104.93-49.82 58.68-20.79 111.68-20.79h42.31v42.09q0 117.16-35.38 205.98t-92.86 149.52q-57.48 60.7-130.18 95.03-72.69 34.34-147.56 42.58Zm5.13-69.61q-11.72-183.37-106.92-278-95.19-94.63-235.54-117.74 13.48 189.41 111.67 283.46 98.18 94.04 230.79 112.28Zm-6.13-252.17q14.24-25.77 37.18-53.49 22.95-27.73 45.71-47.97 4.04-66.81-19.76-133.1-23.8-66.29-62.61-140.1-38.09 72.61-62.01 139.38-23.92 66.78-19.88 133.82 22.28 19.04 44.95 47.81 22.67 28.78 36.42 53.65Zm74.26 233.26q45.57-16.76 90.54-44.68 44.97-27.92 81.37-72.12 36.4-44.2 61.18-108.19 24.78-63.99 30.02-151.84-102.89 17.24-181.62 73.59-78.73 56.35-117.21 139.95 12 38.05 21.36 76.14 9.36 38.08 14.36 87.15ZM479.24-395.8Zm74.26 233.26Zm-68.13 18.91Zm32.41-182.2ZM480.24-74.02Z"/></svg></a>
                <p class="p_categoria">Belleza y Estética</p>
            </div>
        </article>

        <article class="art_categorias">
        <div class="div_categorias">
                <a href="categorias.php?profesion=24" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M626-195v82q0 15-12 24t-28 9H113q-14 0-23.5-9.5T80-113v-298q0-14 9.5-23.5T113-444h133v-206q0-97 68.5-163.5T480-880h173q95 0 161 67.5T880-650v570h-60v-115H626Zm0-60h194v-395q0-70-48.5-120T653-820H480q-72 0-123 49t-51 121v206h280q16 0 28 9t12 24v156ZM400-575v-60h326v60H400Zm-47 313 213-122H140l213 122Zm0 55L140-329v189h426v-189L353-207ZM140-384v244-244Z"/></svg></a>
                <p class="p_categoria">Cadetería</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=4" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M623.85-88q-9.69 9.33-21.95 14.24-12.27 4.91-25.99 4.91-13.71 0-26.49-4.91-12.78-4.91-22.29-14.24l-76.37-75.85q-9.43-9.19-14.73-20.24-5.31-11.04-6.38-22.34-1.48-11.48 2.02-22.68 3.5-11.19 11.22-22.87l15.28-20.04-348.32-491.91 151.37-151.14L808.09-369.2q10.19 10.2 15.29 22.59t5.1 25.11q0 12.96-5.1 25.77-5.1 12.82-15.29 23.01L623.85-88ZM507.91-320.24l124.33-125.33-371.02-372.78-62.61 62.13 309.3 435.98Zm66.96 184.5 185.48-185.72-78.13-77.13L497.5-213.11l77.37 77.37Zm-66.96-184.5 124.33-125.33-124.33 125.33Z"/></svg></a>
                <p class="p_categoria">Carpintería</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=5" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M280.06-409.37q-29.02 0-49.85-20.78-20.84-20.77-20.84-49.79t20.78-49.85q20.77-20.84 49.79-20.84t49.85 20.78q20.84 20.77 20.84 49.79t-20.78 49.85q-20.77 20.84-49.79 20.84ZM280-234.5q-102.07 0-173.79-71.73Q34.5-377.96 34.5-480.06q0-102.09 71.71-173.77Q177.93-725.5 280-725.5q73.91 0 129.35 34.96 55.43 34.95 86.45 104.91h355.03L966.7-470 795.87-313.17l-88.24-64.48-87.76 63.76-75.96-60.48h-48.13q-25 60.72-79.89 100.29Q360.99-234.5 280-234.5Zm0-65.5q58.72 0 107.84-39.1 49.12-39.1 62.64-100.53h117.11l53.04 44.28 88-63 82 61.52 82.13-74.45-48.85-49.09H450.48q-11.28-56.96-59.67-98.29Q342.43-660 280-660q-75 0-127.5 52.5T100-480q0 75 52.5 127.5T280-300Z"/></svg></a>
                <p class="p_categoria">Cerrajería</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=6" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M770.39-114.02 517-367.17l60.83-61.07 253.39 253.39-60.83 60.83Zm-585.78 0-60.83-60.83 292.39-292.39-107.71-107.48-23 23-41.37-41.37v82.61l-25.2 25.2L91.63-612.54l25.2-25.2h83.6l-45.6-45.61 132.91-132.91q17.48-17.48 38.31-23.72 20.84-6.24 45.56-6.24 24.48 0 45.31 8.86 20.84 8.86 38.56 26.1L347.28-703.3l47.76 47.76-24 24 104.72 104.71 122-121.76q-7.76-12.76-12.26-29.76t-4.5-35.76q0-53.96 39.34-93.41 39.33-39.46 93.29-39.46 15.96 0 27.29 3.36 11.34 3.36 19.06 9.08l-85 85.24 73.09 73.08 85-85.24q5.95 8.48 9.93 21.06 3.98 12.57 3.98 28.29 0 54.2-39.58 93.41-39.57 39.22-93.77 39.22-17.76 0-30.52-2.38-12.76-2.38-23.52-7.14L184.61-114.02Z"/></svg></a>
                <p class="p_categoria">Construcción y Reformas</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=7" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M155.22-117.37v-401l-82.57 63.04-39.35-52.3 121.92-92.73V-716.7h65.5v66.09l259.04-197.04 446.7 341.02-39.35 51.3-82.57-63.04v401H155.22Zm65.5-65.26h225.69v-160h65.5v160h227.13v-385.8L479.76-765.96 220.72-568.52v385.89Zm-65.5-584.07q.48-49.82 35.62-84.69t83.91-34.87q23.04 0 38.57-16.2 15.53-16.19 15.53-37.87h65.74q-.72 48.97-35.44 84.27-34.73 35.3-84.33 35.3-21.79 0-37.83 15.57-16.03 15.57-16.03 38.49h-65.74Zm65.5 584.07H739.04 220.72Z"/></svg></a>
                <p class="p_categoria">Cuidado del Hogar y Limpieza</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=8" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M480-614.63q-57.08 0-97.57-40.5-40.5-40.49-40.5-97.72 0-57.24 40.5-97.69Q422.92-891 480-891q57.08 0 97.57 40.46 40.5 40.45 40.5 97.69 0 57.23-40.5 97.72-40.49 40.5-97.57 40.5Zm.08-65.74q32.44 0 52.46-20.1 20.03-20.1 20.03-52.52 0-32.33-20.11-52.42-20.11-20.09-52.54-20.09-32.44 0-52.46 20.11-20.03 20.1-20.03 52.54t20.11 52.46q20.11 20.02 52.54 20.02ZM480-69 235.46-313.3q-18.72-18.96-30.08-46.54-11.36-27.57-11.36-63.86 0-58.3 41.3-99.59 41.29-41.3 99.69-41.3 27.58 0 50.96 12.36 23.38 12.36 41.57 30.56L480-469.22l52.46-52.45q17.95-17.96 41.45-30.44 23.5-12.48 51.08-12.48 58.4 0 99.81 41.3 41.42 41.29 41.42 99.65 0 36.2-11.48 63.79-11.48 27.59-30.2 46.55L480-69Zm0-98.48 194.3-194.54q11.79-11.6 17.67-26.21 5.88-14.61 5.88-35.38 0-29.04-21.95-50.94-21.96-21.91-50.89-21.91-13.53 0-25.2 4.97-11.67 4.96-19.1 12.52L480-378.5l-100.46-99.98q-7.74-7.74-19.53-12.86-11.79-5.12-25.16-5.12-28.89 0-50.8 21.91-21.9 21.9-21.9 50.94 0 20.7 5.74 35.26 5.73 14.57 17.54 26.31L480-167.48Zm0-585.45Zm0 420.84Z"/></svg></a>
                <p class="p_categoria">Cuidado Infantil y Acompañamiento Hospitalario</p>
            </div>
        </article>
        
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=9" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M479-117.61 186.61-277.57v-240L34.74-600 479-842.63 925.26-600v319.63h-65.5v-281.52l-88.13 44.32v240L479-117.61Zm0-313.98L787.3-600 479-765.41 172.7-600 479-431.59Zm0 239.76 226.89-125.32v-161.31L479-357.37 252.11-480.46v163.31L479-191.83Zm1-239.76Zm-1 76.39Zm0 0Z"/></svg></a>
                <p class="p_categoria">Educación y Tutoría</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=10" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="m395.63-168.83 275.65-331.65H493.2l35.28-280.74-250.13 361.46h152.8l-35.52 250.93ZM314.74-73.3l40-280H151.15l369.33-533.63h87.89l-40 320h244.78l-411 493.63h-87.41Zm160.69-402.22Z"/></svg></a>
                <p class="p_categoria">Electricistas</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=11" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M479.44-265.57q73.28 0 122.64-49.3 49.35-49.3 49.35-122.45 0-73.16-49.3-122.14-49.3-48.97-122.45-48.97-73.16 0-122.14 48.9-48.97 48.9-48.97 121.97 0 73.28 48.9 122.64 48.9 49.35 121.97 49.35Zm.06-64.78q-46.07 0-76.11-30.54t-30.04-76.61q0-46.07 30.04-76.23 30.04-30.16 76.11-30.16t76.73 30.16q30.66 30.16 30.66 76.23 0 46.07-30.66 76.61t-76.73 30.54ZM142.15-114.02q-27.6 0-47.86-20.27-20.27-20.26-20.27-47.86v-508.7q0-26.7 20.27-47.53 20.26-20.84 47.86-20.84h141.74l75.39-87h241.44l75.63 87h141.5q26.7 0 47.53 20.84 20.84 20.83 20.84 47.53v508.7q0 27.6-20.84 47.86-20.83 20.27-47.53 20.27h-675.7Zm0-68.13h675.7v-508.7H645.48l-74.91-87H389.91l-75.87 87H142.15v508.7ZM480-437Z"/></svg></a>
                <p class="p_categoria">Fotógrafos</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=12" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M224.78-400q0 59.18 26.11 111.45t73.28 87.59q-4-10.99-6-22.68t-2-22.97q1.2-30.8 13.32-57.61 12.12-26.8 34.4-49.08L480-467.65 596.35-353.3q22.28 22.28 34.4 49.08 12.12 26.81 13.08 57.61 0 11.28-2 22.97t-5.76 22.68q46.69-35.32 73.04-87.59 26.35-52.27 26.35-111.45 0-52.09-22.07-102.06t-63.35-91.96q-21 14.28-43.84 22.42-22.84 8.14-45.21 8.14-60.27 0-100.63-39.94-40.36-39.95-42.99-101.99v-20q-44.36 32.26-79.91 71.32-35.55 39.05-60.59 81.35-25.04 42.31-38.57 86.61-13.52 44.31-13.52 86.11ZM480-372.17l-68.31 67.56q-13.82 13.57-20.96 29.91-7.14 16.35-7.14 35.65 0 39.5 28.08 66.88 28.09 27.39 68.37 27.39 40.29 0 68.33-27.44t28.04-66.97q0-19.05-7.12-35.4-7.13-16.36-20.64-29.93L480-372.17Zm3.59-473.57V-708q0 32.48 22.45 54.44 22.45 21.97 54.94 21.97 17.2 0 32.04-7.14 14.83-7.14 26.35-21.66l19.67-24.39q76.21 43.41 120.38 119.74 44.17 76.32 44.17 164.97 0 135.53-94.05 229.59-94.05 94.07-229.56 94.07-135.5 0-229.54-94.05Q156.41-264.5 156.41-400q0-129.2 87.8-249.61Q332-770.02 483.59-845.74Z"/></svg></a>
                <p class="p_categoria">Gasistas</p>
            </div>
        </article>
        
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=13" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M282.24-115.93q-35.44 0-60.63-24.96-25.2-24.96-25.2-61.15v-381.72l-79.32-192.17H36.65v-68.14h125.7l67.48 160.48h623.21q19.17 0 29.48 16.54 10.31 16.53 1.35 33.44L761.5-392.63q51.24 6.96 85.36 45.67t34.12 91.33q0 57.61-40.05 98.15-40.05 40.55-97.56 40.55-58.52 0-98.54-40.56-40.03-40.55-40.03-98.03 0-19.05 5.18-37.35 5.17-18.31 15.15-33.82l-143.2-12.01-119.69 178.55q-14.11 21.3-34.76 32.76-20.65 11.46-45.24 11.46Zm401.13-273.09 115.22-226.44H256.93l59.37 141.55q10.29 24.8 30.45 40.2 20.16 15.41 47.73 17.93l288.89 26.76ZM284.69-180.76q1.51 0 17.27-9.52l104.56-155.13q-38.13-3.76-75.01-18.15-36.88-14.4-55.64-53.31l-13-28v243.93q0 8.63 6.99 14.4 6.99 5.78 14.83 5.78Zm457.69-6.39q30.58 0 51.36-21.17 20.78-21.18 20.78-51 0-30.77-20.76-51.43t-51.31-20.66q-29.78 0-50.99 20.68-21.2 20.69-21.2 51.45 0 29.8 21.16 50.96 21.16 21.17 50.96 21.17Zm-59.01-201.87-288.89-26.76 288.89 26.76Z"/></svg></a>
                <p class="p_categoria">Jardinería y Paisajismo</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=22" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M164.96-487.63q-38.45 0-64.81-26.55-26.37-26.55-26.37-65t26.49-64.88q26.49-26.44 64.86-26.44 38.57 0 64.92 26.46 26.36 26.45 26.36 65 0 38.54-26.45 64.97-26.46 26.44-65 26.44Zm188.01-172.39q-38.35 0-64.71-26.48-26.37-26.49-26.37-64.84 0-38.36 26.48-64.83 26.49-26.48 64.84-26.48 38.36 0 64.83 26.45 26.48 26.46 26.48 65 0 38.45-26.55 64.81-26.55 26.37-65 26.37Zm253.79 0q-38.33 0-64.8-26.49-26.48-26.49-26.48-64.86 0-38.56 26.55-64.92t65-26.36q38.35 0 64.83 26.55 26.49 26.56 26.49 65.02 0 38.36-26.63 64.71-26.63 26.35-64.96 26.35Zm188.11 172.39q-38.57 0-64.92-26.56-26.36-26.55-26.36-65.02 0-38.66 26.45-64.97 26.46-26.32 65-26.32 38.45 0 64.81 26.55 26.37 26.55 26.37 65t-26.49 64.88q-26.49 26.44-64.86 26.44ZM264.33-71.17q-42.96 0-70.56-32.12t-27.6-76.17q0-42.58 26.1-75.44t55.1-63.55q21.76-22.75 41-47.25t36.72-50.97q29.32-44.42 65.73-82.69 36.42-38.27 89.16-38.27 52.74 0 89.66 38.35 36.93 38.34 66.51 83.61 17.29 26.05 35.93 50.38 18.65 24.33 40.55 46.81 29 30.72 55.1 63.58t26.1 75.44q0 44.05-27.6 76.17-27.6 32.12-70.56 32.12-54.59 0-107.83-9.12Q534.6-89.41 480-89.41t-107.84 9.12q-53.24 9.12-107.83 9.12Z"/></svg></a>
                <p class="p_categoria">Mascotas</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=14" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M479.48-208.96q16.72 0 25.93-6.08 9.22-6.08 9.22-17.59 0-11.72-9.1-18.32-9.1-6.59-26.99-6.59-43.26 0-84.37-26.26-41.1-26.27-52.87-90.4-1.97-9.26-9.34-15.35-7.37-6.08-16.33-6.08-12.15 0-18.53 8.98-6.38 8.98-4.38 18.69 15.03 84.24 71.05 121.62 56.03 37.38 115.71 37.38Zm.5 134.94q-139.55 0-232.76-95.71-93.2-95.72-93.2-238.27 0-101.41 80.94-220.84Q315.89-748.26 480-887.89q164.11 139.63 245.16 259.05Q806.22-509.41 806.22-408q0 142.55-93.35 238.27-93.35 95.71-232.89 95.71Zm0-68.13q111.06 0 184.47-75.89 73.4-75.89 73.4-189.96 0-77.8-65.9-177.23Q606.04-684.65 480-796.89 353.96-684.65 288.05-585.23q-65.9 99.43-65.9 177.23 0 114.07 73.39 189.96 73.38 75.89 184.44 75.89Zm.02-338.81Z"/></svg></a>
                <p class="p_categoria">Plomería</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=15" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M445.93-69v-125.5H154.5v-68.13h651v68.13H514.07V-69h-68.14ZM325.18-511.37q12.82 0 21.32-8.68 8.5-8.67 8.5-21.5 0-12.58-8.68-21.2-8.67-8.62-21.5-8.62-12.82 0-21.32 8.8-8.5 8.79-8.5 21.38 0 12.82 8.68 21.32 8.67 8.5 21.5 8.5Zm310 0q12.82 0 21.32-8.68 8.5-8.67 8.5-21.5 0-12.58-8.68-21.2-8.67-8.62-21.5-8.62-12.82 0-21.32 8.8-8.5 8.79-8.5 21.38 0 12.82 8.68 21.32 8.67 8.5 21.5 8.5ZM194.5-625.15l66.24-193.37q5.52-15.63 18.49-25.49 12.98-9.86 28.77-9.86h344q15.6 0 28.42 9.69 12.82 9.69 18.36 25.18l66.72 193.99v272.64q0 12.89-8.48 21.32-8.49 8.42-21.02 8.42h-12q-12.53 0-21.02-8.42-8.48-8.43-8.48-21.32v-58.26h-429v58.26q0 12.89-8.48 21.32-8.49 8.42-21.02 8.42h-12q-12.53 0-21.02-8.42-8.48-8.43-8.48-21.32v-272.78Zm82.5-41.22h407l-41-122H317l-40 122Zm-17 60v130-130Zm0 130h440v-130H260v130Z"/></svg></a>
                <p class="p_categoria">Reparación de Automóviles y Mecánica</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=16" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M74.02-154.02v-98.13h80v-485.7q0-28.45 19.89-48.41 19.89-19.96 48.24-19.96h624.07v68.37H222.15v485.7h235.7v98.13H74.02Zm477.89 0q-14.42 0-24.24-9.82-9.82-9.82-9.82-24.25v-455.69q0-14.43 9.82-24.25t24.24-9.82h300q14.4 0 24.35 9.82 9.96 9.82 9.96 24.25v455.69q0 14.43-9.96 24.25-9.95 9.82-24.35 9.82h-300Zm30.72-98.13h238.8V-613.3h-238.8v361.15Zm0 0h238.8-238.8Z"/></svg></a>
                <p class="p_categoria">Reparación de Celulares y PC</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=17" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M222.15-74.02q-26.6 0-47.36-20.27-20.77-20.26-20.77-47.86v-675.7q0-26.7 20.77-47.53 20.76-20.84 47.36-20.84h584.07v68.37H699.93v53.78q0 15.86-13.6 29.97-13.6 14.1-29.7 14.1H373.5q-15.86 0-29.46-14.1-13.61-14.11-13.61-29.97v-53.78H222.15v675.7h184.42q-36.33-25.76-56.23-61.81Q330.43-240 330.43-293v-193h369.5v193q0 53-20.52 89.04-20.52 36.05-56.61 61.81h183.42v68.13H222.15ZM514.57-166q51.5 0 87-37.04t35.5-89.96v-130.37h-244V-293q0 52.92 35 89.96 35 37.04 86.5 37.04Zm-.5-394q16.57 0 27.78-11.21 11.22-11.21 11.22-27.79t-11.22-27.79Q530.64-638 514.07-638q-16.34 0-27.67 11.21-11.33 11.21-11.33 27.79t11.33 27.79Q497.73-560 514.07-560Zm1 136.63Z"/></svg></a>
                <p class="p_categoria">Reparación de Electrodomésticos</p>
            </div>
        </article>
        
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=23" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M480-480Zm0 360q-18 0-34.5-6.5T416-146L148-415q-35-35-51.5-80T80-589q0-103 67-177t167-74q48 0 90.5 19t75.5 53q32-34 74.5-53t90.5-19q100 0 167.5 74T880-590q0 49-17 94t-51 80L543-146q-13 13-29 19.5t-34 6.5Zm40.29-510q7.71 0 13.71 4 6 4 11 10l71 106h188.13q7.94-19.43 11.9-39.43 3.97-20 3.97-40.57 0-77-49.95-133.5Q720.11-780 645.19-780q-35.19 0-67.69 14.5T521-725l-27 29q-3 3-6 5t-8 2q-5 0-8.64-1.88-3.63-1.89-6.36-5.12l-27-29q-24.27-25.82-56.64-40.41Q349-780 314-780q-74.57 0-124.29 56.44Q140-667.12 140-590q0 20.72 4 40.86T155.65-510H360q7.58 0 14.39 3.61 6.82 3.61 10.61 9.39l46 70 60-182q3.08-9 11.18-15 8.09-6 18.11-6Zm8.71 97-61 182q-2.97 9-11.15 15T439-330q-8 0-14-4t-10-10l-71-106H198l261 261q5 5 9.8 7 4.8 2 11.2 2 6.4 0 11.2-2 4.8-2 9.8-7l260-261H600q-8 0-14-4t-11-10l-46-69Z"/></svg></a>
                <p class="p_categoria">Salud y Bienestar</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=18" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M596.82-220Q556-220 528-248.18q-28-28.19-28-69Q500-358 528.18-386q28.19-28 69-28Q638-414 666-385.82q28 28.19 28 69Q694-276 665.82-248q-28.19 28-69 28ZM182.15-74.02q-27.6 0-47.86-20.27-20.27-20.26-20.27-47.86v-615.7q0-27.7 20.27-48.03 20.26-20.34 47.86-20.34H245v-60h69.07v60h331.86v-60H715v60h62.85q27.7 0 48.03 20.34 20.34 20.33 20.34 48.03v615.7q0 27.6-20.34 47.86-20.33 20.27-48.03 20.27h-595.7Zm0-68.13h595.7V-570h-595.7v427.85Zm0-487.85h595.7v-127.85h-595.7V-630Zm0 0v-127.85V-630Z"/></svg></a>
                <p class="p_categoria">Servicios de Catering y Eventos</p>
            </div>
        </article>
        
        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=19" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M182.15-114.02q-27.6 0-47.86-20.27-20.27-20.26-20.27-47.86v-595.7q0-27.7 20.27-48.03 20.26-20.34 47.86-20.34h595.7q27.7 0 48.03 20.34 20.34 20.33 20.34 48.03v595.7q0 27.6-20.34 47.86-20.33 20.27-48.03 20.27h-595.7Zm0-68.13H450v-595.7H182.15v595.7Zm327.85 0h267.85V-481H510v298.85ZM510-541h267.85v-236.85H510V-541Z"/></svg></a>
                <p class="p_categoria">Servicios de Diseño Gráfico y Web</p>
            </div>
            <div class="div_categorias">
                <a href="categorias.php?profesion=20" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M469.43-231.87q-100.06-4.28-168.81-75.79t-68.75-172.43q0-103.41 72.27-175.85 72.27-72.43 175.86-72.43 100.74 0 172.29 68.99 71.56 68.99 76.08 170.05L659.63-511q-10.76-65.2-60.72-108.41-49.95-43.22-119.01-43.22-76 0-129.27 53.22-53.26 53.21-53.26 129.35 0 68.17 43.22 118.43 43.21 50.26 108.17 61.26l20.67 68.5ZM518.15-71q-9.54 1-18.95 1.5-9.42.5-19.2.5-85.15 0-160.18-32.31-75.02-32.32-130.61-87.9-55.58-55.59-87.9-130.61Q69-394.85 69-480t32.31-160.18q32.32-75.02 87.9-130.61 55.59-55.58 130.61-87.9Q394.85-891 480-891t160.18 32.31q75.02 32.32 130.61 87.9 55.58 55.59 87.9 130.61Q891-565.15 891-480q0 9.8-.5 19.36-.5 9.55-1.5 19.03l-63.5-19.51V-480q0-144.07-100.73-244.78Q624.03-825.5 479.94-825.5q-144.09 0-244.77 100.73Q134.5-624.03 134.5-479.94q0 144.09 100.72 244.77Q335.93-134.5 480-134.5h18.72L518.15-71Zm305.48 16.5-172.3-172.43L601.2-75.46 480-480l404.54 121.2-151.47 50.13 172.43 172.3-81.87 81.87Z"/></svg></a>
                <p class="p_categoria">Servicios de Marketing y Publicidad</p>
            </div>
        </article>

        <article class="art_categorias">
            <div class="div_categorias">
                <a href="categorias.php?profesion=21" class="a_categoria"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#ffffff"><path d="M225.55-155.5q-49.59 0-84.81-34.18-35.22-34.17-35.7-83.82H34.5v-463.87q0-27.6 20.27-47.86 20.26-20.27 47.86-20.27h579v164.13h103.33L925.5-454.02v180.52h-73.87q-.72 49.65-35.82 83.82-35.1 34.18-84.69 34.18-49.6 0-84.82-34.18-35.21-34.17-35.69-83.82H345.83q-.72 49.24-35.7 83.62-34.98 34.38-84.58 34.38Zm-.12-62.87q24 0 41-17t17-41q0-24-17-41t-41-17q-24 0-41 17t-17 41q0 24 17 41t41 17Zm-122.8-123.26h23.04q16.92-25.8 42.46-41.09Q193.66-398 224.45-398t56.81 15.63q26.01 15.64 42.78 40.74H613.5v-395.74H102.63v395.74ZM731-218.37q24 0 41-17t17-41q0-24-17-41t-41-17q-24 0-41 17t-17 41q0 24 17 41t41 17ZM681.63-425h180.26l-111-148h-69.26v148ZM358.57-529Z"/></svg></a>
                <p class="p_categoria">Transporte y Mudanzas</p>
            </div>
        </article>

        <?php if(!$_SESSION){ ?>
            <a href="../formularios/registrar.php" class="call_to_action">¡Registrate Ahora!</a>
        <?php } ?>
    </section>

    <footer class="footer">
        <div class="div_footer">
            <article class="art_div_footer">
                <img src="../imagenes/logo/logo_footer.png" title="EugenioYa" class="logo_footer">
            </article>
            <article class="art_div_footer">
                <a href="../nosotros.html" class="a_footer">Sobre Eugenio</a>
                <a href="../nosotros.html" class="a_footer">Contacto</a>
                <a href="../formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                <a href="../formularios/iniciar.php" class="a_footer">Inicia Sesión</a>
                <a href="indice.php" class="a_footer">Oficios</a>
            </article>
            <article class="art_div_footer">
                <a href="../politicas-de-privacidad.html" class="a_footer">Política de Privacidad</a>
                <a href="../terminos-y-condiciones.html" class="a_footer">Términos y Condiciones</a>
            </article>
            <article class="art_div_footer">
                <img src="../imagenes/avatar/eugenio_footer.png" title="EuGENIO" class="genio_footer">
            </article>
        </div>
        <div class="div1_footer">
            <p class="p_footer_ubi" id="footer_ubi"></p>
            <p class="p_footer_legal" id="footer_legal"></p>
        </div>
        <script src="../JS/version_1_7.js"></script>
    </footer>
    
</body>

<!-- La última Categoría es la número 24 -->

</html>