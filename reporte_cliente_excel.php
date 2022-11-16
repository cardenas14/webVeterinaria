<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= clientes.xls");
?>
<table id="datatablesSimple">
    <tr>
        <th>Codigo</th>
        <th>DNI Cliente</th>
        <th>Especialidad</th>
        <th>Nombre Empleado</th>
        <th>Precio</th>
        <th>Fecha Atencion</th>
        <th><?php echo utf8_decode('Descripción') ?></th>
    </tr>

    <!--VER LOS CLIENTES LISTAR  /PONER VISTA-->
    <?php
    require_once("conexion.php");

    $sql = "SELECT h.IdHistorial,h.DNI, e.Nombre,l.Nombres,h.Precio,h.FechaAtencion,h.Descripcion FROM historial_cliente h INNER JOIN especialidad e ON e.IdEspecialidad = h.IdEspecilidad INNER JOIN login_empleado l ON l.IdEmpleado = h.IdEmpleado";


    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $fila['0'] ?></td>
            <td><?php echo $fila['1'] ?></td>
            <td><?php echo $fila['2'] ?></td>
            <td><?php echo $fila['3'] ?></td>
            <td><?php echo $fila['4'] ?></td>
            <td><?php echo $fila['5'] ?></td>
            <td><?php echo utf8_decode($fila['6']) ?></td>
        </tr>

    <?php } ?>

</table>