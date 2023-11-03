<?php
include '../Conexion/conexion.php';
session_start();

$totalGeneral = 0;

if (!isset($_SESSION['user'])) {
    header("Location: ../FORMS-LOGIN-REGISTRO/login.php");
}
$userId = $_SESSION['user'];
$sql = "SELECT * FROM carrito WHERE U_id = '$userId'";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau+Infant:wght@500&display=swap" rel="stylesheet">

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
                    aria-haspopup="true" aria-expanded="false"><img src="../imagenes/user.png" alt="user"
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
    <div class="carta">

        <div class="login-container">
            <div class="log-items" id="log-item-1">
                <div class="labels-log">
                    <a href="CARTA/tortas.php" class="volver"> ← Regresar a seguir comprando</a>
                    <h1>Carrito</h1>

                    <form action="procesar_pago.php" method="post">
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Items</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    $productId = $row['P_id'];
                                    $nameQuery = "SELECT P_nom FROM productos WHERE P_id = $productId";
                                    $nameResult = mysqli_query($conn, $nameQuery);

                                    if ($nameResult && $nameRow = mysqli_fetch_assoc($nameResult)) {
                                        $productName = $nameRow['P_nom'];
                                        echo "<td>" . $productName . "</td>";
                                    } else {
                                        echo "<td>Producto no disponible</td>";
                                    }

                                    // Realiza una consulta para obtener el precio del producto
                                    $productId = $row['P_id'];
                                    $priceQuery = "SELECT P_precio FROM productos WHERE P_id = $productId";
                                    $priceResult = mysqli_query($conn, $priceQuery);

                                    if ($priceResult && $priceRow = mysqli_fetch_assoc($priceResult)) {
                                        $productPrice = $priceRow['P_precio'];
                                        echo "<td>S/. " . $productPrice . "</td>";
                                    } else {
                                        echo "<td>Precio no disponible</td>";
                                    }

                                    echo '<td>
                                    <input style="width:50px; text-align:center; border-radius:20px;" class="custom-input" type="number" step="1" data-product-id="' . $row['P_id'] . '" value="' . $row['P_cantidad'] . '" required>
                                </td>';
                                    echo "<td>S/. " . ($row['P_cantidad'] * $productPrice) . "</td>";
                                    echo '<td>
                                    <button class="btn-primary eliminar-item" data-product-id="' . $row['P_id'] . '">Eliminar</button>  
                                </td>';

                                    // Calcula el total por producto y suma al total general
                                    $totalProducto = $row['P_cantidad'] * $productPrice;
                                    $totalGeneral += $totalProducto;

                                    echo "</tr>";
                                }

                                echo '<tr>
                                <td>TOTAL</td>
                                <td></td>
                                <td></td>
                                <td>S/. ' . number_format($totalGeneral, 2) . '</td>
                            </tr>';
                                ?>
                            </tbody>
                        </table>
                        <div class="formaentrega">
                            <span>¿Cómo será la entrega?</span>
                            <br>
                            <input type="radio" name="opc" value="Recojo" id="recojoRadio"> Recojo en tienda
                            <br>
                            <input type="radio" name="opc" value="Delivery" id="deliveryRadio"> Delivery a domicilio
                            <br>
                            <br>
                            

                        </div>
                        <div class="botones_carrito">

                            <button type="button" class="btn" id="confirmar-pedido">Confirmar pedido.</button>
                            <a href=""><button id="btn-actualizar-cantidad" class="btn">Actualizar Cantidad</button></a>

                        </div>
                    </form>

                </div>
                <div class="popup">
                    <span class="close-popup">&times;</span>
                    <h5>Registrate nos ayudará a darte una experiencia personalizada.</h5>
                </div>
            </div>
            <div class="log-items" id="log-item-2">
                <div class="labels-log">
                    <a href="CARTA/tortas.php" class="volver"> ← Volver a la carta</a>
                    <h1>Tu pedido</h1>

                    <form action="procesar_pago.php" method="post">
                        <br>
                        <div class="entrega">
                            <span>¿Hacia donde te lo enviamos?</span>
                            <br>
                            <span>Distrito:</span>
                            <br>
                            <select class="form-select" name="distrito" id="distrito">
                                <option>Chincha Alta</option>
                                <option>Grocio Prado</option>
                                <option>Pueblo Nuevo</option>
                                <option>Sunampe</option>
                                <option>Chincha baja</option>
                            </select>
                            <br>
                            <span>Direccion:</span>
                            <br>
                            <input type="text" name="direccion" id="direccion" placeholder="Ej: av. el callar 258">
                            <input type="text" name="entrega" value="delivery" style="display:none">
                            <input type="text" name="precio" value="<?php echo $totalGeneral + 9; ?>" style="display:none">

                            <br>
                            <br>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Items</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                echo '<tr>
                                <td>Total productos</td>
                                <td></td>
                                <td></td>
                                <td>S/. ' . number_format($totalGeneral, 2) . '</td>
                            </tr>';
                                ?>
                                <tr>
                                    <td>Delivery</td>
                                    <td></td>
                                    <td></td>
                                    <td>S/. 9.00</td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <br>
                        <div class="botones_carrito">

                            <button type="submit" class="btn-procesar-pago">Realizar pago.</button>

                        </div>
                    </form>
                    <a href=""><button id="btn-actualizar-cantidad" class="btn">Editar mi carrito</button></a>

                </div>
            </div>
            <div class="log-items" id="log-item-3">
                <div class="labels-log">
                    <a href="CARTA/tortas.php" class="volver"> ← Volver a la carta</a>
                    <h1>Tu pedido</h1>

                    <form action="procesar_pago.php" method="post">
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Items</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                echo '<tr>
                                <td>Total productos</td>
                                <td></td>
                                <td></td>
                                <td>S/. ' . number_format($totalGeneral, 2) . '</td>
                            </tr>';
                                ?>
                                <tr>
                                    <td>Recojo en tienda</td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="">Ver mapa</a></td>
                                </tr>
                                <input type="text" name="entrega" value="recojo" style="display:none">
                            <input type="text" name="precio" value="<?php echo $totalGeneral; ?>" style="display:none">

                            </tbody>
                        </table>
                        <br>
                        <br>

                        <div class="botones_carrito">

                            <a><button type="submit" class="btn-procesar-pago">Realizar pago.</button></a>
                            

                        </div>
                    </form>
                    <a href=""><button id="btn-actualizar-cantidad" class="btn">Editar mi carrito</button></a>           
                </div>
            </div>
        </div>

    </div>

    <script>
        $("#log-item-1").show();
        $("#log-item-2").hide();
        $("#log-item-3").hide();
        $(document).ready(function () {

            // Maneja el evento de clic en el botón "Editar mi carrito" en los divs 2 y 3
            $("#log-item-2 button#btn-actualizar-cantidad, #log-item-3 button#btn-actualizar-cantidad").on("click", function () {
                // Vuelve a mostrar el primer div
                $("#log-item-1").show();
                $("#log-item-2").hide();
                $("#log-item-3").hide();
            });

            // Maneja el evento de clic en el botón "Eliminar" para quitar elementos del carrito
            $('.eliminar-item').on('click', function () {
                var productId = $(this).data('product-id');

                // Realiza una solicitud AJAX para eliminar la entrada del carrito
                $.post('eliminar_item.php', { product_id: productId }, function (data) {
                    // Recarga la página después de eliminar el elemento
                    location.reload();
                });
            });

            // Maneja el evento de clic en el botón "Actualizar Cantidad" en el div 1
            $('#btn-actualizar-cantidad').on('click', function () {
                // Itera a través de las filas de la tabla y obtén las cantidades actualizadas
                $('table tbody tr').each(function () {
                    var productId = $(this).find('.custom-input').data('product-id');
                    var newQuantity = $(this).find('.custom-input').val();

                    // Realiza una solicitud AJAX al servidor para actualizar la cantidad en la base de datos
                    $.post('actualizar_cantidad.php', { product_id: productId, quantity: newQuantity }, function (data) {
                        // Recarga la página después de actualizar las cantidades
                        location.reload();
                    });

                    // Actualiza el precio total en la tabla
                    var productPrice = parseFloat($(this).find('.product-price').text().replace('S/. ', ''));
                    var totalPrice = newQuantity * productPrice;
                    $(this).find('.total-price').text('S/. ' + totalPrice);
                });
            });
        });
        $(document).ready(function () {
    $("#confirmar-pedido").on("click", function (event) {
                event.preventDefault();

                var entregaOption = $("input[name='opc']:checked").val().toString();
                console.log(entregaOption);
                // Obtén los valores de distrito y dirección, pero solo si la entrega es "Delivery"
                var distritoEnvio = "recojo";
                var direccionEnvio = "recojo";

                if (entregaOption === "Delivery") {
                    distritoEnvio = $("select[name='distrito']").val();
                    direccionEnvio = $("input[name='direccion']").val();
                }

                // Ahora puedes usar estos valores para enviar al servidor y guardar en la tabla pedido

                // Ajusta la columna 'entrega' en función de la selección
                if (entregaOption === "Recojo") {
                    $("#log-item-1").hide();
                    $("#log-item-2").hide();
                    $("#log-item-3").show();
                    // Establece 'entrega' en 'recojo' y deja distritoEnvio y direccionEnvio en blanco
                    entregaOption = "recojo";
                    distritoEnvio = "recojo";
                    direccionEnvio = "recojo";
                } else if (entregaOption === "Delivery") {
                    $("#log-item-1").hide();
                    $("#log-item-2").show();
                    $("#log-item-3").hide();
                    entregaOption = "delivery";
                    // Establece 'entrega' en 'delivery'
                }
                console.log("Valor de entregaOption:", entregaOption);
                // A continuación, puedes enviar estos datos al servidor a través de una solicitud AJAX y guardarlos en la tabla pedido.
                // Aquí se muestra un ejemplo de cómo puedes enviar estos datos al servidor.
                $.post('procesar_pedido.php', {
                    entrega: entregaOption,
                    distrito_envio: distritoEnvio,
                    direccion_envio: direccionEnvio
                }, function (data) {
                    // Realiza cualquier otra acción necesaria después de guardar los datos en la tabla pedido
                });
            });
        });

        </script>




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