
<?php
$conexion = mysqli_connect('localhost','root','','bdveterinaria');
session_start();

$varDniPaciente=$_SESSION["usuario"]["dni"];
$extencion=".xls";

$sqlHistorial= "Select hc.IdHistorial, lc.Nombres as cliente, le.Nombres as empleado, es.Nombre as especialidad, hc.FechaAtencion, hc.Descripcion from historial_cliente hc
inner join login_cliente lc on hc.DNI=lc.DNI
inner join login_empleado le on hc.IdEmpleado=le.IdEmpleado
inner join especialidad es on hc.IdEspecilidad=es.IdEspecialidad
where lc.DNI=" . $varDniPaciente;

header('Content-Type: application/xls');
header('Content-Disposition:attachment; filename='."$varDniPaciente.$extencion");

$resultadoHP=mysqli_query($conexion,$sqlHistorial) or die(mysqli_error());
$fila=mysqli_fetch_array($resultadoHP);

           echo "<table border='1'>
           <tr >
            <th >ID Historial</th>
            <th >Cliente</th>
            <th >Empleado</th>
            <th >Especialidad</th>
            <th >Fecha Atencion</th>
            <th >Descripcion</th>
            </tr>
           ";
           do{
               echo"<tr> 
                    <td >".$fila['IdHistorial']."</td>
                    <td >".$fila['cliente']. "</td>
                    <td >".$fila['empleado']."</td>
                    <td >".$fila['especialidad']."</td>
                    <td >".$fila['FechaAtencion']."</td>
                    <td >".$fila['Descripcion']."</td> 
                </tr>\n";
           }while($fila=mysqli_fetch_array($resultadoHP));
           echo"</table> \n";
           ?>