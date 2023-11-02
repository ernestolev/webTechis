<?php 
include '../../Conexion/conexion.php';
$sql = "SELECT id, nombre, apellidos, correo, distrito, rol FROM usuarios";
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
                    <h2>Administrar Usuarios.</h2>
                </div>
            </header>
            <main class="main-content">
            <div class="row">
                    <!-- Columna 1 -->
                    <div class="cole">
                        <div class="section_pedidos">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">DISTRITO</th>
                            <th scope="col">ROL</th>
                            <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr class="">';
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["apellidos"] . "</td>";
                                echo "<td>" . $row["correo"] . "</td>";
                                echo "<td>" . $row["distrito"] . "</td>";
                                echo "<td>" . $row["rol"] . "</td>";
                                echo '<td>
                                    <button class="btn btn-secondary" data-id="' . $row['id'] . '">Hacer admin</button>
                                    <button class="btn btn-danger" data-id="'. $row['id'].'">Eliminar</button>
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
                </div>
            </main>
        </div>
    </div>

    <script>
$(document).ready(function() {
    $(".btn-secondary").click(function() {
        var userId = $(this).data("id");
        
        $.ajax({
            type: "POST",
            url: "../../PHP/actualizar_rol.php",
            data: { id: userId, rol: "admin" },
            success: function(response) {
                if (response === "success") {
                    location.reload();
                } else {
                    console.log("Error al actualizar el rol:", response);
                    alert("Error al actualizar el rol.");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX:", errorThrown);
                alert("Error en la solicitud AJAX.");
            }
        });
    });

    $(".btn-danger").click(function() {
        var userId = $(this).data("id");
        
        if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
            $.ajax({
                type: "POST",
                url: "../../PHP/eliminarusuario.php", // Cambia la ruta al archivo que maneja la eliminación de usuarios
                data: { id: userId },
                success: function(response) {
                    if (response === "success") {
                        location.reload();
                    } else {
                        console.log("Error al eliminar el usuario:", response);
                        location.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Error en la solicitud AJAX:", errorThrown);
                    alert("Error en la solicitud AJAX.");
                }
            });
        }
    });

});
</script>



</body>

</html>
