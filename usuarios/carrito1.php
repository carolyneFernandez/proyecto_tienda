<?php
  include_once("../plantilla/db_configuration.php");
?>

<?php
  session_start();
   $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}

?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaquetas de mujer</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/chaqueta.css">
      <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/foot.css">
    </head>
    <body>

<?php
  include "../plantilla/header.php"
?>



	<div class="container well">
		<div class="row">
			<div class="col-xs-12"><h2>Datos de los Pedidos</h2></div>
		</div>
		<br />
		<br />
		<div class="container" style="color:black;">
			<!-- PRINT THE TABLE AND THE HEADER -->

		<?php
			if(isset($_SESSION['carrito'])){
		?>
			<table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr class="info" >
					<th>ID</th>
					<th>Art&iacute;culo</th>
					<th>Talla</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<?PHP
			$total = 0;
			foreach($_SESSION['carrito'] as $id => $articulo){
				$total +=$articulo['cantidad']*$articulo['precio'];
				?>
					<tr>
						<form action="../plantilla/eliminarArticulo.php" method="post"><td><?= $id ?></td>
						<td><?= $articulo['nombre'] ?></td>
						<td><?= $articulo['talla'] ?></td>
						<td><?= $articulo['cantidad'] ?></td>
						<td><?= $articulo['precio'].'&#8364' ?></td>
						<td><?= ($articulo['cantidad']*$articulo['precio']).'&#8364' ?></td>
						<input type="hidden" name="id" value="<?=$id ?>">
						<td><button type="submit">Eliminar</button></form>
					</tr>
				<?PHP
			}
			?>
					<tr class="info" >
						<th></th><th></th><th></th><th></th><th>Total</th><th><?PHP echo $total.'&#8364'; ?></th><th></th>
					</tr>

			</table>
			<a class='btn btn-info' href="../plantilla/realizarPedido.php">Pagar</a>  <!--enlace a realizar pedios-->
		<?PHP
			}else{
		?>
			<h1>NO EXISTEN ARTÍCULOS EN EL CARRITO</h1>
		<?PHP
			}
		?>
		</div>
	</div>




<?php
  include "../plantilla/foot.php"
?>


    </body>
</html>
