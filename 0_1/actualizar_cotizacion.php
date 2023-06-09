<?php
include("conexion.php");
?>
<?php
$id = $_POST['id'];
$cliente = $_POST['cliente'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$total = $precio * $cantidad;

$query = "UPDATE cotizaciones SET cliente = '$cliente', producto = '$producto', precio = $precio, cantidad = $cantidad, total = $total WHERE id = $id";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo "Cotización actualizada correctamente.";
} else {
    echo "Error al actualizar cotización: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
