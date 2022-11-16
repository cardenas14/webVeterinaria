<?php

include_once '../conexion/Conexion.php';

class ControlModel
{

    function LoginAdmin($user, $pass)
    {
        $obj = new Conexion();
        $sql = "select idempleado , nombres , apellidos , usuario"
            . "  from login_empleado where idrol = 1 and usuario= '$user' and contrasennia = '$pass'  ";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));

        $vec = array();
        if (mysqli_num_rows($res) > 0) {
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function LoginCliente($user, $pass)
    {
        $obj = new Conexion();
        // $sql = "select * from login_empleado where idrol = 12 "; // Cambiar query para el logeo del cliente
        $sql = "select dni, nombres , apellidos , Correo"
            . "  from login_cliente where idrol = 2 and DNI= '$user' and contrasennia = '$pass'  ";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));

        $vec = array();
        if (mysqli_num_rows($res) > 0) {
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function CrearCuenta($dni, $nombres, $apellidos, $edad, $sexo, $contrasennia, $correo, $idRol) {
        $cn = new Conexion();
        $sql = " insert into login_cliente(dni,nombres,apellidos,edad,sexo,contrasennia,correo,idRol) "
                . "values('$dni' , '$nombres' , '$apellidos', $edad , '$sexo', '$contrasennia' , '$correo' , $idRol) ";
        return mysqli_query($cn->conecta(), $sql) or die(mysqli_error($cn->conecta()));
    }

    function ExitenciaDNI($dni) {
        $obj = new Conexion();
        $sql = "select count(*) as cantidad from login_cliente where dni='$dni' ";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $data = mysqli_fetch_assoc($res);
        return $data['cantidad'];
    }
    
       function ExitenciaCorreo($correo) {
        $obj = new Conexion();
        $sql = "select count(*) as cantidad from login_cliente where correo='$correo' ";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $data = mysqli_fetch_assoc($res);
        return $data['cantidad'];
    }




}

?>