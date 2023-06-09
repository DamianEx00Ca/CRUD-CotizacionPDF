<?php
// Función para Generar y descargar el PDF
function GenerarPDF() {
    require_once('TCPDF-main/tcpdf.php');

    // Crear instancia de TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Agregar contenido al PDF
    $pdf->SetMargins(15, 15, 15);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // Conexión a la base de datos
    include("conexion.php");

    // Obtener los datos de la tabla de cotizaciones
    $query = "SELECT * FROM cotizaciones";
    $result = mysqli_query($conexion, $query);

    $html = '<table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['cliente'] . '</td>';
        $html .= '<td>' . $row['producto'] . '</td>';
        $html .= '<td>' . $row['precio'] . '</td>';
        $html .= '<td>' . $row['cantidad'] . '</td>';
        $html .= '<td>' . $row['total'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('cotizaciones.pdf', 'D');
}

include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
    .Generar-pdf-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
    }
</style>

    <title>CRUD de Cotizaciones</title>
</head>
<body>
    <h1>Lista de cotizaciones</h1>

    <?php
    $query = "SELECT SUM(total) AS total_sum FROM cotizaciones";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    $totalSum = $row['total_sum'];
    $iva = $totalSum * 0.16; // Cálculo del IVA (16%)
    ?>

    <label>Valor Total:</label>
    <input type="text" value="<?php echo $totalSum; ?>" readonly>

    <br>
    <label>IVA (16%):</label>
    <input type="text" value="<?php echo $iva; ?>" readonly>

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

    
    <button onclick="imprimirPagina();">Imprimir Pagina</button>
        <script>
          function imprimirPagina() {
            window.print();
          }
        </script>
</body>
</html>
