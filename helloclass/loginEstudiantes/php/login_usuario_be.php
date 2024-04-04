<?php

    session_start();  
    $conexion = mysqli_connect("localhost", "root", "", "login");


if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512',$contrasena);

$validar_login = mysqli_query($conexion,"SELECT * FROM estudiante WHERE correo='$correo' 
and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../inicio/index.php");
        exit;
    }else{
        echo'
        <script>
            alert("El usuario no existe, por favor verifique los datos introducidos");
             window.location = "../index.php";
        </script>
    ';
    exit;
}


?>