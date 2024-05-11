<?php
    // ==>> recibimos los datos del formulario de inicio de sesión <<==
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // ==>> Verificar que la cuenta con el correo exista dentro de la base de datos <<==
?>