<?php
    $conexion=mysqli_connect('localhost','root','','tarea');
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Por favor debes iniciar sesión");
        </script>
        window.location = "../index.php";
        ';
        session_destroy();
        die();  
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Menu</title>
    <link rel="stylesheet" href="estiloinformacion.css">
</head>
<body>
    <header>
        <div class="heder__superior">
            <div class="logo">
                <img src="img/img.png" alt="">
            </div>
            <div class="cerrar_sesion">
             <a href="cerrar_sesion.php">cerrar sesión</a>   
            </div>
        </div>
        <div class="container__menu">
            <div class="menu">
                <input type="checkbox" name="" id="check__menu">
                <label id="#label__check" for="check__menu">
                    <i class="bx bx-menu icon__menu"></i>
                </label>
                <nav>
                    <ul>
                        <li><a href="index.php"></a></li>
                        <li><a href="tareas.php"id="selected">Tareas</a></li>
                        <li><a href="informacion.php">Informacion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <table>
            <tr class="encabezado">
            <td>TÍTULO</td>
            <td>DESCRIPCIÓN</td>
            <td>FECHA LÍMITE</td>
            <td>ENTREGA</td>
            </tr>
            <?php
    $sql = "SELECT * FROM tareas";
    $result = mysqli_query($conexion, $sql);

    // Verificar si hay tareas disponibles
    if (mysqli_num_rows($result) > 0) {
        while ($mostrar = mysqli_fetch_array($result)) {
?>
            <tr class="columnas">
                <td><?php echo $mostrar['titulo']?></td>
                <td><?php echo $mostrar['descripcion']?></td>
                <td><?php echo $mostrar['fecha_limite']?></td>
                <td>
                    <input type="button" class="subir-archivo-btn" value="Subir Archivo">
                </td>
            </tr>
<?php
        }
    } else {
        // Mostrar mensaje si no hay tareas
        echo '<tr><td colspan="4">No hay tareas nuevas</td></tr>';
    }
?>
    </table>
    </main>
</body>
</html>