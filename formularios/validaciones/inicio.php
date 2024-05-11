<?php
    // ==>> recibimos los datos del formulario de inicio de sesión <<==
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // ==>> Conexión a la base de datos <<==
    if ($_SERVER['REQUEST_METHOD']=$_POST) {
        // Conectar con la base de datos
        $server = "localhost";
        $server_user = "root";
        $server_password = "";
        $server_db_name = "eugenioya";
    
        $conn = mysqli_connect($server,$server_user,$server_password,$server_db_name);
    }

    // ==>> Verificar que la cuenta con el correo exista dentro de la base de datos <<==
    $query_very = "SELECT * FROM usuario WHERE correo = '$correo'";
    $resultado = mysqli_query($conn,$query_very);

    if($resultado->num_rows > 0) {
        // El usuario existe en la BD
        // Aqui se trata el inicio al perfil e verificación de credenciales
    }else {
        // El usuario es nuevo
        header("Location: ../registrar.php?new=1");
    }
    // Cierra la conexión
    $conn->close();
?>