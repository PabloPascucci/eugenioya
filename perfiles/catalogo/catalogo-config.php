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

// Validamos que los campos estén correctos
if ($nombre_producto == NULL) {
    header("Location: catalogo.php?id-profesional=$user_id&empty-input=nombre-producto-error");
    exit();
} else {
    $nombre_producto_scpstr = mysqli_real_escape_string($conn, $nombre_producto);
}

if ($precio == NULL) {
    header("Location: catalogo.php?id-profesional=$user_id&empty-input=precio-producto-error");
    exit();
} else {
    $precio_scpstr = mysqli_real_escape_string($conn, $precio);
}

// Procesar imágenes
$imagenes = [];
$permitidos = ["image/jpeg", "image/jpg", "image/png"];

for ($i = 1; $i <= 3; $i++) {
    if (isset($_FILES["foto_producto_$i"]) && $_FILES["foto_producto_$i"]["error"] === 0) {
        $tipo = $_FILES["foto_producto_$i"]["type"];
        if (!in_array($tipo, $permitidos)) {
            header("Location: ../../pantallas/error.php?e=wrong-image-type&url-redirect-user=$url_redirect");
            exit();
        }

        $nombre_original = $_FILES["foto_producto_$i"]["name"];
        $temporal = $_FILES["foto_producto_$i"]["tmp_name"];
        $nuevo_nombre = "producto_usuario_" . $user_id . "_" . $nombre_original;
        // Crear carpeta del usuario si no existe
        $user_folder = __DIR__ . "/imagenes/$user_id";
        if (!file_exists($user_folder)) {
            mkdir($user_folder, 0777, true);
        }

        $ruta_destino = "$user_folder/$nuevo_nombre";
        if (move_uploaded_file($temporal, $ruta_destino)) {
            $imagenes[] = "imagenes/$user_id/$nuevo_nombre";
        } else {
            $imagenes[] = NULL;
        }
    } else {
        $imagenes[] = NULL;
    }
}

// Asegurar 3 posiciones
while (count($imagenes) < 3) {
    $imagenes[] = NULL;
}

// Insertar en base de datos
if ($conn) {
    $query_insert = "INSERT INTO catalogo (id_usuario, nombre_producto, precio, estado_producto, imagen_1, imagen_2, imagen_3)
    VALUES ('$user_id', '$nombre_producto_scpstr', '$precio_scpstr', 'activo',
        " . ($imagenes[0] ? "'{$imagenes[0]}'" : "NULL") . ",
        " . ($imagenes[1] ? "'{$imagenes[1]}'" : "NULL") . ",
        " . ($imagenes[2] ? "'{$imagenes[2]}'" : "NULL") . ")";

    mysqli_query($conn, $query_insert);

    header("Location: catalogo.php?id-profesional=$user_id");
    exit();
} else {
    header("Location: ../../pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect");
    exit();
}

$conn->close();

?>