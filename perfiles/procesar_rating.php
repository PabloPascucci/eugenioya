<?php
    // Archivo destinado a importar, procesar e insertar los datos a la tabla.
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST['user_id']; // ID del cliente (emite el rating)
        $professional_id = $_POST['professional_id']; // ID del profesional (recibe el rating)
        $rating_star = $_POST['rating']; // Entero del 1 al 5 para expresar en estrellas
        $comment = $_POST['comment']; // Comentario que acompaña al rating

        // Validar y sanitizar la entrada
        // Se pasarán el tipo de error y la url para redireccional al usuario
        $url_redirect_rating = urlencode("../perfiles/perfiles.php?profesional=$professional_id");

        if(!is_numeric($rating_star) || $rating_star < 1 || $rating_star > 5) {
            header("Location: ../pantallas/error.php?e=rating&url-redirect-rating-numeric=$url_redirect_rating");
            exit();
        }

        // Conectar a la Base de Datos
        $server = "localhost";
        $user_server = "root";
        $password_server = "";
        $db_name_server = "eugenioya";

        $conn = new mysqli($server, $user_server, $password_server, $db_name_server);

        if($conn->connect_error){
            header("Location: ../pantallas/error.php?e=connect_rating&url-redirect-rating-db-connect=$url_redirect_rating");
            exit();
        }

        // Comprobar si ya existe una evaluación del usuario (puntador)
        $check_stmt = $conn->prepare("SELECT id_rating FROM ratings WHERE user_id = ? AND professional_id = ?");
        $check_stmt->bind_param("ii", $user_id, $professional_id);
        $check_stmt->execute();
        $check_stmt->store_result();

        if($check_stmt->num_rows > 0) {
            // Ya el usuario puntuó a este profesional, actualizar su rating
            $update_stmt = $conn->prepare("UPDATE ratings SET rating = ?, comment = ? WHERE user_id = ? AND professional_id = ?");
            $update_stmt->bind_param("isii", $rating_star, $comment, $user_id, $professional_id);

            if($update_stmt->execute()){
                header("Location: perfiles.php?profesional=$professional_id");
            } else {
                header("Location: ../pantallas/error.php?e=rating-update&url-redirect-rating-update-error=$url_redirect_rating");
            }

            $update_stmt->close();
        } else {
            // El usuario nunca puntuó al profesional, insertar su rating
            $insert_stmt = $conn->prepare("INSERT INTO ratings (user_id, professional_id, rating, comment) VALUES (?, ?, ?, ?)");
            $insert_stmt->bind_param("iiis", $user_id, $professional_id, $rating_star, $comment);

            // Corroborar que se insertó el rating
            if($insert_stmt->execute()){
                header("Location: perfiles.php?profesional=$professional_id");
            } else {
                header("Location: ../pantallas/error.php?e=rating-insert&url-redirect-rating-insert-error=$url_redirect_rating");
            }

            $insert_stmt->close();
        }

        $check_stmt->close();
        $conn->close();
    }
?>