<?php
include '../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../FORMS-LOGIN-REGISTRO/login.php");
}

$sql = "SELECT * FROM carrito WHERE U_id = ";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/diseñopago.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="OPCMOV">
                <a class="dpdow nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">☰</a>
                <div class="dropdown-menu dropdown-menu-left">
                    <a class="dropdown-item" href="/HTML/FORMS-LOGIN-REGISTRO/login.html">Iniciar Sesion</a>
                    <a class="dropdown-item" href="/HTML/FORMS-LOGIN-REGISTRO/registro.html">Registrarme</a>
                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                    <a class="dropdown-item" href="../HTML/CARTA/tortas.html">Carta</a>
                    <a class="dropdown-item" href="../HTML/locales.html">Locales</a>
                    <a class="dropdown-item" href="../HTML/contacto.html">Contacto</a>
                </div>
            </div>
            <a class="titnavv" href="indexconsesion.php">
                <h1 class="titnav">Tortas Techi´s</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="itemsnav navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/HTML/CARTA/tortas.html">Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../HTML/locales.html">Locales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../HTML/contacto.html">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="OPCPC">
                <a class="dpdow nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false"><img src="../../imagenes/user.png" alt="user"
                        class="userlogo"></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../../HTML/FORMS-LOGIN-REGISTRO/login.html">Iniciar Sesion</a>
                    <a class="dropdown-item" href="../../HTML/FORMS-LOGIN-REGISTRO/registro.html">Registrarme</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="carta">

        <div class="login-container">
            <div class="log-items">
                <div class="labels-log">
                    <a href="../HTML/CARTA/tortas.html" class="volver"> ← Regresar a seguir comprando</a>
                    <h1>Carrito</h1>

                    <form action="" method="">
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table">
                                    <th scope="row">Producto</th>
                                    <td>Torta de chocolate</td>
                                    <td>S/. 40</td>
                                    <td>
                                    <input style="width:50px; text-align:center; border-radius:20px;" class=" custom-input" type="number" step="1" name="P_precio" value="1" required>                                    </td>
                                    <td>S/. 40</td>
                                </tr>
                                </tr>
                                <tr class="table-danger">
                                    <th scope="row">Total</th>
                                    <td></td>
                                    <td>S/. 40</td>
                                    <td>
                                    <td>S/. 40</td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                        <span>*Delivery gratis a partir de 30 soles.</span>
                        <div class="metodospago">
                            <br>
                        </div>
                        <a href="pagar.php">.<button type="submit" class="btn">Proceder a pago</button></a>
                    </form>

                </div>
                <div class="popup">
                    <span class="close-popup">&times;</span>
                    <h5>Registrate nos ayudará a darte una experiencia personalizada.</h5>
                </div>
            </div>
        </div>

    </div>
</body>
<footer>
    <div class="divfooter">
        <img src="../imagenes/logo.png" alt="milogo" class="imglogoprin">
        <a class="itemsfooter" href="..//HTML/nosotros.html">Nosotros</a>
        <a class="itemsfooter" href="https://goo.gl/maps/pviJPGxG7m7KWNzN8">Ubicación</a>
        <a class="itemsfooter" href="../HTML/terminos.html">Términos y condiciones</a>
        <a class="itemsfooter" href="../HTML/libroreclamaciones.html">Libro de reclamaciones</a>
        <a class="redesfooter" href="google.com"> <img src="../imagenes/red1.png" alt="imgred" class="imgred1"></a>
        <a class="redesfooter" href="https://www.facebook.com/profile.php?id=100064073740564"><img
                src="../imagenes/red2.png" alt="imgred" class="imgred2"></a>
        <a class="redesfooter" href="https://wa.link/cn4v1n"><img src="../imagenes/red3.png" alt="imgred"
                class="imgred3"></a>

    </div>
</footer>

</html>