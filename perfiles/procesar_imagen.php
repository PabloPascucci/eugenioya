<?php
session_start();
$user_id = $_SESSION['user_loged_id'];
// Verificar si se envió una imagen
if(isset($_FILES['foto_perfil'])) {

    // Obtener información del archivo
    $archivo_nombre = $_FILES['foto_perfil']['name'];
    $archivo_tipo = $_FILES['foto_perfil']['type'];
    $archivo_temporal = $_FILES['foto_perfil']['tmp_name'];
    $archivo_tamaño = $_FILES['foto_perfil']['size'];

    // Modificar el nombre del archivo con el $user_id
    $nuevo_nombre = "perfil_de_usuario_" . $user_id . "_" . $archivo_nombre;

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
        // Conexión con la BD
        $server = "localhost";
        $server_user_name = "root";
        $server_password = "";
        $data_base_name = "eugenioya";

        $conn = mysqli_connect($server, $server_user_name, $server_password, $data_base_name);

        if ($conn) {
            // Verificar si el usuario ya tiene una foto de perfil
            $query_verificar = "SELECT foto_perfil FROM usuario WHERE id_usuario = '$user_id'";
            $resultado_verificar = mysqli_query($conn, $query_verificar);

            if ($resultado_verificar->num_rows > 0) {
                // El usuario ya tiene una foto de perfil, obtener la ruta anterior
                $row = mysqli_fetch_assoc($resultado_verificar);
                $ruta_anterior = __DIR__ . "/" . $row['foto_perfil'];

                // Eliminar la imagen anterior si existe
                if (file_exists($ruta_anterior)) {
                    unlink($ruta_anterior);
                }

                // Actualizar la ruta en la base de datos
                $query_update = "UPDATE usuario SET foto_perfil = 'imagenes/$user_id/$nuevo_nombre' WHERE id_usuario = '$user_id'";
                mysqli_query($conn, $query_update);
            } else {
                $query_insert = "INSERT INTO usuario (id_usuario, foto_perfil) VALUES ('$user_id', 'imagenes/$user_id/$nuevo_nombre')";
                mysqli_query($conn, $query_insert);
            }

            // Mover el nuevo archivo a la carpeta de destino
            if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                // Redireccionar a la página de configuraciones
                header("Location: perfil.php");
                exit(); // Terminar el script después de la redirección
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error al conectar con la base de datos.";
        }
    } else {
        header("Location: configuraciones.php");
    }
} else {
    echo "No se ha seleccionado ninguna imagen.";
}
?>