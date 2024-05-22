<?php
    // Archivo destinado a importar, procesar e insertar los datos a la tabla.
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST['user_id']; // ID del cliente (emite el rating)
        $professional_id = $_POST['professional_id']; // ID del profesional (recibe el rating)
        $rating_star = $_POST['rating']; // Entero del 1 al 5 para expresar en estrellas
        $comment = $_POST['comment']; // Comentario que acompaña al rating
    }
?>