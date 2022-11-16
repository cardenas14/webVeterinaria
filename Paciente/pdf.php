<?php
require('../Paciente/fpdf/fpdf.php');

class PDF extends FPDF

{
// Cabecera de página
function Header()
{
    //logo
    $this->Image('../img/logo.png',10,3,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,15,'REPORTE DEL PACIENTE',3,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}

}

$mysqli = new mysqli("localhost","root","","bdveterinaria");
session_start();
$dni = $_SESSION["usuario"]["dni"];

$consulta = "Select hc.IdHistorial, lc.Nombres as cliente, le.Nombres as empleado, es.Nombre as especialidad, hc.FechaAtencion, hc.Descripcion from historial_cliente hc
inner join login_cliente lc on hc.DNI=lc.DNI
inner join login_empleado le on hc.IdEmpleado=le.IdEmpleado
inner join especialidad es on hc.IdEspecilidad=es.IdEspecialidad
where lc.DNI=" . $dni;

$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,10, 'DNI:',    0, 0 , 'C', 0);
$pdf->Cell(20,10, $dni, 0, 0 , 'C', 0);

$pdf->Ln(15);
$pdf->Cell(20,10, 'ID Historial', 1, 0 , 'C', 0);
$pdf->Cell(50,10, 'Cliente', 1, 0 , 'C', 0);
$pdf->Cell(30,10, 'Empleado', 1, 0 , 'C', 0);
$pdf->Cell(30,10, 'Especialidad', 1, 0 , 'C', 0);
$pdf->Cell(30,10, 'Fecha Atencion', 1, 0 , 'C', 0);
$pdf->Cell(30,10, 'Descripcion', 1, 0 , 'C', 0);
$pdf->Ln(10);

while($row = $resultado->fetch_assoc()){

    $pdf->Cell(20,10, $row['IdHistorial'], 1, 0 , 'C', 0);
    $pdf->Cell(50,10, $row['cliente'], 1, 0 , 'C', 0);
    $pdf->Cell(30,10, $row['empleado'], 1, 0 , 'C', 0);
    $pdf->Cell(30,10, $row['especialidad'], 1, 0 , 'C', 0);
    $pdf->Cell(30,10, $row['FechaAtencion'], 1, 0 , 'C', 0);
    $pdf->Cell(30,10, $row['Descripcion'], 1, 0 , 'C', 0);
    $pdf->Ln(10);
}


$pdf->Output();
?>
