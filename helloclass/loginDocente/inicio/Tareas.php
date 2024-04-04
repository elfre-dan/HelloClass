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
    <link rel="stylesheet" href="styleTarea.css">
    
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
                        <li><a href="notas.php">Acudientes</a></li>
                        <li><a href="tareas.php"id="selected">Tareas</a></li>
                        <li><a href="estudiantes.php">Mis estudiantes</a></li>
                        <li><a href="informacion.php">Informacion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <body>
        
<div class="formulario-container">
    <h1>Crear Tarea</h1>
    <form action="procesar_tarea.php" method="post">
        <label for="titulo">Título de la tarea:</label>
        <input type="text" id="titulo" name="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        
        <label for="fecha_limite">Fecha límite:</label>
        <input type="date" id="fecha_limite" name="fecha_limite" required>
        
        <button type="submit">Crear Tarea</button>
    </form>
</div>
<main>
    <table>
        <tr class="encabezado">
            <td>TÍTULO</td>
            <td>DESCRIPCIÓN</td>
            <td>FECHA LÍMITE</td>
            <td>ELIMINAR</td>
        </tr>
        <?php
            $sql = "SELECT * FROM tareas";
            $result = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($mostrar = mysqli_fetch_array($result)) {
        ?>
                    <tr class="columnas">
                        <td><?php echo $mostrar['titulo']?></td>
                        <td><?php echo $mostrar['descripcion']?></td>
                        <td><?php echo $mostrar['fecha_limite']?></td>
                        <td>
                            <button class="eliminar" data-id="<?php echo $mostrar['id']; ?>">
                                Eliminar
                            </button>
                        </td>
                    </tr>
        <?php
                }
            } else {
                echo '<tr><td colspan="4">No hay tareas nuevas</td></tr>';
            }
        ?>
    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.eliminar').click(function() {
            var idTarea = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'eliminar_tarea.php',
                data: { id: idTarea },
                success: function(response) {
                    // Puedes agregar aquí código adicional para actualizar la tabla o realizar otras acciones
                    alert('Tarea eliminada con éxito');
                },
                error: function(error) {
                    console.error('Error al eliminar tarea:', error);
                }
            });
        });
    });
</script>

</body>
</html>