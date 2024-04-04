<?php

$conexion = mysqli_connect("localhost", "root", "");


if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}


$databaseName = 'login';
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
mysqli_query($conexion, $createDatabaseQuery);


mysqli_select_db($conexion, $databaseName);


$createTableQuery = "CREATE TABLE IF NOT EXISTS docente (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        nombre_completo VARCHAR(255) NOT NULL,
                        correo VARCHAR(255) NOT NULL,
                        contrasena VARCHAR(255) NOT NULL
                    )";
mysqli_query($conexion, $createTableQuery);

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO docente (nombre_completo, correo, contrasena)
          VALUES ('$nombre_completo', '$correo', '$contrasena')";


$verificar_correo = mysqli_query($conexion, "SELECT * FROM docente WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
        <script>
            alert("Este correo ya está registrado, intenta con otro diferente");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Te has registrado exitosamente");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Ha ocurrido un error, vuelve a intentarlo");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);
?>