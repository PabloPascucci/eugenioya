<?php
// Archivo destinado a subir los banners

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $banner = "propio";
    $banner_ad = "advertisement";
    $url_redirect = urlencode("../admin/admin.php");

    // Procesar el banner propio
    if (isset($_FILES['banner_eugenio']) && $_FILES['banner_eugenio']['error'] == UPLOAD_ERR_OK) {
        // Obtener información del archivo
        $archivo_nombre = $_FILES['banner_eugenio']['name'];
        $archivo_tipo = $_FILES['banner_eugenio']['type'];
        $archivo_temporal = $_FILES['banner_eugenio']['tmp_name'];
        $archivo_tamaño = $_FILES['banner_eugenio']['size'];

        // Modificar el nombre del banner
        $nuevo_nombre = "banner_propio_" . basename($archivo_nombre);

        // Definir la carpeta del banner
        $banner_folder = __DIR__ . "/../imagenes/banner";

        // Definir la ubicación de destino
        $ruta_destino = $banner_folder . "/" . $nuevo_nombre;

        // Ruta relativa para almacenar en la base de datos
        $ruta_destino_relativa = "imagenes/banner/" . $nuevo_nombre;

        // Verificar si es una imagen
        $permitidos = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($archivo_tipo, $permitidos)) {
            // Conectar con la BD
            require_once("../../server_.php");

            $conn = new mysqli($server, $user, $password, $db_name);

            if ($conn->connect_error) {
                header("Location: ../../pantallas/error.php?e=banner-error-admin&url-redirect-user=$url_redirect");
                exit();
            }

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                // Insertar nuevo banner
                $query_insert = "INSERT INTO banner (url_banner, tipo_banner) VALUES ('$ruta_destino_relativa', '$banner')";
                $conn->query($query_insert);
            }
        }
    }

    // Procesar el banner publicitario
    if (isset($_FILES['banner_ads']) && $_FILES['banner_ads']['error'] == UPLOAD_ERR_OK) {
        // Obtener información del archivo
        $archivo_nombre = $_FILES['banner_ads']['name'];
        $archivo_tipo = $_FILES['banner_ads']['type'];
        $archivo_temporal = $_FILES['banner_ads']['tmp_name'];
        $archivo_tamaño = $_FILES['banner_ads']['size'];

        // Modificar el nombre del banner ads
        $nuevo_nombre_ads = "banner_ads_" . basename($archivo_nombre);

        // Definir la carpeta del banner ads
        $banner_ad_folder = __DIR__ . "/../imagenes/banner_ad";

        // Definir la ubicación de destino
        $ruta_ad_destino = $banner_ad_folder . "/" . $nuevo_nombre_ads;

        // Ruta relativa para almacenar en la base de datos
        $ruta_ad_destino_relativa = "imagenes/banner_ad/" . $nuevo_nombre_ads;

        // Verificar si es una imagen
        $permitidos = array("image/jpeg", "image/jpg", "image/png");
        if (in_array($archivo_tipo, $permitidos)) {
            // Conectar con la BD
            require_once("../../server_.php");

            $conn = new mysqli($server, $user, $password, $db_name);

            if ($conn->connect_error) {
                header("Location: ../../pantallas/error.php?e=banner-error-admin-ad&url-redirect-user=$url_redirect");
                exit();
            }

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($archivo_temporal, $ruta_ad_destino)) {
                // Insertar nuevo banner publicitario
                $query_insert = "INSERT INTO banner (url_banner, tipo_banner) VALUES ('$ruta_ad_destino_relativa', '$banner_ad')";
                $conn->query($query_insert);
            }
        }
    }

    // Redirigir después de la operación
    header("Location: ../admin.php");
    exit();
}
?>