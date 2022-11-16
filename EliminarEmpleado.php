<?php

include("conexion.php");

$id = $_GET["id"];

$stmt = $conexion->prepare("Delete from login_empleado where IdEmpleado=? ");
$stmt->bind_param('s',$id);

$stmt->execute();


?>