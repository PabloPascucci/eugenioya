<?php
session_start();
$user_id = $_SESSION['user_loged_id'];
$url_redirect = urlencode("../perfiles/catalogo/catalogo.php?id-profesional=$user_id");
// ========== Archivo que procesa información del catálogo
        // Conectamos a la BD
        require_once("../../server_.php");

        $conn = mysqli_connect($server, $user, $password, $db_name);

// ====== Recibimos la variable get
if($_SERVER['REQUEST_METHOD'] = $_GET) {
    $product_pause = isset($_GET['action']) ? $_GET['action'] : '';
    $id_product = isset($_GET['product']) ? $_GET['product'] : '';

    switch ($product_pause) {
        case '1':
            # Pausamos el producto
            $query_update_status_pause = "UPDATE catalogo SET estado_producto = 'inactivo' WHERE id_usuario = '$user_id' AND id_producto = '$id_product'";
            mysqli_query($conn, $query_update_status_pause);
            header("Location: catalogo.php?id-profesional=$user_id");
            break;
        case '2':
            # Activamos el producto
            $query_update_status_active = "UPDATE catalogo SET estado_producto = 'activo' WHERE id_usuario = '$user_id' AND id_producto = '$id_product'";
            mysqli_query($conn, $query_update_status_active);
            header("Location: catalogo.php?id-profesional=$user_id");
            break;
        case '3':
            # Borramos el producto
            $query_product_delete = "DELETE FROM catalogo WHERE id_usuario = '$user_id' AND id_producto = '$id_product'";
            mysqli_query($conn, $query_product_delete);
            header("Location: catalogo.php?id-profesional=$user_id");
            break;
        default:
            header("Location: ../../pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect");
            break;
    }
}

    // Recibimos información POST del formulario

$nombre_producto = isset($_POST['producto']) ? $_POST['producto'] : NULL;
$precio = isset($_POST['precio']) ? $_POST['precio'] : NULL;

    // Validamos que los campos esten correctos
if($nombre_producto == NULL) {
    header("Location: catalogo.php?id-profesional=$user_id&empty-input=nombre-producto-error");
    exit();
} else {
    $nombre_producto_scpstr = mysqli_real_escape_string($conn, $nombre_producto);
}
if($precio == NULL) {
    header("Location: catalogo.php?id-profesional=$user_id&empty-input=precio-producto-error");
    exit();
} else {
    $precio_scpstr = mysqli_real_escape_string($conn, $precio);
}

if(isset($_FILES['foto_producto'])){
    // Obtener info del archivo
    $archivo_nombre = $_FILES['foto_producto']['name'];
    $archivo_tipo = $_FILES['foto_producto']['type'];
    $archivo_temporal = $_FILES['foto_producto']['tmp_name'];
    $archivo_tamaño = $_FILES['foto_producto']['size'];

    // Modificar el nombre del archivo con el $user_id
    $nuevo_nombre = "producto_usuario_" . $user_id . "_" . $archivo_nombre;

    // Definir la carpeta del usuario
    $user_folder = __DIR__ . "../imagenes/$user_id";

    // Crear la carpeta para el usuario si no existe
    if(!file_exists($user_folder)) {
        mkdir($user_folder, 0777, true);
    }

    // Definir la ubicación de destino
    $ruta_destino = $user_folder . "/" . $nuevo_nombre;

    // Verificar extensión de la imagen
    $permitidos = array("image/jpeg", "image/jpg", "image/png");
    if(in_array($archivo_tipo, $permitidos)) {
        if ($conn) {
            // Insertar datos a la BD
            $query_insert = "INSERT INTO catalogo (id_usuario, nombre_producto, precio, estado_producto, imagen_1) VALUES ('$user_id', '$nombre_producto_scpstr', '$precio_scpstr', 'activo', 'imagenes/$user_id/$nuevo_nombre')";
            mysqli_query($conn, $query_insert);

            // ==== Mover el archivo a la carpeta de destino
            if(move_uploaded_file($archivo_temporal, $ruta_destino)) {
                // Redireccionar al catalogo
                header("Location: catalogo.php?id-profesional=$user_id");
                exit();
            }
        } else {
            // === Fallo la conexión a la BD
            header("Location: ../../pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect");
            exit();
        }
    } else {
        // ===== El arhivo no es el adecuado
        header("Location: ../../pantallas/error.php?e=wrong-image-type&url-redirect-user=$url_redirect");
        exit();
    }
} else{
    header("Location: catalogo.php?id-profesional=$user_id&empty-input=product-files-error");
    exit();
}

$conn->close();

?>