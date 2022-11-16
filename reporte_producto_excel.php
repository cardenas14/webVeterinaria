<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= productos.xls");
?>
<table id="datatablesSimple">
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th>Stock</th>
    </tr>

    <!--VER LOS PRODUCTOS LISTAR  /PONER VISTA-->
    <?php
    require_once("conexion.php");

    $sql = "SELECT p.IdProducto, c.Nombre AS Categoria, p.Nombre, p.Precio_Venta, p.stock FROM producto p 
        INNER JOIN categoria c ON c.IdCategoria = p.IdCategoria";


    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $fila['0'] ?></td>
            <td><?php echo $fila['1'] ?></td>
            <td><?php echo $fila['2'] ?></td>
            <td><?php echo $fila['3'] ?></td>
            <td><?php echo $fila['4'] ?></td>
        </tr>

    <?php } ?>

</table>