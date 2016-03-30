<?php
require('./font/fpdf.php');
require('../plantilla/db_configuration.php');
include_once('../plantilla/configuration_instalacion.php');
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
	printf("Connection failed: %s\n", $connection->connect_error);
	exit();

}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Image('../imagenes/logotipo/LOGO.png' , 10 ,10, 20 , 15,'PNG');
$pdf->Cell(20);
$pdf->Cell(150, 10, 'MODA CAROLYNE');/*114-> margen que se deja  la derecha,margen de arriba,nombre*/
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(10, 10, 'Fecha: '.date('d-m-Y').'');
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 10, 'LISTADO DE DISTRIBUIDORES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 8, 'CODIGO DE DISTRIBUIDORES');
$pdf->Cell(40, 8, 'NOMBRE');
$pdf->Cell(25, 8, 'LOCALIDAD');
$pdf->Cell(35, 8, 'PROVINCIA');
$pdf->Cell(20, 8, 'CIF');


$pdf->Ln(8);/*Al no ponerlo se sube la primera fila*/
$pdf->SetFont('Arial');
//CONSULTA
$consulta = $connection->query("SELECT * FROM distribuidor");

while($obj=$consulta->fetch_object()){

	$pdf->Cell(50, 8, $obj->coddistribuidor);
	$pdf->Cell(40, 8, $obj->nombre, 0);
	$pdf->Cell(25, 8,  $obj->localidad, 0);
	$pdf->Cell(35, 8,  $obj->provincia, 0);
	$pdf->Cell(25, 8,  $obj->cif, 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
