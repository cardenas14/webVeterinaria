<?php

    include("conexion.php");

    $idcategoria = $_GET["id"];

    $sql = "DELETE FROM categoria where IdCategoria='$idcategoria'";

    $resultado = $conexion->query($sql);

    if($resultado){

      echo "1 row delete";
    }else{

      echo mysqli_error($conexion);
    }
?>