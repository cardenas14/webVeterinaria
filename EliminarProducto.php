<?php

    include("conexion.php");

    $IdProducto = $_GET["id"];

    $sql = "DELETE FROM producto where IdProducto='$IdProducto'";
 
    $resultado = $conexion->query($sql);

    if($resultado){
      header("Location:productos.php");
      //echo "1 row delete";
    }else{
      echo mysqli_error($conexion);
    }
?>