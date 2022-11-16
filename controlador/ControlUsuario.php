<?php

include_once '../modelo/ControlModel.php';

session_start();
$accion = $_REQUEST["accion"];


$obj = new ControlModel();

if ($accion === "IniciarSesion") {
    $user = $_POST["usuario"];
    $pass = $_POST["pass"];
    $rol = $_POST["rol"];

    if ($rol === "admin") {

        $data = $obj->LoginAdmin($user, $pass);

        if (count($data) > 0) {
            $_SESSION["usuario"] = $data;
            header("location: ../PagAdmin.php");
        } else {
            header("location: ../PagLogin.php");
        }
    } else if ($rol === "cliente") {
        $data = $obj->LoginCliente($user, $pass);

        if (count($data) > 0) {
            $_SESSION["usuario"] = $data;
            header("location: ../Paciente/PaginaPaciente.php");
        } else {
            header("location: ../PagLogin.php");
        }
    } else {
        header("location: ../PagLogin.php");
    }
} else if ($accion === "CerrarSesion") {
    session_destroy();
    header("location: ../PagLogin.php");
} else if ($accion == "CrearCuenta") {
    $dni = $_POST["dni"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];
    $idRol = 2; // ROL CLIENTE

    if ($obj->ExitenciaDNI($dni) > 0) {
        $_SESSION["mensaje"] = "El nro de dni " . $dni . " ya se encuentra en uso.";
    } else {
        if ($obj->ExitenciaCorreo($correo) > 0) {
            $_SESSION["mensaje"] = "El correo electronico " . $correo . " ya se encuentra en uso.";
        } else {
            $res = $obj->CrearCuenta($dni, $nombres, $apellidos, $edad, $sexo, $pass, $correo, $idRol);
            if ($res) {
                $_SESSION["mensaje"] = "Cuenta creada correctamente";
            } else {
                $_SESSION["mensaje"] = "La cuenta no se ha podido crear.";
            }
        }
    }


    header("location: ../PagNuevaCuenta.php");
}
?>