<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
        <form class="formulario" id="frmIniciarSesion" method="post"action="controlador/ControlUsuario.php">

            <br>
            <center>
                <img src="img/images3.jpg" width="300" height="100">
            </center>
            <div class="contenedor">
                <div style="margin-bottom: 14px;">
                </div>

                <div id="alertaMensj">
                </div>
                <div class="input-contenedor">
                    <select class="form-control" name="rol" id="rol">
                        <option value="cliente">Cliente</option>
                        <option value="admin">Admnistrador</option>
                    </select>
                </div>

                <div class="input-contenedor">
                    <i class="fas fa-envelope icon"></i>
                    <input type="text" placeholder="Usuario" id="usuario" name="usuario">
                </div>
                <div class="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contraseña" id="pass" name="pass">
                </div>
                <input type="hidden" name="accion" value="IniciarSesion">
                <button type="submit" class="button" id="BtnIniciarSesion">Iniciar Sesion</button>
                <a href="PagNuevaCuenta.php" title="Crear nueva cuenta">Crear Cuenta</a>
            </div>
        </form>
    </body>
</html>
