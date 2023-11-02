<?php
include '../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    
    header("Location: FORMS-LOGIN-REGISTRO/login.php");
    
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libro de reclamaciones</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/diseñoLogin.css">
  <!-- Carga jQuery antes de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body style="background-color: rgba(194, 142, 143, 255);">
  <div class="login-container-reclamo">
    <div class="log-items">
      <div class="labels-log">
        <a href="indexconsesion.php" class="volver"> ← Regresar a Inicio</a>
        <h1>Libro de reclamaciones</h1>
        <form action="../PHP/guardar_reclamo.php" method="POST">
          <br>
          <small id="emailHelp" class="form-text text-muted">1. No es necesario identificarte, ya tenemos tus datos principales de sesión.</small>
          <label for="exampleInputEmail1" class="form-label mt-4">Domicilio</label>
          <input type="text" name="domicilio" class="form-control" id="exampleInputEmail1" placeholder="Ej: av. 2 de julio">
          <br>
          <small id="emailHelp" class="form-text text-muted">2. Identificación del bien contratado</small>
          <div class="form-check">
            <input class="form-check-input"  name="tipo_bien" type="radio" name="optionsRadios" id="optionsRadios1" value="SERVICIO"
              checked="">
            <label class="form-check-label" for="optionsRadios1">
              Servicio
            </label>
            <br>
            <input class="form-check-input" name="tipo_bien" type="radio" name="optionsRadios" id="optionsRadios1" value="PRODUCTO"
              checked="">
            <label class="form-check-label" for="optionsRadios1">
              Producto
            </label>
          </div>
          <label for="" class="label-log"> Motivo de reclamo</label>
          <input class="form-control" name="motivo_reclamo" type="text" placeholder="">
          <label for="" class="label-log">Detalles</label>
          <textarea class="form-control" name="detalles" id="exampleTextarea" rows="3"></textarea>
          <br>
          <small id="emailHelp" class="form-text text-muted">3. Detalle y pedido del consumidor</small>
          <legend class="mt-4"></legend>
          <div class="form-check">
            <input class="form-check-input" name="tipo_registro" type="radio" name="optionsRadios1" id="optionsRadios1" value="RECLAMO"
              checked="">
            <label class="form-check-label" for="optionsRadios1">
              Reclamo
            </label>
            <br>
            <input class="form-check-input" name="tipo_registro" type="radio" name="optionsRadios1" id="optionsRadios1" value="QUEJA"
              checked="">
            <label class="form-check-label" for="optionsRadios1">
              Queja
            </label>
          </div>
          <button type="submit" class="btn">Registrar reclamo</button>
        </form>

      </div>
      <div class="popup">
        <span class="close-popup">&times;</span>
        <h5>Registrate nos ayudará a darte una experiencia personalizada.</h5>
      </div>
    </div>
  </div>
</body>

</html>