<?php
session_start();
if($_SESSION['usuario']){
    session_destroy();
    echo '<script language= javascript>
    alert("Su session ha terminado correctamente")
    self.location= "../PagLogin.php"
    </script>';
}
else{
    echo '<script language= javascript>
    alert("No ha Enviado ninguna session, por favor registrese")
    self.location= "../PagLogin.php"
    </script>';
}
?>