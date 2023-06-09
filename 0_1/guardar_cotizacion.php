<?php
include("conexion.php");
?>
<?php
$cliente = $_POST['cliente'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$total = $precio * $cantidad;

$query = "INSERT INTO cotizaciones (cliente, producto, precio, cantidad, total) VALUES ('$cliente', '$producto', $precio, $cantidad, $total)";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo "Cotización guardada correctamente.";
} else {
    echo "Error al guardar la cotización: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
<br>
<button onclick="window.location.href='index.php'">Regresar a la lista de cotizaciones</button>
