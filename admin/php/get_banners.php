<?php
    require_once("../../server_.php");

    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Obtener todos los banners
    $sql = "SELECT url_banner, tipo_banner FROM banner";
    $result = $conn->query($sql);

    $banners = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $banners[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($banners);
?>
