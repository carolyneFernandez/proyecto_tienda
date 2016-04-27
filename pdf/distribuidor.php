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
$pdf->SetFont('Arial', '', 100);
$pdf->Image('../imagenes/logotipo/LOGO.png' , 10 ,10, 20 , 15,'PNG');

$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '', 0);
$pdf->SetFont('Arial', 'I', 9);
$pdf->Cell(50, 0, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Courier', 'B', 20);
$pdf->Cell(50, 0, '', 0);
$pdf->SetTextColor(44, 212, 204);
$pdf->Cell(85, 25, 'LISTADO DE DISTRIBUIDORES', 0);
$pdf->SetMargins(40, 30, 10, true);
$pdf->Ln(23);
$pdf->SetTextColor(0,0,0);

$pdf->SetFillColor(44, 212, 204);//color de la cabecera de la tabla



//datos par la tabla
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(25, 8, 'CODIGO ',1,0,"C",'True');
$pdf->Cell(30, 8, 'NOMBRE', 1,0,"C",'True');
$pdf->Cell(40, 8, 'LOCALIDAD', 1,0,"C",'True');
$pdf->Cell(20, 8, 'PROVINCIA', 1,0,"C",'True');
$pdf->Cell(20, 8, 'CIF', 1,0,"C",'True');

$pdf->Ln(8);
$pdf->SetFillColor(161,247,243);//color del cuerpo  de la tabla


$pdf->SetFont('Arial', '', 8);

//CONSULTA
$connection->set_charset("utf8");
$consulta = $connection->query("SELECT * FROM distribuidor");


while($obj = $consulta->fetch_object()){

	$pdf->Cell(25, 8, $obj->coddistribuidor, 1,0,"C",'True');
	$pdf->Cell(30, 8, $obj->nombre, 1,0,"C",'True');
	$pdf->Cell(40, 8,$obj->localidad, 1,0,"C",'True');
	$pdf->Cell(20, 8, $obj->provincia, 1,0,"C",'True');
	$pdf->Cell(20, 8, $obj->cif, 1,0,"C",'True');

	$pdf->Ln(8);
}

$pdf->SetFont('Arial', 'B', 8);
//$pdf->Output('listauser.pdf','D');
$pdf->Output();
?>
