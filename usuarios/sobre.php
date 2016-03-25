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
  $consulta=("SELECT * from producto;");

  $result = $connection->query($consulta);

  if (isset($result) && $result->num_rows==0) {
  echo "<p>
  No existen productos en la categoria indicada.
  </p>";
  } else {
  ?>
  <div class="container">
<center>
  <H2>CONOCE NUESTROS PRODUCTOS</H2>

</center>


  <div class="row">
  <?php
  while($obj = $result->fetch_object()) {
  echo "<div class='col-md-3' id='sobre'>";

    echo "<img src='../imagenes/$obj->foto' class='img-circle' alt='Cinque Terre' width='190' height='190' >";

?>


  </div>

  <?php } ?>
  </div>
  </div>
  <?php
  include "../plantilla/foot.php"
  ?>
  <?php
  }

  ?>

  </body>
  </html>
