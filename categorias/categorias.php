<?php
    // Iniciamos Sesión
    session_start();

    // Traemos a través de session el id del usuario.
    if($_SESSION){
        $user_id = $_SESSION['user_loged_id'];
    }
    
    if($_SERVER['REQUEST_METHOD']=$_GET) {
        $categoria = $_GET['profesion'];
        }if($categoria == '2'){
            $categoria_definida = "Artistas";
        }elseif($categoria == '3'){
            $categoria_definida = "Belleza y Estética";
        }elseif($categoria == '4'){
            $categoria_definida = "Carpintería";
        }elseif($categoria == '5'){
            $categoria_definida = "Cerrajería";
        }elseif($categoria == '6'){
            $categoria_definida = "Construcción y Reformas";
        }elseif($categoria == '7'){
            $categoria_definida = "Cuidado del Hogar y Limpieza";
        }elseif($categoria == '8'){
            $categoria_definida = "Cuidado Infantil y Acompañamiento Hospitalario";
        }elseif($categoria == '9'){
            $categoria_definida = "Educación y Tutoría";
        }elseif($categoria == '10'){
            $categoria_definida = "Electricistas";
        }elseif($categoria == '11'){
            $categoria_definida = "Fotógrafos";
        }elseif($categoria == '12'){
            $categoria_definida = "Gasistas";
        }elseif($categoria == '13'){
            $categoria_definida = "Jardinería y Paisajismo";
        }elseif($categoria == '14'){
            $categoria_definida = "Plomería";
        }elseif($categoria == '15'){
            $categoria_definida = "Reparación de Automóviles y Mecánica";
        }elseif($categoria == '16'){
            $categoria_definida = "Reparación de Celulares y PC";
        }elseif($categoria == '17'){
            $categoria_definida = "Reparación de Electrodomésticos";
        }elseif($categoria == '18'){
            $categoria_definida = "Servicios de Catering y Eventos";
        }elseif($categoria == '19'){
            $categoria_definida = "Servicios de Diseño Gráfico y Web";
        }elseif($categoria == '20'){
            $categoria_definida = "Servicios de Marketing y Publicidad";
        }elseif($categoria == '21'){
            $categoria_definida = "Transporte y Mudanzas";
        }else{
            header("Location: indice.php");
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
    <meta name="robots" content="noindex,follow">
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
    <title><?php echo $categoria_definida ?></title>
</head>
<body>

    <?php if(!$_SESSION){ ?>
        <div class="div_nav">
            <nav class="nav">
                <input type="checkbox" name="check" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                    <p class="p_categoria_definida" id="<?php echo $categoria_definida ?>"><?php echo $categoria_definida ?></p>
                <ul class="barr_nav">
                    <!-- <img src="" title="Nombre" class="logo"> -->
                    <a href="../index.html" class="a_nav">Inicio</a>
                    <a href="indice.php" class="a_nav_1">Oficios</a>
                    <a href="../formularios/iniciar.php" class="a_nav">Iniciar Sesión</a>
                    <a href="../formularios/registrar.php" class="a_nav">Regístrate</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
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
                    <p class="p_categoria_definida" id="<?php echo $categoria_definida ?>"><?php echo $categoria_definida ?></p>
                <ul class="barr_nav">
                    <!-- <img src="" title="Nombre" class="logo"> -->
                    <?php if ($user_id === '1') {?>
                        <a href="../admin/admin.php" class="a_nav">Perfil</a>
                    <?php } else { ?>
                        <a href="../perfiles/perfil.php" class="a_nav">Perfil</a>
                    <?php } ?>
                    <a href="indice.php" class="a_nav_1">Oficios</a>
                    <a href="../bolsa-de-trabajo.php" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

        <section class="sec_categorias_dinamico">
            <?php
            // ====>> Conectar con la BD de usuarios
            $server = "localhost";
            $user_server = "root";
            $user_password = "";
            $server_db_name = "eugenioya";

            $conn = mysqli_connect($server,$user_server,$user_password,$server_db_name);

            // ====>> Query para extraer datos de los perfiles de los usuarios
            $sql_perfil_publico = "SELECT * FROM usuario WHERE categoria = '$categoria'";
            $query_perfil_publico = mysqli_query($conn,$sql_perfil_publico);

            // ====>> Bucle para visualizar y leer los datos de los usuarios
            if($query_perfil_publico->num_rows > 0) {
                while ($row = mysqli_fetch_array($query_perfil_publico)) {
                    $id_usuario = $row['id_usuario'];
                    $usuario = $row['nombre'];
                    $profesion = $row['profesion'];
                    $zona = $row['barrio'];
                    $ruta = isset($row['foto_perfil']) ? $row['foto_perfil'] : "../imagenes/user_icon.png";
                    $disponibilidad = $row['horas'];

                    // Consulta para obtener el total de rating_count del profesional
                    $sql_total_rating_count = "SELECT SUM(rating_count) AS total_rating_count FROM average WHERE professional_id = $id_usuario";
                    $query_total_rating_count = mysqli_query($conn, $sql_total_rating_count);
                    $row_total_rating_count = mysqli_fetch_assoc($query_total_rating_count);
                    $total_rating_count = $row_total_rating_count['total_rating_count'] ? $row_total_rating_count['total_rating_count'] : 0;

                    // Consulta para obtener el promedio de puntuación del profesional
                    $sql_promedio = "SELECT average_rating, rating_count FROM average WHERE professional_id = $id_usuario";
                    $query_promedio = mysqli_query($conn, $sql_promedio);
                    $row_promedio = mysqli_fetch_assoc($query_promedio);
                    if ($row_promedio) {
                        $promedio_rating = $row_promedio['average_rating'];
                        $rating_count = $row_promedio['rating_count'];
                    } else {
                        $promedio_rating = 0; 
                        $rating_count = 0;
                    }
                
            ?>
                <article class="art_publicaciones">
                    <div class="div_categoria">
                        <img src="../perfiles/<?php echo $ruta ?>" alt="<?php echo $usuario ?>" title="<?php echo $usuario ?>" class="img_perfil">
                    </div>
                    <div class="div_categoria">
                        <p class="p1_usuario"><?php echo $usuario ?></p>
                        <p class="p2_usuario"><?php echo $profesion ?></p>
                    </div>
                    <div class="div_categoria">
                        <div class="div_stars">
                            <span class="stars" data-value="<?php echo $promedio_rating ?>"></span>
                            <p class="p_stars"><?php echo $total_rating_count ?></p>
                        </div>
                        <p class="p3_usuario"><?php echo $zona ?></p>
                    </div>
                    <div class="div_categoria">
                        <?php 
                            if($disponibilidad == '1') {
                                echo "<p class='p4_usuario'>disponible las 24hs</p>";
                            }else{
                                echo "";
                            }
                        ?>
                    </div>
                    <a href="../perfiles/perfiles.php?profesional=<?php echo $id_usuario ?>" class="a_usuario">Ver Perfil</a>
                </article>
            <?php
            }
            mysqli_free_result($query_perfil_publico);
        }
            ?>
        </section>
        
        <script src="rating.js"></script>

        <footer class="footer">
            <div class="div_footer">
                <article class="art_div_footer">
                    <!-- <img src="" alt=""> Logo -->
                </article>
                <article class="art_div_footer">
                    <a href="----" class="a_footer">Sobre Eugenio</a>
                    <a href="----" class="a_footer">Contacto</a>
                    <a href="../formularios/registrar.php" class="a_footer">Crea una cuenta</a>
                    <a href="../formularios/iniciar.php" class="a_footer">Inicia Sesión</a>
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