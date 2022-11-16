
<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bdveterinaria";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO solicitar_info (Nombres, Apellidos,DNI,Telefono,Fecha,Correo,Consulta)
  VALUES (?,?,?,?,?,?,? )";
  
  $stmt=$conn->prepare($sql);
  $stmt->bindValue(1,$_POST["innombre"]);
  $stmt->bindValue(2,$_POST["inapellido"]);
  $stmt->bindValue(3,$_POST["indni"]);
  $stmt->bindValue(4,$_POST["intelefono"]);
  $stmt->bindValue(5,$_POST["infecha"]);
  $stmt->bindValue(6,$_POST["incorreo"]);
  $stmt->bindValue(7,$_POST["inconsulta"]);
  

  $stmt->execute();
  header('Location: '.'http://localhost/TallerWeb-Veterinaria/Contacto.html'); //para que te diriga a la misma pastalla 

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>