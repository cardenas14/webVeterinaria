<?php
include 'plantilla_clientes_pdf.php';
require 'conexion.php';


$query = "SELECT h.IdHistorial,h.DNI, e.Nombre,l.Nombres,h.Precio,h.FechaAtencion,h.Descripcion FROM historial_cliente h INNER JOIN especialidad e ON e.IdEspecialidad = h.IdEspecilidad INNER JOIN login_empleado l ON l.IdEmpleado = h.IdEmpleado";
$resultado = $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255, 173, 97);
$pdf->SetFont('Arial', 'B', 10); //fuente,estilo,tamanio

$pdf->SetX(5);
$pdf->Cell(35, 6, 'ID HISTORIAL', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'DNI CLIENTE', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'ESPECIALIDAD', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'NOMBRE EMPL', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'PRECIO', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'FECHA', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'DESCRIPCION', 1, 1, 'C', 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 8);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(5);
    $pdf->Cell(35, 6, $row['IdHistorial'], 1, 0, 'C', 1);
    $pdf->Cell(25, 6, utf8_decode($row['DNI']), 1, 0, 'C', 1);
    $pdf->Cell(30, 6, utf8_decode($row['Nombre']), 1, 0, 'C', 1);
    $pdf->Cell(40, 6, $row['Nombres'], 1, 0, 'C', 1);
    $pdf->Cell(20, 6, 'S/.'.$row['Precio'], 1, 0, 'C', 1);
    $pdf->Cell(20, 6, $row['FechaAtencion'], 1, 0, 'C', 1);
    $pdf->Cell(30, 6, $row['Descripcion'], 1, 1, 'C', 1);
}

$pdf->Output();
