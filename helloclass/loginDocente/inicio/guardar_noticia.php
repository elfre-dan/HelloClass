<?php
$conexion = mysqli_connect("localhost", "root", "");

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$databaseName = "información";
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
if ($conexion->query($createDatabaseQuery) === TRUE) {
    
    mysqli_select_db($conexion, $databaseName);

  
    $createTableQuery = "CREATE TABLE IF NOT EXISTS informaciones (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            nombre VARCHAR(255) NOT NULL,
                            informacion TEXT NOT NULL
                        )";
    if ($conexion->query($createTableQuery) === FALSE) {
        die("Error creating table: " . $conexion->error);
    }
} else {
    die("Error creating database: " . $conexion->error);
}


$nombre = $_POST['nombre'];
$informacion = $_POST['informacion'];


$insertQuery = "INSERT INTO informaciones (nombre, informacion) VALUES ('$nombre', '$informacion')";
if ($conexion->query($insertQuery) === TRUE) {
    echo '
        <script>
            alert("Se ha publicado tu informacion");
            window.location = "informacion.php";
        </script>
    ';
} else {
    echo '
    <script>
        alert("Ha ocurrido un error");
        window.location = "informacion.php";
    </script>
    ';

}

// Cerrar la conexión
$conexion->close();
?>