<?php
$conexion = mysqli_connect("localhost", "root", "");

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$databaseName = "tarea";
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";
if ($conexion->query($createDatabaseQuery) === TRUE) {
    
    mysqli_select_db($conexion, $databaseName);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS tareas (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            titulo VARCHAR(255) NOT NULL,
                            descripcion TEXT NOT NULL,
                            fecha_limite DATE NOT NULL
                        )";
    if ($conexion->query($createTableQuery) === FALSE) {
        die("Error creating table: " . $conexion->error);
    }
} else {
    die("Error creating database: " . $conexion->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_limite = $_POST['fecha_limite'];

    // Sentencia preparada para prevenir inyección SQL
    $insertQuery = $conexion->prepare("INSERT INTO tareas (titulo, descripcion, fecha_limite) VALUES (?, ?, ?)");
    $insertQuery->bind_param("sss", $titulo, $descripcion, $fecha_limite);

    if ($insertQuery->execute()) {
        echo '
            <script>
                alert("Tarea creada con éxito");
                window.location = "Tareas.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Ha ocurrido un error al crear la tarea");
                window.location = "Tareas.php";
            </script>
        ';
    }

    // Cerrar la sentencia preparada
    $insertQuery->close();
}

// Cerrar la conexión
$conexion->close();
?>
