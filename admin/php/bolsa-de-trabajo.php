<?php
     $url_redirect = urlencode("../admin/admin.php");

     // Conectar a la BD
     require_once("../../server_.php");

     $conn = new mysqli($server, $user, $password, $db_name);

     // Verificar que la conexión este establecida
     if($conn->connect_error) {
         header("Location: ../../pantallas/error.php?e=error-conect-bolsa-de-trabajo&url-redirect-user=$url_redirect");
         exit();
     }

    // Archivo encargado de subir los trabajos a la BD
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $cuerpo = $_POST['cuerpo'];

        // Insertar los datos a la Tabla
        $sql_insert = "INSERT INTO bolsa (empresa,texto) VALUES ('$titulo','$cuerpo')";
        $query_insert = mysqli_query($conn, $sql_insert);

        if($query_insert) {
            header("Location: ../admin.php");
            exit();
        } else {
            header("Location: ../../pantallas/error.php?e=error-insert-bolsa-de-trabajo&url-redirect-user=$url_redirect");
            exit();
        }
        $conn->close();
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];

        // Borrar el registro de la BD
        $sql_delete = "DELETE FROM bolsa WHERE id = '$id'";
        $query_delete = mysqli_query($conn, $sql_delete);

        if($query_delete) {
            header("Location: ../bolsa-de-trabajo.php");
            exit();
        } else {
            header("Location: ../../pantallas/error.php?e=error-delete-bolsa-de-trabajo&url-redirect-user=$url_redirect");
            exit();
        }

        $conn->close();
    }
?>