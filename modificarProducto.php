<?php

    include("conexion.php");

    $idproducto = $_POST["txtid"];
    $Nombre = $_POST["txtNombre"];
    $Categoria= $_POST["txtCategoria"];
    $Precio= $_POST["txtPrecio"];
    $stock= $_POST["txtStock"];
    $Imagen = addslashes(file_get_contents($_FILES['txtmImagen']['tmp_name']));
  

    $sql = "update producto SET  Nombre='$Nombre',IdCategoria='$Categoria', Precio_Venta= '$Precio', stock='$stock', Imagen='$Imagen'  where IdProducto='$idproducto' ";
 
    $resultado = $conexion->query($sql);
    if($resultado){
      header("Location:productos.php");
      //echo"1 row modify";
    }else{
      echo mysqli_error($conexion);
    }
?>