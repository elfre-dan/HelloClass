<?php
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
    <link rel="stylesheet" href="estilos.css">
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
                        <li><a href="index.php" id="selected"></a></li>
                        <li><a href="tareas.php">Tareas</a></li>
                        <li><a href="informacion.php">Informacion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
    <section class="informacion-colegio">
            <h1>Información del Colegio</h1>
            <p>
                Aquí puedes agregar información relevante sobre el colegio, como su historia, misión, visión y valores.
            </p>
        </section>

        <section class="galeria-imagenes">
            <h2>Galería de Imágenes</h2>
            <div class="imagen">
                <img src="imagen1.jpg" alt="Imagen 1">
                <p>Descripción de la imagen 1</p>
            </div>
            <div class="imagen">
                <img src="imagen2.jpg" alt="Imagen 2">
                <p>Descripción de la imagen 2</p>
            </div>
            <!-- Agrega más imágenes según sea necesario -->
        </section>

        <section class="noticias">
            <h2>Noticias y Eventos</h2>
            <article class="noticia">
                <h3>Evento de Graduación</h3>
                <p>Fecha: 15 de junio de 2023</p>
                <p>Descripción: Información sobre el evento de graduación.</p>
            </article>
            <article class="noticia">
                <h3>Torneo Deportivo</h3>
                <p>Fecha: 30 de julio de 2023</p>
                <p>Descripción: Detalles sobre el torneo deportivo de la escuela.</p>
            </article>
            <!-- Agrega más noticias y eventos según sea necesario -->
        </section><!-- Contenido de la página -->
    </main>
</body>
</html>