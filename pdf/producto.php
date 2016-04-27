$consulta = $connection->query("SELECT p.*,d.nombre nombred FROM producto p join distribuidor d on p.coddistribuidor=d.coddistribuidor");

while($obj=$consulta->fetch_object()){

	$pdf->Cell(80, 8, $obj->nombre);
	$pdf->Cell(35, 8, $obj->nombred);
	$pdf->Cell(25, 8,  $obj->stock);
	$pdf->Cell(30, 8,  $obj->categoria);
	$pdf->Cell(25, 8,  $obj->precio);

	$pdf->Ln(8);
