<?php

    include("conexion.php");

    $idcategoria = $_POST["txtid"];
    $Nombre = $_POST["txtNombre"];

    $sql = "update categoria SET  Nombre='$Nombre' where IdCategoria='$idcategoria' ";

    $resultado = $conexion->query($sql);
    if($resultado){
      //header("Location:producto.php");
      echo"1 row modify";
    }else{
      echo mysqli_error($conexion);
    }
?>