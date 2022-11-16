
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdveterinaria";

session_start();

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `reserva_cita`(`DNI`,`Turno`, `Fecha`, `Hora`, `Consulta`, `IdEspecialidad`, `IdEmpleado`) 
  VALUES (?,?,?,?,?,?,? )";
  
  $stmt=$conn->prepare($sql);
  $stmt->bindValue(1,$_SESSION['usuario']['dni']);
  $stmt->bindValue(2,$_POST["Turno"]);
  $stmt->bindValue(3,$_POST["Fecha"]);
  $stmt->bindValue(4,$_POST["hora"]);
  $stmt->bindValue(5,$_POST["Consulta"]);
  $stmt->bindValue(6,$_POST["Especialidad"]);
  $stmt->bindValue(7,$_POST["Doctor"]);
  

  $stmt->execute();
  header('Location: '.'http://localhost/TallerWeb-avance2/Paciente/cita_paciente.php'); //para que te diriga a la misma pastalla 

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>