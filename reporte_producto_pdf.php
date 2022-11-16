<?php
include 'plantilla_productos_pdf.php';
require 'conexion.php';


$query = "SELECT p.IdProducto, c.Nombre AS Categoria, p.Nombre, p.Precio_Venta, p.stock FROM producto p 
 INNER JOIN categoria c ON c.IdCategoria = p.IdCategoria";
$resultado = $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255, 173, 97);
$pdf->SetFont('Arial', 'B', 12); //fuente,estilo,tamanio

$pdf->SetX(30);
$pdf->Cell(35, 6, 'ID PRODUCTO', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'CATEGORIA', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'PRECIO VENTA', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'STOCK', 1, 1, 'C', 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(30);
    $pdf->Cell(35, 6, $row['IdProducto'], 1, 0, 'C', 1);
    $pdf->Cell(25, 6, utf8_decode($row['Nombre']), 1, 0, 'C', 1);
    $pdf->Cell(30, 6, utf8_decode($row['Categoria']), 1, 0, 'C', 1);
    $pdf->Cell(40, 6, $row['Precio_Venta'], 1, 0, 'C', 1);
    $pdf->Cell(20, 6, $row['stock'], 1, 1, 'C', 1);
}

$pdf->Output();
