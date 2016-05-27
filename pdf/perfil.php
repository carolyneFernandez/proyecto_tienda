<?php
//INICIAMOS SESSION
session_start();
//fichero de la libreria
require('./font/fpdf.php');
//fichero de conexion a la base de datos
require('../plantilla/db_configuration.php');
include_once('../plantilla/configuration_instalacion.php');

//conexion a la base de datos
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
//Comprobacion de la conexion
if ($connection->connect_errno) {
	printf("Connection failed: %s\n", $connection->connect_error);
	exit();

}
//creamos el objeto fpdf
$pdf = new FPDF();
//añadimos una pagina(orientacion y formato en mi caso esta vacio=por defecto)
$pdf->AddPage();
// MÁRGENES EN LA PÁGINA.
$pdf->SetMargins(20, 30 , 30);
//formato de la pagina
$pdf->SetFont('Arial', '', 100);
//AÑADIMOS UNA IMAGEN(RUTA_ARCHIVO,izquierda,arriba,anchura,altura,formato)
$pdf->Image('../imagenes/logotipo/LOGO.png' , 10 ,10, 20 , 15,'PNG');

//CREAMOS LAS CELDAS para la parte de arriba(con margenes y valor)
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 50, '', 0);

//FORMATO DE FUENTE DE LA FECHA (ARIAL, CURSIVA Y TAMAÑO 9).
$pdf->SetFont('Arial', 'I',9);
$pdf->Cell(50, 0, 'Fecha: '.date('d-m-Y').'', 0);
//salto de linea(altura de salto)
$pdf->Ln(15);
//FORMATO DE FUENTE DEL TITULO  (COURIER, NEGRITA Y TAMAÑO 20)
$pdf->SetFont('Courier', 'B', 20);
$pdf->Cell(50, 0, '', 0);

//añadimos el color del titulo
$pdf->SetTextColor(44, 212, 204);

//agregamos el titulo del pdf
$pdf->Cell(85, 25, 'LISTADO De PEDIDOS', 0);
$pdf->Ln(23);
//COLOR DEL TEXTO DE LA TABLE(COLOR NEGRO)
$pdf->SetTextColor(0,0,0);

//color de la cabecera de la tabla
$pdf->SetFillColor(44, 212, 204);


//FORMATO DE FUENTE DE LA PRIMERA CELDA
$pdf->SetFont('Arial', 'B', 8);
//TEXTO DE CADA COLUMNA EN LA PRIMERA CELDA
$pdf->Cell(30, 8, 'Nombre del Cliente',1,0,"C",'True');
$pdf->Cell(30, 8, 'Fecha del pedido', 1,0,"C",'True');
$pdf->Cell(40, 8, 'Direccion del pedido', 1,0,"C",'True');
$pdf->Cell(15, 8, 'Cantidad', 1,0,"C",'True');
$pdf->Cell(15, 8, 'Precio ', 1,0,"C",'True');
$pdf->Cell(30, 8, 'Importe Total', 1,0,"C",'True');
$pdf->Ln(8);

//color del cuerpo  de la tabla
$pdf->SetFillColor(161,247,243);
//FORMATO DE FUENTE PARA EL CUERPO DE LA TABLA

$pdf->SetFont('Arial', '', 8);
//CONSULTA DE LA BASE DE DATOS
$connection->set_charset("utf8");
$usuarios = $connection->query("SELECT * from usuarios u join  pedidos p  on
u.codusuario=p.codusuario join incluyen i on p.codpedido=i.codpedido join producto pro on i.codproducto=pro.codproducto  where
 u.Nombre='".$_SESSION['nombre']."';");

//RECORREMOS TODAS LAS FILAS Y LAS AGREGAMOS EN CELDAS.
while($obj = $usuarios->fetch_object()){
//METEMOS LA VARIABLE EN LA CELDA PARA MOSTRAR UNA LISTA DE PEDIDOS DEL CLIENTE.
	$pdf->Cell(30, 8, $obj->Nombre, 1,0,"C",'True');
	$pdf->Cell(30, 8, $obj->fechaemision, 1,0,"C",'True');
	$pdf->Cell(40, 8,$obj->direccion, 1,0,"C",'True');
	$pdf->Cell(15, 8, $obj->cantidad, 1,0,"C",'True');
	$pdf->Cell(15, 8, $obj->precio, 1,0,"C",'True');
  $pdf->Cell(30, 8, $obj->cantidad*$obj->precio, 1,0,"C",'True');

	$pdf->Ln(8);
}
//CERRAR Y ENVIAR AL NAVEGADOR (NOMBRE DEL FICHERO,DESTINO).

$pdf->Output();
?>
