
<?php

$servidor="mysql:dbname=bdveterinaria;host=localhost";

try{

    $pdo=new PDO($servidor,'root','',
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );


}catch(PDOException $e){



}

?>