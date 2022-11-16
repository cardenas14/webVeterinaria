<?php
$conexion = mysqli_connect('localhost', 'root', '', 'bdveterinaria');
//variables 
session_start();

if (!isset($_SESSION['usuario'])) { //si la variable no existe
    header('location: ../PagLogin.php');
}


$dni = $_SESSION["usuario"]["dni"];

$sqlHistorial = "Select hc.IdHistorial, lc.Nombres as cliente, le.Nombres as empleado, es.Nombre as especialidad , hc.FechaAtencion, hc.Descripcion from historial_cliente hc
                  inner join login_cliente lc on hc.DNI=lc.DNI
                  inner join login_empleado le on hc.IdEmpleado=le.IdEmpleado
                  inner join especialidad es on hc.IdEspecilidad=es.IdEspecialidad
where lc.DNI=" . $dni;


$resultadoHP = mysqli_query($conexion, $sqlHistorial) or die(mysqli_error());


$sqlCitas = "SELECT rc.*, le.Nombres as empleado, es.Nombre as especialidad, le.IdEmpleado as codigoDoctor FROM reserva_cita rc 
                             inner join login_cliente lc on rc.DNI=lc.DNI
                            inner join login_empleado le on rc.IdEmpleado=le.IdEmpleado
                            inner join especialidad es on rc.IdEspecialidad=es.IdEspecialidad  where rc.DNI=" . $dni;
$resultadoCR = mysqli_query($conexion, $sqlCitas) or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paciente</title>
    <link rel="stylesheet" type="text/css" href="../Paciente/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../Paciente/CSS/style_2.css">
</head>
<body>
    
<header>
    <div class="header">
        <h1>Bienvenido</h1>
        <div class="optionsBar">
            <p id="mes" class="mes"></p>
            <span>|</span>
            <span class="user"> <?php echo $_SESSION["usuario"]["nombres"]; ?> </span>
            <a href="../controlador/ControlUsuario.php?accion=CerrarSesion"><img class="close" src="../img/salir.png" alt="Salir del sistema" title="Salir"></a>
          
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="PaginaPaciente.php">Inicio</a></li>
            <li><a href="cita_paciente.php">Nueva Cita</a></li>
            <li><a href="./Venta/index.php">CARRITO</a></li>
        </ul>
    </nav>

</header>

<div class="iconochat">
    <div class="iconochat-1">
        <a href="javascript:abrirchat()"> <img class="iconochat-2" src="img/chat-regular-24.png"> </a>
    </div>

</div>


<section id="container">
    <h1>Bienvenido al sistema</h1>
</section>

<div class="tamaño">
    <h2>Historial</h2>
    <table width='800' border='0'>
        <thead>
        <tr>
            <th>ID Historial</th>
            <th>Cliente</th>
            <th>Empleado</th>
            <th>Especialidad</th>
            <th>Fecha Atencion</th>
            <th>Descripcion</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($fila = mysqli_fetch_array($resultadoHP)) {
            echo "<tr>
                <td >" . $fila['IdHistorial'] . "</td>
                <td >" . $fila['cliente'] . "</td>
                <td >" . $fila['empleado'] . "</td>
                <td >" . $fila['especialidad'] . "</td>
                <td >" . $fila['FechaAtencion'] . "</td>
                <td >" . $fila['Descripcion'] . "</td> 
            </tr>";
        }
        ?>
        </tbody>
    </table>


</div>
<H2>Exportacion del historial</H2>
<a href="../Paciente/excel.php"><img width="100px" src="../img/iconoExcel.jpeg" alt="Exportar excel" title="Exportar excel"></a>
<a target="_blank" href="../Paciente/pdf.php"><img width="60px" src="../img/iconopdf.jpeg" alt="excel" title="Exportar PDF"></a>


<section id="container">
    <h1>Pendiente</h1>
</section>



<div class="tamaño">
    <h2>Citas</h2>

    <table width='800' border='0'>
        <thead>
        <tr>
            <th>Turno</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Especialidad</th>
            <th>CodDoctor</th>
            <th>Nombre del Doctor</th>
            <th>Consulta</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($filaCitas = mysqli_fetch_array($resultadoCR)) {
            echo "<tr> 
                    <td >" . $filaCitas['Turno'] . "</td>
                    <td >" . $filaCitas['Fecha'] . "</td>
                    <td >" . $filaCitas['Hora'] . "</td>
                    <td >" . $filaCitas['especialidad'] . "</td>
                    <td >" . $filaCitas['codigoDoctor'] . "</td> 
                    <td >" . $filaCitas['empleado'] . "</td> 
                    <td >" . $filaCitas['Consulta'] . "</td>
                </tr>";
        }
        ?>
        </tbody>
    </table
    
</div>





<footer>
    <h4>Reservado 2021</h4>
</footer>


<script src="app.js"></script>

</body>
</html>