<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/diseñoLogin.css">
    <!-- Carga jQuery antes de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../JS/funcionregistro.js"></script>
</head>

<body style="background-color: rgba(194, 142, 143, 255);">
    <?php include '../../Conexion/conexion.php'; ?>
    <div class="login-container">
        <div class="log-items">
            <div class="labels-log">
                <a href="../../index.php" class="volver"> ← Regresar a Inicio</a>
                <h1>Registro</h1>
                <form id="registro-form" action="../../PHP/procesar_registro.php" method="POST">
                    <label for="dni" class="label-log">Ingresa DNI:</label>
                    <input class="form-control" type="text" id="dni" name="dni" placeholder="Ej: 71008945">
                    <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
                    <br>
                    <br>

                    <label for="nombre" class="label-log">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" readonly>

                    <label for="apellido" class="label-log">Apellido:</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" readonly>

                    <label for="exampleInputEmail1" class="form-label mt-4">Correo</label>
                    <input type="email" class="form-control" name="correo" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ej: estoesun.ejemplo@gmail.com">
                    <small id="emailHelp" class="form-text text-muted">Tu correo no se compartirá con nadie.</small>
                    <br>
                    <label for="exampleSelect1" class="label-log">Distrito</label>
                    <br>
                    <select class="form-select" name="distrito" id="exampleSelect1">
                        <option>Chincha Alta</option>
                        <option>Grocio Prado</option>
                        <option>Pueblo Nuevo</option>
                        <option>Sunampe</option>
                        <option>Chincha baja</option>
                    </select>
                    <br>

                    <label for="password" class="label-log">Crea una contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="***********" autocomplete="off">

                    <button type="submit" class="btn">Registrarme</button>
                </form>



            </div>
            <a href="#" class="olvidepw">Por qué debo registrarme?</a>
            <div class="popup">
                <span class="close-popup">&times;</span>
                <h5>Registrate nos ayudará a darte una experiencia personalizada.</h5>
            </div>
        </div>
    </div>
</body>

</html>