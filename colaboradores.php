<?php include 'sesion.php'?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">ANIMAL CENTER</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['usuario']['nombres'] ?> <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../TallerWeb-avance2/controlador/ControlUsuario.php?accion=CerrarSesion">Salir</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">PRINCIPAL</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <!-- Item -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="categoria.php">Categoria</a>
                                    <a class="nav-link" href="productos.php">Productos</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reportes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="reporte_productos.php">Productos mas vendidos</a>
                                    <a class="nav-link" href="reporte_clientes.php">Clientes mas frecuentes</a>
                                </nav>
                            </div>
                            <!-- Fin Item -->
                            <!-- Titulo -->
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <!-- Titulo -->
                            <a class="nav-link" href="colaboradores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                               Empleados
                            </a>

                            <a class="nav-link" href="contacto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Contacto
                            </a>

                        </div>
                    </div>
                   
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registro de Empleados</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Empleados</li>
                        </ol>

                <div>
                    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ModalProductoReg">
                        Registrar Empleado
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ModalProductoReg" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <!--llama al PHP me diante la action  POst .para que no sea visible  el get si es visible -->
                            <form action="AgregarEmpleado.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtNombre" id="ProductoFl"
                                               placeholder="">
                                        <label for="EmpleadoFl">Nombre Empleado</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtApellidos" id="ApellidosFl"
                                               placeholder="">
                                        <label for="ApellidosFl">Apellidos</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtDni" id="DniFl"
                                               placeholder="">
                                        <label for="DniFl">DNI</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtUsuario" id="UsuarioFl"
                                               placeholder="">
                                        <label for="UsuarioFl">Usuario</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtcontrasennia" id="contrasenniaFl"
                                               placeholder="">
                                        <label for="contrasenniaFl">contraseña</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtCorreo" id="CorreoFl"
                                               placeholder="">
                                        <label for="CorreoFl">Correo</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="txtSexo" id="SexoFl"
                                               placeholder="">
                                        <label for="SexoFl">Sexo</label>
                                    </div>

                            
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="txtEspecialidad"
                                                aria-label="Floating label select example">
                                            <option selected>-Especialidad-</option>
                                            <option value="1">Medicina</option>
                                            <option value="2">Consulta</option>
                                            <option value="3">Esp3</option>
                                        </select>
                                        <label for="floatingSelect">Seleccione Especialidad</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="txtRol"
                                                aria-label="Floating label select example">
                                            <option selected>-Rol-</option>
                                            <option value="1">Admin</option>  
                                        </select>
                                        <label for="floatingSelect">Seleccione Rol</label>
                                    </div>

                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <input type="submit" class="btn btn-primary" value="Agregar">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                    
                        <!-- Tabla -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registro Colaboradores
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>DNI</th>
                                            <th>Correo</th>
                                            <th>Especialidad</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>DNI</th>
                                            <th>Correo</th>
                                            <th>Especialidad</th>
                                            
                                            </tr>
                                    </tfoot>
                                    <tbody>

                            <!--VER LOS PRODUCTOS LISTAR  /PONER VISTA-->
                            <?php
                            require_once("conexion.php");

                            $sql = "select l.*,e.Nombre as especialidad from login_empleado l 
                            inner join especialidad e on l.IdEspecialidad = e.IdEspecialidad
                            inner join roles r on l.IdRol= r.IdRol";


                            $resultado = $conexion->query($sql);
                            while ($row = $resultado->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td><?= $row['IdEmpleado']; ?></td>
                                   <td><?= $row['Nombres']; ?></td>
                                    <td><?= $row['Apellidos']; ?></td>
                                    <td><?= $row['DniEmpleado']; ?></td>
                                    <td><?= $row['Correo']; ?></td>
                                    <td><?= $row['especialidad']; ?></td>

                                    <td><!-- boton MODIFICAR - ELIMINAR -->
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalEmpleadoEdit<?= $row['IdEmpleado']; ?>"><i
                                                    class="far fa-edit"></i></button>
                                        <a href="EliminarEmpleado.php?id=<?= $row['IdEmpleado']; ?>"
                                           class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>

                                </tr>

                                
                                <!-- Modal  MODIFICAR -->
                                <div class="modal fade" id="ModalEmpleadoEdit<?= $row['IdEmpleado']; ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar
                                                    Producto <?= $row['Nombres']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <!--Llama al metodo Modificar.php  -->
                                            <form action="modificarEmpleado.php" method="post"
                                                  enctype="multipart/form-data">
                                                  
                                                <div class="modal-body">

                                                    <input type="text" name="txtid" value="<?= $row['IdEmpleado']; ?>"
                                                           id="EmpleadoFl" placeholder="">

                                                    <div class="form-floating mb-3">
                                                        <!--se le pone txtNombre para que capture-->
                                                        <input type="text" class="form-control" name="txtNombre"
                                                               value="<?= $row['Nombres']; ?>" id="IdFl" placeholder="">
                                                        <label for="EmpleadoFl">Nombre Producto</label>
                                                    </div>
                                            
                                                   
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="txtApellidos"
                                                                   value="<?= $row['Apellidos']; ?>" id="ApellidosFl"
                                                                   placeholder="">
                                                            <label for="ApellidosFl">Apellidos</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="txtDni"
                                                                   value="<?= $row['DniEmpleado']; ?>" id="DniFl"
                                                                   placeholder="">
                                                            <label for="DniFl">DniEmpleado</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="txtCorreo"
                                                                   value="<?= $row['Correo']; ?>" id="CorreoFl"
                                                                   placeholder="">
                                                            <label for="CorreoFl">Correo</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelect"
                                                                name="txtEspecialidad"
                                                                aria-label="Floating label select example">
                                                            <option disabled>-Especialidad-</option>
                                                            <option <?= ($row['especialidad'] == "Medicina") ? "selected" : "" ?>
                                                                    value="1">Medicina
                                                            </option>
                                                            <option <?= ($row['especialidad'] == "Consulta") ? "selected" : "" ?>
                                                                    value="2">Consulta
                                                            </option>
                                                            <option value="3">Esp3</option>
                                                        </select>
                                                        <label for="floatingSelect">Seleccione Especialidad</label>
                           
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <input type="submit" class="btn btn-primary" value="Agregar">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>