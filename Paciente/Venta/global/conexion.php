<?php


function getPDO () {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=bdveterinaria', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo->prepare('SELECT * FROM producto');
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
       // echo "<script>alert('Conectado....')</script>";

      return $resultado;
      

      }  
      catch(PDOException $e){
        print "¡Error!: <br/>";  
        return null;
      }
  }

?>