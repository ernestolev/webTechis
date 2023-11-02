<?php
include '../../Conexion/conexion.php';

session_start();
if (isset($_SESSION['nombre_usuario'])) {
    $nombreUsuario = $_SESSION['nombre_usuario'];
} else {
    header("Location: ../FORMS-LOGIN-REGISTRO/login.php");
}

$sqlStockTortas = "SELECT SUM(P_stock) AS totalStock FROM productos WHERE P_tipo = 'torta'";
$resultStockTortas = $conn->query($sqlStockTortas);

if ($resultStockTortas && $resultStockTortas->num_rows > 0) {
    $rowStockTortas = $resultStockTortas->fetch_assoc();
    $stockTortas = $rowStockTortas['totalStock'];
} else {
    $stockTortas = 0; // Puedes establecer un valor predeterminado en caso de que no haya resultados
}

$sqlStockPorciones = "SELECT SUM(P_stock) AS totalStockP FROM productos WHERE P_tipo = 'porcion'";
$resultStockPorciones = $conn->query($sqlStockPorciones);

if ($resultStockPorciones && $resultStockPorciones->num_rows > 0) {
    $rowStockP = $resultStockPorciones->fetch_assoc();
    $stockPorciones = $rowStockP['totalStockP'];
} else {
    // Si no hay resultados, establece un valor predeterminado
    $stockPorciones = 0;
}

$sqlStockBebidas = "SELECT SUM(P_stock) AS totalStockB FROM productos WHERE P_tipo = 'bebida'";
$resultStockBebidas = $conn->query($sqlStockBebidas);

if ($resultStockBebidas && $resultStockBebidas->num_rows > 0) {
    $rowStockB = $resultStockBebidas->fetch_assoc();
    $stockBebidas = $rowStockB['totalStockB'];
} else {
    // Si no hay resultados, establece un valor predeterminado
    $stockBebidas = 0;
}



$sqlProductos = "SELECT COUNT(*) as total_productos FROM productos";
$resultProductos = $conn->query($sqlProductos);

$sqlUsuarios = "SELECT COUNT(*) as total_usuarios FROM usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);


$sqlReclamos = "SELECT COUNT(*) as total_reclamos FROM libror";
$resultReclamos = $conn->query($sqlReclamos);

$sqlPedidosRealizados = "SELECT COUNT(*) as total_pedidos_realizados FROM pedidos WHERE estado = 'Realizado'";
$sqlPedidosPendientes = "SELECT COUNT(*) as total_pedidos_pendientes FROM pedidos WHERE estado = 'Pendiente'";




$resultStockBebidas = $conn->query($sqlStockBebidas);
$rowStockBebidas = $resultStockBebidas->fetch_assoc();



$rowUsuarios = $resultUsuarios->fetch_assoc();
$totalUsuarios = $rowUsuarios['total_usuarios'];

$rowReclamos = $resultReclamos->fetch_assoc();
$totalReclamos = $rowReclamos['total_reclamos'];

$resultPedidosRealizados = $conn->query($sqlPedidosRealizados);
$resultPedidosPendientes = $conn->query($sqlPedidosPendientes);

if ($resultStockTortas && $resultStockPorciones && $resultStockBebidas && $resultProductos && $resultUsuarios && $resultReclamos && $resultPedidosRealizados && $resultPedidosPendientes) {
    $rowStockTortas = $resultStockTortas->fetch_assoc();
    $rowStockPorciones = $resultStockPorciones->fetch_assoc();
    $rowStockBebidas = $resultStockBebidas->fetch_assoc();
    $rowProductos = $resultProductos->fetch_assoc();
    $rowUsuarios = $resultUsuarios->fetch_assoc();
    $rowReclamos = $resultReclamos->fetch_assoc();
    $rowPedidosRealizados = $resultPedidosRealizados->fetch_assoc();
    $rowPedidosPendientes = $resultPedidosPendientes->fetch_assoc();
} else {
    // Maneja errores aquí si alguna de las consultas falla.
}

?>
