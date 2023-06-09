<?php
include("conexion.php");
?>
<?php
$id = $_GET['id'];
$query = "DELETE FROM cotizaciones WHERE id = $id";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo "Cotización eliminada correctamente.";
} else {
    echo "Error al eliminar cotización: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
<br>
<button onclick="window.location.href='index.php'">Regresar a la lista de cotizaciones</button>
