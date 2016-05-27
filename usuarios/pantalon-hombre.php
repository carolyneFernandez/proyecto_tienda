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

      <?php
      include "../plantilla/temas.php"
      ?>
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
$consulta=("SELECT * from producto where  categoria='pantalones' and sexo='hombre';");

	$result = $connection->query($consulta);

  if (isset($result) && $result->num_rows==0) {
  echo "<p>
	No existen productos en la categoria indicada.
   </p>";
 } else {
   ?>
    <div class="container">
  <h2>TODAS LOS PANTALONES DE MODA</h2>
  <p>Espectaculares y a precios de oferta:</p>

  <div class="row">
    <?php
    while($obj = $result->fetch_object()) {
    echo "<div class='col-md-2'>";
    echo "<a href='clienteproducto.php?id=$obj->codproducto' class='thumbnail'>";
    echo "<img src='../imagenes/$obj->foto'>";
      echo "<p id='parrafo'><b>$obj->nombre</b></p>";
    echo "<button type='button' class='btn btn-info'>$obj->precio €</button>";
    if($obj->stock<=0){
      echo "<button type='button' class='btn btn-danger'>Ver detalles</button>";
    }else{
        echo "<button type='button' class='btn btn-info'>Ver detalles</button>";
    }?>

      </a>
    </div>
<?php } ?>
  </div>
</div>
<?php
  include "../plantilla/foot.php"
?>
<?php
}
}else{
  header("Location:registro.php");
}
  ?>

    </body>
</html>
