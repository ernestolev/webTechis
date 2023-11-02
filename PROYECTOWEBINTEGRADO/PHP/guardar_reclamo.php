<?php
include '../Conexion/conexion.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: FORMS-LOGIN-REGISTRO/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $U_id = $_SESSION['user'];    
    $domicilio = $_POST["domicilio"];
    $tipo_bien = $_POST["tipo_bien"];
    $motivo_reclamo = $_POST["motivo_reclamo"];
    $detalles = $_POST["detalles"];
    $tipo_registro = $_POST["tipo_registro"];

    $sql = "INSERT INTO libror (U_id, R_domicilio, R_bien, R_motivo, R_detalles, R_tipo) 
            VALUES ('$U_id', '$domicilio', '$tipo_bien', '$motivo_reclamo', '$detalles', '$tipo_registro')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Reclamo registrado con éxito");';
        echo 'window.location.href = "../HTML/libroreclamaciones.php";';
        echo '</script>';
    } else {
        echo "Error al registrar el reclamo: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
