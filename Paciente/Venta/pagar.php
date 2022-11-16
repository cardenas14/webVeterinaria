<?php
include 'global/config.php';
include 'global/conexion2.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>

<?php

if($_POST){

    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }

    $sentencia=$pdo->prepare("INSERT INTO 
    `ventas`(`IdVenta`,`ClaveTransaccion`,`PayPalDatos`,`Fecha`,`Correo`, `Total`,`Estado`) 
    VALUES (NULL,:ClaveTransaccion,'',NOW(),:Correo,:Total,'Pendiente')");

    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$Correo);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();

    $IdVenta=$pdo->lastInsertId();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $sentencia=$pdo->prepare("INSERT INTO 
        `detalleventa` (`IdDetalle`, `IdVenta`, `IdProducto`, `PrecioUnit`, `Cantidad`) 
                VALUES (NULL,:IdVenta,:IdProducto,:PrecioUnit,:Cantidad);");

            $sentencia->bindParam(":IdVenta",$IdVenta);
            $sentencia->bindParam(":IdProducto",$IdProducto);
            $sentencia->bindParam(":PrecioUnit",$producto['PRECIO']);
            $sentencia->bindParam(":Cantidad",$producto['CANTIDAD']);
            $sentencia->execute();

    }


    echo "<h3>".$total."</h3>";
}

?>

<div class="jumbotron text-center">
    <h1 class="display-4">Paso Final!!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con PayPal la cantidad de:
        <h4>S/.<?php echo number_format($total,2);?></h4>
        <div id="paypal-button-container"></div>
    </p>
 
    <p>Los productos procederan a poder ser retirados una vez que se procese el pago<br/>
    <strong>(Para aclaraciones: AnimalCenter@gmail.com)</strong>
    </p>
    
</div>



<!DOCTYPE html>
<html lang="en">

<head >

    <div   > 
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Checkout Integration | Responsive Buttons </title>

    <style >
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
                margin-top:30px;
               margin-left:40%;
            }
        }
    </style>
    </div>
</head>

<body>

    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons().render('#paypal-button-container');
    </script>
</body>

</html>

<?php include 'templates/pie.php';