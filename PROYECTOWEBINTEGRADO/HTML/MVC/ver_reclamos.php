<?php 
include '../../Conexion/conexion.php';
$sql = "SELECT R_id, U_id, R_domicilio, R_bien, R_motivo, R_detalles, R_tipo FROM libror";
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
                    <h2>Resumen de reclamos.</h2>
                </div>
            </header>
            <main class="main-content">
                <div class="row">
                    <!-- Columna 1 -->
                    <div class="cole">
                        <div class="sectionPROD3">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID RECLAMO</th>
                            <th scope="col">DNI</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">DESCRIPCION</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">TIPO</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">IMAGEN</th>
                            <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $sql2 = "SELECT nombre FROM usuarios WHERE id = " . $row["U_id"];
                                        $result2 = $conn->query($sql2);
                                        $nombre = "No encontrado"; // Valor predeterminado si no se encuentra el nombre
                                        if ($result2->num_rows > 0) {
                                            $usuario = $result2->fetch_assoc();
                                            $nombre = $usuario["nombre"];
                                        }

                                        echo '<tr class="">';
                                        echo "<td>" . $row["R_id"] . "</td>";
                                        echo "<td>" . $row["U_id"] . "</td>";
                                        echo "<td>" . $nombre . "</td>"; // Mostrar el nombre del usuario
                                        echo "<td>" . $row["R_domicilio"] . "</td>";
                                        echo "<td>" . $row["R_bien"] . "</td>";
                                        echo "<td>" . $row["R_motivo"] . "</td>";
                                        echo "<td>" . $row["R_detalles"] . "</td>";
                                        echo "<td>" . $row["R_tipo"] . "</td>";
                                        echo '<td>
                                            <button class="btn btn-primary" data-id="' . $row['R_id'] . '">Ver</button>
                                            </td>';

                                        echo "</tr>";
                                    }
                                } else {
                                    echo "No se encontraron reclamos.";
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
