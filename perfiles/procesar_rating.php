<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id']; // ID del cliente (emite el rating)
    $professional_id = $_POST['professional_id']; // ID del profesional (recibe el rating)
    $rating_star = $_POST['rating']; // Entero del 1 al 5 para expresar en estrellas
    $comment = $_POST['comment']; // Comentario que acompaña al rating

    // Validar y sanitizar la entrada
    $url_redirect_rating = urlencode("../perfiles/perfiles.php?profesional=$professional_id");

    if (!is_numeric($rating_star) || $rating_star < 1 || $rating_star > 5) {
        header("Location: ../pantallas/error.php?e=rating-type&url-redirect-user=$url_redirect_rating");
        exit();
    }

    // Conectar a la Base de Datos
    require_once("../server_.php");

    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        header("Location: ../pantallas/error.php?e=db-connect-error&url-redirect-user=$url_redirect_rating");
        exit();
    }

    // Comprobar si ya existe una evaluación del usuario (puntador)
    $check_stmt = $conn->prepare("SELECT id_rating, rating FROM ratings WHERE user_id = ? AND professional_id = ?");
    $check_stmt->bind_param("ii", $user_id, $professional_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Ya el usuario puntuó a este profesional, actualizar su rating
        $check_stmt->bind_result($rating_id, $existing_rating);
        $check_stmt->fetch();

        // Actualizar la evaluación
        $update_stmt = $conn->prepare("UPDATE ratings SET rating = ?, comment = ? WHERE id_rating = ?");
        $update_stmt->bind_param("isi", $rating_star, $comment, $rating_id);

        if ($update_stmt->execute()) {
            // Actualizar el promedio y el conteo de evaluaciones
            $result = $conn->query("UPDATE average SET average_rating = (average_rating * rating_count - $existing_rating + $rating_star) / rating_count WHERE professional_id = $professional_id");
            if ($result === FALSE) {
                die("Error en la actualización de la tabla 'average': " . $conn->error);
            }
            header("Location: ../perfiles/perfiles.php?profesional=$professional_id");
        } else {
            header("Location: ../pantallas/error.php?e=rating&url-redirect-user=$url_redirect_rating");
        }

        $update_stmt->close();
    } else {
        // El usuario nunca puntuó al profesional, insertar su rating
        $insert_stmt = $conn->prepare("INSERT INTO ratings (user_id, professional_id, rating, comment) VALUES (?, ?, ?, ?)");
        $insert_stmt->bind_param("iiis", $user_id, $professional_id, $rating_star, $comment);

        if ($insert_stmt->execute()) {
            // Insertar o actualizar el promedio y el conteo de evaluaciones
            $result = $conn->query("INSERT INTO average (professional_id, average_rating, rating_count) VALUES ($professional_id, $rating_star, 1) ON DUPLICATE KEY UPDATE average_rating = (average_rating * rating_count + VALUES(average_rating)) / (rating_count + 1), rating_count = rating_count + 1");
            if ($result === FALSE) {
                die("Error en la actualización/inserción de la tabla 'average': " . $conn->error);
            }
            header("Location: ../perfiles/perfiles.php?profesional=$professional_id");
        } else {
            header("Location: ../pantallas/error.php?e=rating&url-redirect-user=$url_redirect_rating");
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>