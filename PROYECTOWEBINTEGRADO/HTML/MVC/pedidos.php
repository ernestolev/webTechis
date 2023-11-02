<?php 
include '../../Conexion/conexion.php';
$sql = "SELECT id_pedido, u_id , id_carrito, fecha_pedido, estado_pedido, id_delivery FROM pedido";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/diseñoDashboard.css">
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
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <h2>Tortas Techis</h2>
            </div>
            <ul class="menu">
                <li><a href="dashboard.php">Inicio</a></li>
                <li><a href="registrar_productos.php">Administrar Inventario</a></li>
                <li><a href="administrar_usuarios.php">Administrar Usuarios</a></li>
                <li><a href="ver_reclamos.php">Ver Reclamos</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <br>
                <br>
                <li><a href="../indexconsesion.php">...Regresar</a></li>
            </ul>
        </div>
        <div class="content">
            <header class="header">
                <div class="user-info">
                    <!-- Aquí muestra el nombre del usuario logueado -->
                    <h2>Mis pedidos</h2>
                </div>
            </header>
            <main class="main-content">
            <div class="row">
                    <!-- Primer div, 50% de ancho -->
                    <div class="col-12 col-md-6">
                        <div class="section_pedidos">
                            <h3>Realizados</h3>
                            <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Para</th>
                            <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["estado_pedido"] == "realizado") {
                                    echo '<tr class="">';
                                    echo "<td>" . $row["id_pedido"] . "</td>";
                                    echo "<td>" . $row["u_id"] . "</td>";
                                    echo "<td>" . $row["fecha_pedido"] . "</td>";

                                    echo "</tr>";
                                    
                                }else {
                                    echo "No se encontraron pedidos realizados.";}
                            }
                        } else {
                            echo "No se encontraron pedidos.";
                        }
                        ?>
                        </tbody>

                        </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Primer div, 50% de ancho -->
                    <div class="col-12 col-md-6">
                        <div class="section_pedidos">
                            <h3>Pendietes</h3>
                            <table class="table table-hover">
                            <thead>
                            <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Para</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT id_pedido, u_id, id_carrito, fecha_pedido, estado_pedido, id_delivery FROM pedido";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["estado_pedido"] == "pendiente") {
                                        echo '<tr class="">';
                                        echo "<td>" . $row["id_pedido"] . "</td>";
                                        echo "<td>" . $row["u_id"] . "</td>";
                                        echo "<td>" . $row["fecha_pedido"] . "</td>";
                                        echo '<td>
                                            <button class="btn btn-primary" data-id="' . $row['id_pedido'] . '">Realizado</button>
                                            <button class="btn btn-danger">Detalles</button>
                                        </td>';
                                        echo "</tr>";
                                    }
                                }
                            } else {
                                echo "No se encontraron pedidos pendientes.";
                            }
                            ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Agrega tus scripts o enlaces a archivos JS aquí -->

</body>

</html>
