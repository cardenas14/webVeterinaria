<html>
    <head>
        <meta charset="UTF-8">
        <title>Nueva Cuenta</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="campañas.css">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://kit.fontawesome.com/7f35cadcb9.js" crossorigin="anonymous"></script>
        <link href="css/estilosLogin.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
    </head>

    <body background='img/images2.jpg'>
        <div class="container mt-3"> <a href="index.html" title="Regresar al incio" class="btn btn-primary"><i class="fa fa-arrow-left" style="width: 60px;height: 20;"></i></a></div>
        <form class="formulario"  method="post"action="controlador/ControlUsuario.php">
            <br>
            <center>
                <img src="img/images3.jpg" width="300" height="100">
            </center>
            <div class="contenedor">
                <div style="margin-bottom: 14px;">
                </div>
                <?php
                session_start();
                if (isset($_SESSION["mensaje"])) {
                    $mensaje = $_SESSION["mensaje"];
                     $_SESSION["mensaje"] = null;
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?= $mensaje ?>
                    </div>
                    <?php
                }
                ?>


                <label>DNI</label>
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Documento Identidad"  name="dni">
                </div>

                <label>Nombres</label>
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Nombres Completos" name="nombres">
                </div>

                <label>Apellidos</label>
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Apellidos Completos" name="apellidos">
                </div>

                <label>Edad</label>
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Edad" name="edad">
                </div>

                <label>Sexo</label>
                <div class="input-contenedor">
                    <select class="form-control" name="sexo" >
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <label>Correo</label>
                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Correo Electronico"name="correo">
                </div>
                <label>Contraseña</label>
                <div class="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contraseña" id="pass" name="pass">
                </div>
                <input type="hidden" name="accion" value="CrearCuenta">
                <button type="submit" class="button" id="BtnIniciarSesion">Crear Cuenta</button>
                <p>¿Ya cuentas con una cuenta?  <a href="PagLogin.php" title="Crear nueva cuenta">Iniciar Sesión</a></p>

            </div>
        </form>
    </body>
</html>
