<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear cotización</title>
</head>
<body>
    <h1>Crear cotización</h1>
    <form action="guardar_cotizacion.php" method="POST">
        <label>Cliente:</label>
        <input type="text" name="cliente" required>
        <br><br>
        <label>Producto:</label>
        <input type="text" name="producto" required>
        <br><br>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <br><br>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" required>
        <br><br>
        <button type="submit">Guardar cotización</button>
    </form>
</body>
</html>
