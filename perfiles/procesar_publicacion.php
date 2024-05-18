<?php
// Iniciamos Sesión
session_start();

// Verificamos si el usuario está logueado
if (!isset($_SESSION['user_loged_id'])) {
    header("Location: ../formularios/iniciar.php");
    exit();
}

// Traemos a través de session el id del usuario.
$user_id = $_SESSION['user_loged_id'];

// Seteo de la hora y fecha
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_TIME,'spanish');

// Fecha y hora
$fechaHora = date('d-m-Y');

// Importamos los datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

// Verificar si se envió una imagen
if(isset($_FILES['foto'])) {

    // Obtener información del archivo
    $archivo_nombre = $_FILES['foto']['name'];
    $archivo_tipo = $_FILES['foto']['type'];
    $archivo_temporal = $_FILES['foto']['tmp_name'];
    $archivo_tamaño = $_FILES['foto']['size'];

    // Modificar el nombre del archivo con el $user_id
    $nuevo_nombre = "publicacion_" . $archivo_nombre;

    // Definir la carpeta del usuario
    $user_folder = __DIR__ . "/imagenes/$user_id";
    
    // Crear la carpeta para el usuario si no existe
    if (!file_exists($user_folder)) {
        mkdir($user_folder, 0777, true);
    }

    // Definir la ubicación de destino
    $ruta_destino = $user_folder . "/" . $nuevo_nombre;

    // Verificar si es una imagen
    $permitidos = array("image/jpeg", "image/jpg", "image/png");
    if(in_array($archivo_tipo, $permitidos)) {
        // Conectar a la base de datos
        $server = "localhost";
        $server_user = "root";
        $server_pass = "";
        $server_db_name = "eugenioya";

        $conn = mysqli_connect($server, $server_user, $server_pass, $server_db_name);

        if ($conn) {
            // Escapar los datos para evitar inyecciones SQL
            $nombre = mysqli_real_escape_string($conn, $nombre);
            $descripcion = mysqli_real_escape_string($conn, $descripcion);
            $nuevo_nombre = mysqli_real_escape_string($conn, $nuevo_nombre);

            // Insertar los datos en la base de datos
            $sql_insert = "INSERT INTO publicacion (id_publicacion, id_usuario, nombre_proyecto, foto_proyecto, descripcion_proyecto, fecha_subida) 
                           VALUES (DEFAULT, '$user_id', '$nombre', '$nuevo_nombre', '$descripcion', '$fechaHora')";
            $query_insert = mysqli_query($conn, $sql_insert);

            if ($query_insert) {
                // Mover la imagen a la carpeta
                if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                    // Redireccionar a la página de configuraciones
                    header("Location: perfil.php");
                    exit(); // Terminar el script después de la redirección
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Error al insertar los datos: " . mysqli_error($conn);
            }
        } else {
            echo "No se pudo conectar con la base de datos: " . mysqli_connect_error();
        }
    } else {
        echo "Formato de archivo no permitido.";
    }
} else {
    echo "Por favor, complete todos los campos de nombre y descripción.";
}
echo "Por favor, seleccione una imagen.";
?>
