<?php

$conexion = mysqli_connect('localhost','root','','bdveterinaria');
//variables 
session_start();

if (!isset($_SESSION['usuario'])){ //si la variable no existe
    header('location: ../PagLogin.php');
}

$dni=$_SESSION["usuario"]["dni"];

$sql="Select* from login_cliente where DNI=" . $dni;

$resultado=mysqli_query($conexion,$sql) or die(mysqli_error());
$row=mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Paciente</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_3.css">
	<link rel="stylesheet" type="text/css" href="css/style_2.css">
  
    <title>Registro de Citas</title>
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
            <li><a href="Venta/index.php">CARRITO</a> </li>
            
		</ul>
    </nav>
	   
	</header >

	<section id="container">
		<h1 >Registro de cita</h1>

	<div  class="Registro_cita">
		<h3>Reserve su cita</h3>
		<hr>
    	<div class="alert"></div>
        
		<form action="citaGuardar.php" method="post">
                <label>Turno</label>
                <input type="text" id="Turno" name="Turno" placeholder="Ingrese Turno">
                <label>Fecha</label>
                <input type="date" id="Fecha" name="Fecha" placeholder="Fecha">
                <label>Hora</label>
                <input type="time" id="hora" name="hora" placeholder="hora">
               
                <label>Doctor</label>
                <div>      
                             <select class="inputss" name="Doctor">
                                <option>-Seleccione-</option>
                                <option value="1">Maximo</option>
                                <option value="2">Jenny</option>
                                
                              </select>
               </div>

                <label>Especialidad</label>
                <div>      
                            <select class="inputss" name="Especialidad">
                                <option>-Seleccione-</option>
                                <option value="1">Medicina</option>
                                <option  value="2">Consulta</option>
                                
                            </select>
               </div>
               <label>Consulta</label>

               <textarea name="Consulta"   placeholder="Consulta"></textarea>
               <input type="submit" value="Enviar Cita">
        </form>
	</div>

   </section>
</body>
</html>

