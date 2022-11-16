

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="../PaginaPaciente.php"><img style= "border-radius:30px; margin-left:12px;" src="http://localhost/TallerWeb-avance2/img/Flecha.jpg" width="80px" ></a>

        
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse"  >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active" style="margin-left: 15px;">
                    <a class="nav-link" href="index.php"><FONT SIZE=8 FACE="Fantasy" color="skyblue">Inicio</FONT></a>

                </li>
                <li class="nav-item active"  style="margin-left: 25px;">
                    <a class="nav-link" href="mostrarCarrito.php"><FONT SIZE=8 FACE="Fantasy" color="skyblue"><img src="http://localhost/TallerWeb-avance2/img/carrito.png" width="60px">(
                        <?php
                        echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                        ?>)</FONT></a>
                </li>
                

            </ul>
        </div>
    </nav>
  
    <br/>
    <br/>
    <div class="container">