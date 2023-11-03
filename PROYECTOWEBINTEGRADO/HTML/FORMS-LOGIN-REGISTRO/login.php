<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/diseñoLogin2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ysabeau+Infant:wght@500&display=swap" rel="stylesheet">

</head>

<body style="
background-color: rgba(194, 142, 143, 255);">
<?php include '../../Conexion/conexion.php'; ?>
    <div class="login-container">
        <div class="log-items">
            <div class="labels-log">
                <a href="../../index.php" class="volver"> ← Regresar a Inicio</a>
                <h1>Iniciar Sesión</h1>
                <form action="../../PHP/procesar_login.php" method="POST">
                    <label for="dni_correo" class="label-log"> Ingresa Dni o correo</label>
                    <input class="form-control" type="text" name="dni_correo" placeholder="Ej: 71458956 o ejemplo@gmail.com">
                    <label for="password" class="label-log">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="***********" autocomplete="off">
                    <button type="submit" class="btn">Iniciar</button>
                </form>
            </div>
            <!-- Enlace para mostrar el mensaje emergente -->
            <a href="#" class="olvidepw">Olvidé mi contraseña</a>
            <!-- Estructura del mensaje emergente -->
            <div class="popup">
                <span class="close-popup">&times;</span>
                <p>Texto de ejemplo que explica por qué debes recuperar tu contraseña.</p>
                <p>Segunda línea de información.</p>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const link = document.querySelector('.olvidepw');
            const popup = document.querySelector('.popup');
            const closeBtn = document.querySelector('.close-popup');

            link.addEventListener('click', function (e) {
                e.preventDefault();
                popup.style.display = 'block';
            });

            closeBtn.addEventListener('click', function () {
                popup.style.display = 'none';
            });
        });

    </script>
</body>
</html>
