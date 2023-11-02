<?php 
include '../../Conexion/conexion.php';
$sql = "SELECT P_id, P_nom, P_desc, P_precio, P_tipo, P_stock, P_imagen  FROM productos";
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
                    <h2>Mis productos.</h2>
                </div>
            </header>
            <main class="main-content">
                <div class="row">
                    <!-- Columna 1 -->
                    <div class="cole">
                        <div class="sectionPROD1">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
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
                                    echo '<tr class="">';
                                    echo "<td>" . $row["P_id"] . "</td>";
                                    echo "<td>" . $row["P_nom"] . "</td>";
                                    echo "<td>" . $row["P_desc"] . "</td>";
                                    echo "<td>" . $row["P_precio"] . "</td>";
                                    echo "<td>" . $row["P_tipo"] . "</td>";
                                    echo "<td>" . $row["P_stock"] . "</td>";
                                    // Muestra la imagen utilizando la etiqueta <img>
                                    echo '<td><img src="../' . $row["P_imagen"] . '" alt="' . $row["P_imagen"] . '" width="100"></td>';
                                    echo '<td>
                                        <button class="btn btn-secondary" data-id="' . $row['P_id'] . '">Editar</button>
                                        <button class="btn btn-danger" data-id="'. $row['P_id'].'">Borrar</button>
                                        </td>';

                                    echo "</tr>";
                                }
                            } else {
                                echo "No se encontraron usuarios.";
                            }
                            ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="cole">
                        <div class="sectionPROD2">
                        <form  action="../../PHP/insertarProductos.php" method="POST" enctype="multipart/form-data">
                            <div class="formINSERTAR">
                            <label for="P_nom">Nombre del Producto:</label>
                            <input class="form-control" type="text" name="P_nom" required><br>

                            <label for="P_desc">Descripción:</label>
                            <textarea class="form-control" name="P_desc" required></textarea><br>

                            <label for="P_precio">Precio:</label>
                            <input class="form-control" type="number" step="0.10" name="P_precio" required><br>

                            <label for="P_tipo">Tipo:</label>
                            <input class="form-control" type="text" name="P_tipo" required><br>

                            <label for="P_stock">Stock:</label>
                            <input class="form-control" type="number" name="P_stock" required><br>

                            <label for="P_imagen">Imagen:</label>
                            <input class="form-control" type="file" name="P_imagen" accept="image/*" required><br><br>

                            <button class="btn btn-primary" type="submit" value="Insertar Producto">INSERTAR PRODUCTO</button>
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("button.btn-danger").click(function() {
            var id = $(this).data("id");

            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                $.ajax({
                    type: "POST",
                    url: "../../PHP/eliminarProducto.php",
                    data: { id: id },
                    success: function(response) {
                        alert(response);
                        // Recarga la página para actualizar la lista de productos
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("Error al eliminar el producto");
                    }
                });
            }
        });
    });
    </script>


</body>

</html>
