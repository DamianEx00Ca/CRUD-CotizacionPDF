<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de cotizaciones</title>
</head>
<body>
    <h1>Lista de cotizaciones</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM cotizaciones";
            $result = mysqli_query($conexion, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['cliente'] . "</td>";
                echo "<td>" . $row['producto'] . "</td>";
                echo "<td>" . $row['precio'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>";
                echo "<a href='editar_cotizacion.php?id=" . $row['id'] . "'>Editar</a>";
                echo " | ";
                echo "<a href='eliminar_cotizacion.php?id=" . $row['id'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="crear_cotizacion.php">Agregar cotización</a>
</body>
</html>
