
<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include '../Conexion/conexion.php';
    

    // Recupera los valores del formulario
    $P_nom = $_POST["P_nom"];
    $P_desc = $_POST["P_desc"];
    $P_precio = $_POST["P_precio"];
    $P_tipo = $_POST["P_tipo"];
    $P_stock = $_POST["P_stock"];

    // Procesa la imagen
    $imagen_nombre = $_FILES["P_imagen"]["name"];
    $imagen_temp = $_FILES["P_imagen"]["tmp_name"];
    $imagen_guardada = "../imagenes/" . $imagen_nombre;

    move_uploaded_file($imagen_temp, $imagen_guardada);

    // Consulta SQL para insertar datos en la tabla
    $sql = "INSERT INTO productos (P_nom, P_desc, P_precio, P_tipo, P_stock, P_imagen) 
            VALUES ('$P_nom', '$P_desc', '$P_precio', '$P_tipo', '$P_stock', '$imagen_guardada')";

    // Ejecuta la consulta  
    if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Producto insertado con éxito.");</script>';
 
    } else {
        echo "Error al insertar el producto: " . mysqli_error($conexion);
    }
    // Cierra la conexión a la base de datos
}
?>
