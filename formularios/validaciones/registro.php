<?php
    // Vamos a importar los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_1'];
    $categoria = $_POST['rubro'];
    $profesion = $_POST['oficio'];

    echo $nombre;
    echo "<br>";
    echo $correo;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $confirm_password;
    echo "<br>";
    echo $categoria;
    echo "<br>";
    echo $profesion;
    echo "<br>";
?>