<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>

    <br>

    <?php if($mensaje!=""){ ?>
        <div class="alert alert-success " style="margin-top:50px;" >
        <?php print_r($mensaje) ?>
        

        <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
        </div> 
         
  
    <?php } ?>
    <div class="row">

    <?php

       $listaProductos=getPDO();
      // print_r($listaProductos);
    ?>

    <?php foreach($listaProductos as $producto){ ?>

        <div class="col-3">
            <div class="card" style="margin-bottom: 15px;">

                <img 
                src="data:image/jpg;base64,<?= base64_encode($producto['Imagen']); ?>"
                title="<?php echo $producto['Nombre'];?>"
               
                class="card-img-top" 
                data-bs-toggle="popover"
                data-bs-trigger="hover"
                data-bs-content="<?php echo $producto['Descripcion'];?>"
                height="317px"
                >

                <div class="card-body" >
                    <span><?php echo $producto['Nombre'];?></span>
                    <h5 class="card-title">S/.<?php echo $producto['Precio_Venta'];?></h5>
                    
                   <form action="" method="post"> 
                        <input  type="hidden" name="id"  id="id" value="<?php echo openssl_encrypt($producto['IdProducto'],COD,KEY);?>">
                       <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                       <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio_Venta'],COD,KEY);?>">
                       <input type="hidden" name="cantidad"  id="cantidad" value="<?php echo  openssl_encrypt(1,COD,KEY);?>">
                        <!--Hidden-->
   
                        <button class="btn btn-primary" 
                        name="btnAccion"
                        value="Agregar"
                        type="submit"
                        >Agregar al carrito
                        </button>

                    </form>
                    
                </div>



            </div>
        </div>

    <?php } ?>
 
    </div>

    <script>

        $(function () {
           $('[data-bs-toggle="popover"]').popover()
        });

    </script>

<?php

include 'templates/pie.php';

?>