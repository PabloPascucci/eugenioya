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
            $about_user = isset($row['sobre_mi']) ? $row['sobre_mi'] : "";
            $user_area = isset($row['barrio']) ? $row['barrio'] : "";
            $hours = isset($row['horas']) ? $row['horas'] : "";
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
    <meta name="robots" content="index,all,follow">

<!-- === Links === -->
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="">
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

    <p>Bienvenido tus datos de usuario son:</p>
    <?php
        echo "----> ID: " . $user_id;
        echo "<br>";
        echo "----> Nombre: " . $user_name;
        echo "<br>";
        echo "----> Categoría: " . $user_category;
        echo "<br>";
        echo "----> Profesión: " . $user_profession;
        echo "<br>";
        echo "----> Sobre mi: " . $about_user;
        echo "<br>";
        echo "----> Barrio: " . $user_area;
        echo "<br>";
        echo "----> 24 Horas: " . $hours;
        echo "<br><br>";
    ?>
    <a href="../formularios/validaciones/inicio.php?session=1">Cerrar Sesión</a>
    
    
</body>
</html>