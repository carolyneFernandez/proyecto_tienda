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
$pdf->Cell(100, 10, 'LISTADO DE USUARIOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'Codusuario');
$pdf->Cell(25, 8, 'Nombre');
$pdf->Cell(25, 8, 'Apellido');
$pdf->Cell(20, 8, 'DNI');
$pdf->Cell(20, 8, 'Localidad');
$pdf->Cell(45, 8, 'Direccion');
$pdf->Cell(25, 8, 'Provincia');
$pdf->Cell(25, 8, 'Pais');
$pdf->Ln(8);/*Al no ponerlo se sube la primera fila*/
$pdf->SetFont('Arial');
//CONSULTA
$consulta = $connection->query("SELECT * FROM usuarios");

while($obj=$consulta->fetch_object()){

	$pdf->Cell(20, 8, $obj->codusuario,0);
	$pdf->Cell(25, 8, $obj->Nombre, 0);
	$pdf->Cell(25, 8,  $obj->apellido, 0);
	$pdf->Cell(20, 8,  $obj->dni, 0);
	$pdf->Cell(20, 8,  $obj->localidad, 0);
	$pdf->Cell(45, 8,  $obj->direccion, 0);
	$pdf->Cell(25, 8,  $obj->provincia, 0);
	$pdf->Cell(25, 8,  $obj->pais, 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
