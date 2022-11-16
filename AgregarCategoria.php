<?php

    include("conexion.php");

    $Nombre = $_POST["txtNombre"];

    $sql = "insert into categoria ( Nombre) values('$Nombre')";

    $resultado = $conexion->query($sql);
    if($resultado){
      echo"1 row inserted";
    }else{
      echo mysqli_error($conexion);
    }
?>