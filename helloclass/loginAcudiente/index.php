<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: inicio/index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title><Login-register></Login-register></title>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una Cuenta</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-github'></i>
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <p>Usa tu email para registrarte</p>
                <form action="php/registro_usuario_be.php" method="POST" class="form">
                        <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                        </label>
                        <label>  
                        <i class='bx bx-envelope' ></i>
                        <input type="correo" placeholder="Correo Electronico" name="correo">
                        </label>
                        <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" placeholder="Contrasena" name = "contrasena">
                        </label>
                        <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>






    <div class="container-form login hide">
        <div class="information">
            <div class="info-childs">
                <h2>¡¡Bienvenido nuevamente!!</h2>
                <p>Para unirte a nuestra comunidad por favor resgistrate con tus datos</p>
                <input type="button" value="Registrarse" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-github'></i>
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <p>o Iniciar Sesión con una cuenta</p>
                <form action="php/login_usuario_be.php" method="POST" class="form">

                    <label >
                        <i class='bx bx-envelope' ></i>
                        <input type="email" placeholder="Correo Electronico" name="correo">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" placeholder="Contraseña" name = "contrasena">
                    </label>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>