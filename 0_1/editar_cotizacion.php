<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar cotización</title>
</head>
<body>
    <h1>Editar cotización</h1>
    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM cotizaciones WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="actualizar_cotizacion.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Cliente:</label>
        <input type="text" name="cliente" value="<?php echo $row['cliente']; ?>" required>
        <br><br>
        <label>Producto:</label>
        <input type="text" name="producto" value="<?php echo $row['producto']; ?>" required>
        <br><br>
        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?php echo $row['precio']; ?>" required>
        <br><br>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>" required>
        <br><br>
        <button type="submit">Actualizar cotización</button>
    </form>
</body>
</html>
