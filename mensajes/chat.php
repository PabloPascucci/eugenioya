<?php
     // Iniciamos Sesión
     session_start();

     // Traemos a través de session el id del usuario.
     if($_SESSION){
         $user_id = $_SESSION['user_loged_id'];
     } else {
        header("Location: ../formularios/iniciar.php");
     }

    // Conectar con la BD
    $server = "localhost";
    $user_server = "root";
    $password_server = "";
    $db_name_server = "eugenioya";

    $conn = new mysqli($server, $user_server, $password_server, $db_name_server);

    $stmt_chat_user = $conn->prepare("SELECT sender_id, receiver_id, message_, created_at FROM messages WHERE receiver_id = ?");
    $stmt_chat_user->bind_param("i", $user_id);
    $stmt_chat_user->execute();
    $stmt_chat_user->store_result();


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
    <meta name="description" content="Eugenioya será una plataforma donde podrás encontrar todo tipo de oficios y servicios en un solo lugar.">
    <meta name="author" content="DpDesarrollos">
    <meta name="copyright" content="EugenioYa">
    <meta name="robots" content="noindex">

<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/estilo_1.css">
    <link rel="stylesheet" href="chat.css">
    <link rel="shortcout icon" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!-- ==== Links - iconos ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
<!-- ==== Scripts ==== -->
    <script src="https://kit.fontawesome.com/6374ab8d9e.js" crossorigin="anonymous"></script>
    <title>Tus Mensajes</title>
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
                    <a href="../index.html" class="a_nav">Inicio</a>
                    <a href="../categorias/indice.php" class="a_nav_1">Oficios</a>
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
                    <a href="../categorias/indice.php" class="a_nav">Oficios</a>
                    <a href="chat.php" class="a_nav_1">Chat</a>
                    <a href="---" class="a_nav">Bolsa de Trabajo</a>
                </ul>
            </nav>
        </div>
    <?php } ?>

    <section>
        <article class="art_msg_users">
            <!-- Acá irán los usuarios con los que existe un chat -->
            <?php
                if($stmt_chat_user->num_rows > 0) {
                    // Vincular los resultados de la consulta a variables
                    $stmt_chat_user->bind_result($sender_id, $receiver_id, $message, $created_at);

                    while ($stmt_chat_user->fetch()) {
                        // Ubicar al sender en la tabla de usuarios
                        $stmt_user_sender = $conn->prepare("SELECT foto_perfil, nombre,profesion FROM usuario WHERE id_usuario = ?");
                        $stmt_user_sender->bind_param("i", $sender_id);
                        $stmt_user_sender->execute();
                        $stmt_user_sender->store_result();

                        if ($stmt_user_sender->num_rows > 0) {
                            $stmt_user_sender->bind_result($photo, $name, $profession);
                            while ($stmt_user_sender->fetch()) { ?>
                                <a href="chat.php?sender=<?php echo $sender_id ?>">
                                    <div>
                                    <?php if($photo != null) { ?>
                                        <img src="" alt="../perfiles/<?php echo $photo ?>" title="<?php echo $name ?>">
                                    <?php } else { ?>
                                        <img src="../imagenes/user_icon.png" title="<?php echo $name ?>">
                                    <?php } ?>
                                    </div>
                                    <div>
                                        <p><?php echo $name ?></p>
                                        <p><?php echo $profession ?></p>
                                    </div>
                                </a>
                            <?php }
                        } else {
                            echo "No se encontro al usuario";
                        }
                    }
                } else {
                    echo "No tienes chats";
                }
            ?>
        </article>
        <article>
            <!-- Acá irá la estructura del chat. -->
        </article>
    </section>
    
</body>
</html>