<?php

    include("conexion.php");

    $Nombre = $_POST["txtNombre"];
    $Categoria=$_POST["txtCategoria"];
    $Precio=$_POST["txtPrecio"];
    $stock=$_POST["txtStock"];
    $Imagen = addslashes(file_get_contents($_FILES["txtImagen"]["tmp_name"]));

    $sql = "insert into producto (IdCategoria, Nombre, Precio_Venta, stock, Imagen) values('$Categoria','$Nombre','$Precio','$stock','$Imagen')";

    $resultado = $conexion->query($sql);
    if($resultado){
      header("Location:productos.php");

      //echo"1 row inserted";
    }else{
      echo mysqli_error($conexion);
    }
?>