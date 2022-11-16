<?php

$conexion = new mysqli("localhost:3307", "root", "", "bdveterinaria") or die("not connected".mysqli_connect_error());

if($conexion){
   
}else{
    echo "Error";
}

?>