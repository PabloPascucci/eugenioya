<?php
// ==>> Archivo para la eliminación de los banners <<==

// Verificar que exista un get
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $url = isset($_GET['url']) ? urldecode($_GET['url']) : null;

    if ($id && $url) {
        // Conectar con la BD
        require_once("../../server_.php");

        $conn = new mysqli($server, $user, $password, $db_name);

        // URL para redireccionar
        $url_redirect = urlencode("../admin/admin.php");

        if ($conn->connect_error) {
            header("Location: ../../pantallas/error.php?e=error-connect-banner&url-redirect-user=$url_redirect");
            exit();
        }

        // Query para eliminar el banner
        $sql_delete = "DELETE FROM banner WHERE id = $id";
        $query = mysqli_query($conn, $sql_delete);

        if ($query) {
            $ruta_anterior = __DIR__ . "/../" . $url; // Ajustar la ruta para la eliminación correcta

            // Eliminar la imagen anterior si existe
            if (file_exists($ruta_anterior)) {
                unlink($ruta_anterior);
            }
            header("Location: ../banner.php");
            exit();
        } else {
            header("Location: ../../pantallas/error.php?e=error-delete-banner&url-redirect-user=$url_redirect");
        }

        $conn->close();
    } else {
        header("Location: ../../pantallas/error.php?e=missing-parameters&url-redirect-user=$url_redirect");
    }
}
?>
