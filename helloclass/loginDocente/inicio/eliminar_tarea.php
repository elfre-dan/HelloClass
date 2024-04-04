<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $idTarea = $_POST['id'];

    // Agrega la lógica para eliminar la tarea en la base de datos
    $sql = "DELETE FROM tareas WHERE id = $idTarea";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo 'Tarea eliminada correctamente';
    } else {
        echo 'Error al eliminar la tarea';
    }
} else {
    echo 'Petición no válida';
}
?>



