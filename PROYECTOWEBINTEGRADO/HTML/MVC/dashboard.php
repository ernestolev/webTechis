<?php
include '../../PHP/datos_dashboard.php';
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
                    <h2>Bienvenido, Admin <?php echo $nombreUsuario; ?></h2>
                </div>
            </header>
            <main class="main-content">
                <h3>Aquí verás un resumen de todo.</h3>
                <div class="row">
                    <!-- Columna 1 -->
                    <div class="col">
                        <div class="section">
                            <h3>Stock de productos</h3>
                            <div class="listaproddiv">
                                <ul class="list-group listaprod">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tortas
                                        <span class="badge bg-danger rounded-pill"><?php echo $stockTortas; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Porciones
                                        <span class="badge bg-danger rounded-pill"><?php echo $stockPorciones; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Bebidas
                                        <span class="badge bg-danger rounded-pill"><?php echo $stockBebidas; ?></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!--     Columna 2 -->
                    <div class="col">
                        <div class="section">
                            <h3>Usuarios registrados</h3>
                            <div class="circle"><?php echo $rowUsuarios['total_usuarios']; ?></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Columna 1 -->
                    <div class="col">
                    <div class="section">
                        <h3>Reclamos</h3>
                        <div class="circle"><?php echo $rowReclamos['total_reclamos']; ?></div>
                        <span>Recuerda que los reclamos no son buena señal.</span>
                    </div>

                    </div>
                    <!-- Columna 2 -->
                    <div class="col">
                        <div class="section">
                        <h3>Pedidos</h3>
                            <div class="pedidosDB">
                                <div class="itemPDB">
                                <span>Realizados</span>
                                <?php
                                // Consulta para contar pedidos realizados
                                $sql_realizados = "SELECT COUNT(*) AS count_realizados FROM pedido WHERE estado_pedido = 'realizado'";
                                $result_realizados = $conn->query($sql_realizados);
                                $row_realizados = $result_realizados->fetch_assoc();
                                $count_realizados = $row_realizados['count_realizados'];
                                echo '<div class="circleR">' . $count_realizados . '</div>';
                                ?>
                                </div>
                                <div class="itemPDB">
                                <span>Pendientes</span>
                                <?php
                                // Consulta para contar pedidos pendientes
                                $sql_pendientes = "SELECT COUNT(*) AS count_pendientes FROM pedido WHERE estado_pedido = 'pendiente'";
                                $result_pendientes = $conn->query($sql_pendientes);
                                $row_pendientes = $result_pendientes->fetch_assoc();
                                $count_pendientes = $row_pendientes['count_pendientes'];
                                echo '<div class="circleP">' . $count_pendientes . '</div>';
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Agrega tus scripts o enlaces a archivos JS aquí -->

</body>

</html>