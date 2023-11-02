<?php
include '../../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../FORMS-LOGIN-REGISTRO/login.php");
}

$sql = "SELECT P_imagen, P_nom, P_desc, P_precio FROM productos WHERE P_tipo = 'bebida'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tortas Techi´s</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/diseñocarta.css">
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
                    <a class="dropdown-item" href="login.html">Iniciar Sesion</a>
                    <a class="dropdown-item" href="registro.html">Registrarme</a>
                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                    <a class="dropdown-item" href="../CARTA/tortas.html">Carta</a>
                    <a class="dropdown-item" href="../locales.html">Locales</a>
                    <a class="dropdown-item" href="../contacto.html">Contacto</a>
                </div>
            </div>
            <a class="titnavv" href="../indexconsesion.php">
                <h1 class="titnav">Tortas Techi´s</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="itemsnav navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tortas.php">Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../locales.html">Locales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contacto.html">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="OPCPC">
                <a class="dpdow nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false"><img src="../../imagenes/user.png" alt="user"
                        class="userlogo">
                    <?php
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo $_SESSION['nombre_usuario'];
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../cerrar_sesion.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="secciones">
        <a href="tortas.php">
            <img src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/category/tortas_1_2.svg" alt="">
            <br>
            <Strong>Tortas</Strong>
        </a>
        <a href="porciones.php">
            <img src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/category/porcion_1.svg" alt="">
            <br>
            <Strong>Porciones</Strong>
        </a>
        <a href="bebidas.php"
            style="background-color: rgb(240, 239, 239); border-radius: 20px;transform: translateY(20%);">
            <img src="https://dxnn4n4cam0ol.cloudfront.net/media/catalog/category/bebidas1.svg" alt="">
            <br>
            <Strong>Bebidas</Strong>
        </a>
    </div>
    <div class="carta">
        <div class="busqueda">
            <input class="form-control" type="text" placeholder="Buscar producto">
            <button class="btn btn-danger">🔎</button>
            <label for="" class="form-label mt-4"></label>
            <select class="form-select" id="exampleSelect1">
                <option>Ordenar por:</option>
                <option>Precio</option>
                <option>Nombre</option>
            </select>
            <a href="#" id="mostrarPopup" class="carritocompras">
                <img style="width: 50px;"
                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpngimg.com%2Fuploads%2Fshopping_cart%2Fshopping_cart_PNG38.png&f=1&nofb=1&ipt=f5553ad14ca3d4dc9bfcd3898be75b7077eb5aef03d854f9398cc70e671d796d&ipo=images"
                    alt="">
                <strong>3</strong>
                <strong>- Carrito</strong>
            </a>
        </div>
        <div class="contenedor">
            <?php
            $count = 0; // Contador de productos
            while ($row = mysqli_fetch_assoc($result)) {
                if ($count % 3 == 0) {
                    // Abre una nueva fila para cada 3 elementos
                    if ($count > 0) {
                        echo '</div>';
                    }
                    echo '<div class="fila">';
                }

                // Muestra el producto
                echo '<div class="elemento">';
                $imagenNombre = $row['P_imagen'];
                echo '<img src="../' . $imagenNombre . '" alt="' . $row['P_imagen'] . '">';
                echo '<h5>' . $row['P_nom'] . '</h5>';
                echo '<p>' . $row['P_desc'] . '</p>';
                echo '<strong>S/. ' . $row['P_precio'] . '</strong>';
                echo '<br>';
                echo '<button class="btn btn-danger">Añadir al carrito</button>';
                echo '</div>';

                $count++;
            }
            ?>
        </div>
    </div>
    <div id="popup" class="popup">
        <div class="popup-contenido">
            <span class="cerrar-popup" id="cerrarPopup">&times;</span>
            <h2>Tu carrito</h2>
            <p>Aquí podras visualizar tu carrito.</p>
            <div class="item-carrito">
                <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.recepti.com%2Fimages%2Fstories%2Fkuvar%2Ftorte%2F04595-torta-elizabeta_zoom.jpg&f=1&nofb=1&ipt=55ce9297206ca6d42867a68adca6a54dd2f3826e47aa4323b7a82dc90b61b57a&ipo=images"
                    alt="">
                <h5>Torta de chocolate</h5>
                <strong>S/. 40</strong>
                <br>
                <button class="btn btn-danger">+</button>
                <button class="btn btn-secondary">-</button>
                <input type="text" name="" id="" class="form-control" value="1">
            </div>
            <div class="item-carrito">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fres.cloudinary.com%2Friqra%2Fimage%2Fupload%2Fv1570825663%2Fsellers%2Fil-pastificio%2Fproducts%2Fsvo9wsy9fvitctrf3p8e.png&f=1&nofb=1&ipt=697401ecc0d01b2f9a09f71f4fb14505e156f083ea36fe8406cd7d412af1fba4&ipo=images"
                    alt="">
                <h5>Porcion de chocolate</h5>
                <strong>S/. 9</strong>
                <br>
                <button class="btn btn-danger">+</button>
                <button class="btn btn-secondary">-</button>
                <input type="text" name="" id="" class="form-control" value="1">
            </div>
            <div class="item-carrito">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftrigodeoro.com.pe%2Fwp-content%2Fuploads%2F2020%2F09%2Fvaso-chicha-trigo-de-oro.png&f=1&nofb=1&ipt=90ce09a14ab8a145e5ce17ab0f0d5120d9cedf082954f71b4f4196207a1cff15&ipo=images"
                    alt="">
                <h5>Vaso de chicha morada</h5>
                <strong>S/. 7</strong>
                <br>
                <button class="btn btn-danger">+</button>
                <button class="btn btn-secondary">-</button>
                <input type="text" name="" id="" class="form-control" value="1">
            </div>
            <div class="resumen-carrito">
                <h5>Resumen:</h5>
                <strong class="precio-resumen">S/. 56</strong>
                <a href="/HTML/pagar.html"><button class="btn btn-danger">Pagar</button></a>                </div>
        </div>

    </div>

    <script>
        const mostrarPopup = document.getElementById('mostrarPopup');
        const popup = document.getElementById('popup');
        const cerrarPopup = document.getElementById('cerrarPopup');

        // Mostrar el popup al hacer clic en el enlace
        mostrarPopup.addEventListener('click', () => {
            popup.style.display = 'block';
        });

        // Cerrar el popup al hacer clic en la "X"
        cerrarPopup.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        // Cerrar el popup al hacer clic fuera de él (en el fondo oscuro)
        window.addEventListener('click', (event) => {
            if (event.target === popup) {
                popup.style.display = 'none';
            }
        });
    </script>
</body>
<footer>
    <div class="divfooter">
        <img src="../../imagenes/logo.png" alt="milogo" class="imglogoprin">
        <a class="itemsfooter" href="../nosotros.html">Nosotros</a>
        <a class="itemsfooter" href="https://goo.gl/maps/pviJPGxG7m7KWNzN8">Ubicación</a>
        <a class="itemsfooter" href="../terminos.html">Términos y condiciones</a>
        <a class="itemsfooter" href="../libroreclamaciones.html">Libro de reclamaciones</a>
        <a class="redesfooter" href="google.com"> <img src="../../imagenes/red1.png" alt="imgred" class="imgred1"></a>
        <a class="redesfooter" href="https://www.facebook.com/profile.php?id=100064073740564"><img
                src="../../imagenes/red2.png" alt="imgred" class="imgred2"></a>
        <a class="redesfooter" href="https://wa.link/cn4v1n"><img src="../../imagenes/red3.png" alt="imgred"
                class="imgred3"></a>

    </div>
</footer>

</html>