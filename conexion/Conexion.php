<?php

class Conexion {

    private $cn;

    function conecta() {
        if ($this->cn == null) {
            $this->cn = mysqli_connect("localhost:3307", "root","", "bdveterinaria");
        }
        return $this->cn;
    }
}

?>