<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	 
	$query = "SELECT * FROM visitas  ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'fecha',1,0,'C',1);
	$pdf->Cell(70,6,'costo',1,0,'C',1);
	$pdf->Cell(70,6,'tipo',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())

	{
		
		$pdf->Cell(70,6,$row['fecha'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['costo']),1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['tipo']),1,1,'C');
	}
	$pdf->Output();
?>