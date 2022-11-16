<?php

    include("conexion.php");

    $Nombre = $_POST["txtNombre"];
    $Apellidos = $_POST["txtApellidos"];
    $Dni = $_POST["txtDni"];
    $Correo=$_POST["txtCorreo"];
    $Especialidad=$_POST["txtEspecialidad"];

    $Usuario = $_POST["txtUsuario"];
    $contrasennia = $_POST["txtcontrasennia"];
    $Sexo = $_POST["txtSexo"];
    $Rol = $_POST["txtRol"];


    $stmt = $conexion->prepare("insert into login_empleado(DniEmpleado, Nombres, Apellidos, Usuario, contrasennia, Correo, Sexo, IdEspecialidad, IdRol) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssss',$Dni,$Nombre,$Apellidos,$Usuario,$contrasennia,$Correo,$Sexo,$Especialidad,$Rol);
    
    $stmt->execute();

?>