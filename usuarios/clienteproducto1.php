
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
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/chaquetamujer.css">
    <link rel="stylesheet" href="../css/colores.css">
      <link rel="stylesheet" href="../css/foot.css">
        <link rel="stylesheet" href="../css/clienteproducto.css">
    </head>
    <body>
      <?php
      if(isset($_SESSION['nombre'])){

      ?>
<?php
  include "../plantilla/header.php"
?>

<?php
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}
$connection->set_charset("utf8");
$id=$_GET['id'];
$consulta=("SELECT * FROM producto where codproducto=".$id);

	$result = $connection->query($consulta);
  if (isset($result) && $result->num_rows==0) {
  echo "<p>
	No existen productos en la categoria indicada.
   </p>";
  } else {

echo "<div id='cuerpo'>";


        $result=$connection->query($consulta);
        $obj = $result->fetch_object();
        echo "<div id='div1'>";
          echo "<img src='../imagenes/".$obj->foto."'>";
        echo "</div>";
        echo "<div id='div2'>";
		?>
		<form action="../plantilla/addCarrito.php" method="POST">
			<input type="hidden" name="id_producto" value="<?PHP echo $obj->codproducto; ?>">
			<input type="hidden" name="nombre_producto" value="<?PHP echo $obj->nombre; ?>">
			<input type="hidden" name="precio_producto" value="<?PHP echo $obj->precio; ?>">
      	<input type="hidden" name="nombre_color" value="<?PHP echo $obj->color; ?>">
		<?PHP
        echo "<h4><b>".$obj->nombre."</b></h4>";
        echo "<p>Precio de Venta:";
        echo $obj->precio .'€' ;
        echo "</p>";
        echo "<p>Colores Disponibles </p>";
        $consultacolores="SELECT DISTINCT c.nombrecolor FROM colores c join colorproducto cp on c.idcolor=cp.idcolor
         where cp.codproducto=".$obj->codproducto;
        $resultcolores = $connection->query($consultacolores);
        if (isset($resultcolores) && $resultcolores->num_rows==0) {
        echo "<p>
      	No existen productos en la categoria indicada.
         </p>";
        } else {
          echo "<select  name='color'>";
        while($objcolores = $resultcolores->fetch_object()){

          echo "<option value='".$objcolores->nombrecolor."'>".$objcolores->nombrecolor."</option>";
        }
        echo "</select><br>";

        }
        echo "<p style='clear:both;'>Tallas Disponibles :</p>";
        $consultalla="SELECT DISTINCT t.nombretalla, t.idtalla FROM tallasproducto tp join tallas  t on  tp.tallas=t.idtalla
         where tp.codproducto=".$obj->codproducto;
        $resultalla = $connection->query($consultalla);
        if (isset($resultalla) && $resultalla->num_rows==0) {
        echo "<p>No existen productos en la categoria indicada.</p>";
        } else {
            echo "<select  name='talla'>";
          while($objtalla = $resultalla->fetch_object()){

            echo "<option value='".$objtalla->nombretalla."'>".$objtalla->nombretalla."</option>";
          }
          echo "</select><br>";

          }

        echo "<p>Descripcion : </p>";
        echo "<p class='parrafo'>".$obj->descripcion."</p>";
        if($obj->stock<=0){
              echo "<button type='button' class='btn btn-danger'>NO HAY PRODUCTO DISPONIBLE</button>";
      }else{
              echo "<button type='submit' class='btn btn-info'>Añadir Carrito</button>";
      }
		?>
		</form>
		<?PHP
        echo "</div>";
      }



echo "</div>"
?>


<?php
  include "../plantilla/foot.php"
?>
<?php
}else{
  header("Location:registro.php");
}
  ?>
    </body>
</html>
