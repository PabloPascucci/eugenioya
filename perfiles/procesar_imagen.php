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
    $nuevo_nombre = $user_id . "_" . $archivo_nombre;

    // Mover el archivo a la carpeta de destino con el nuevo nombre
    $ruta_destino = "foto_perfil/" . $nuevo_nombre;

    // Verificar si es una imagen
    $permitidos = array("image/jpeg", "image/jpg", "image/png");
    if(in_array($archivo_tipo, $permitidos)) {
        // Procesar la imagen
        $ruta = "foto_perfil/" . $archivo_nombre; // Definir la ubicación de destino
        move_uploaded_file($archivo_temporal, $ruta); // Mover la imagen a la carpeta destino

        // Conexión con la BD
        $server = "localhost";
        $server_user_name = "root";
        $server_password = "";
        $data_base_name = "eugenioya";

        $conn = mysqli_connect($server,$server_user_name,$server_password,$data_base_name);

        // Verificar que la cuenta con el correo exista dentro de la base de datos
        $query_very = "SELECT foto_perfil FROM usuario WHERE id_usuario = '$user_id'";
        $resultado = mysqli_query($conn, $query_very);

        if ($resultado->num_rows > 0) {
            // El usuario existe en la BD, por ende verificaremos las credenciales de acceso
            $sql = "SELECT foto_perfil from usuario WHERE id_usuario = '$user_id'";
            $resultado_foto = mysqli_query($conn, $sql);

            if ($resultado_foto->num_rows == 1) {
                $query_update = "UPDATE usuario SET foto_perfil = '$ruta'";
                $resultado_update = mysqli_query($conn,$query_update);
                move_uploaded_file($archivo_temporal, $ruta_destino);
                header("Location: configuraciones.php");
            }else {
                $query_insert = "INSERT INTO usuario (foto_perfil) VALUE ('$ruta')";
                $sql_insert = mysqli_query($conn,$query_insert);
                move_uploaded_file($archivo_temporal, $ruta_destino);
                header("Location: configuraciones.php");
            }
        }
    }else {
        echo "Formato de imagen no válido. Por favor, sube una imagen JPEG, JPG o PNG.";
    }
} else {
    echo "No se ha seleccionado ninguna imagen.";
}
?>
