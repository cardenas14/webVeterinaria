<?php

include("conexion.php");

$id = $_POST["txtid"];
$nombre = $_POST["txtNombre"];
$apellidos = $_POST["txtApellidos"];
$dni = $_POST["txtDni"];
$correo=$_POST["txtCorreo"];
$especialidad=$_POST["txtEspecialidad"];


$stmt = $conexion->prepare("UPDATE login_empleado SET DniEmpleado=?, Nombres=?, Apellidos=?, Correo=?, IdEspecialidad=? where IdEmpleado=? ");
$stmt->bind_param('ssssss',$dni,$nombre,$apellidos,$correo,$especialidad,$id);

$stmt->execute();

?>