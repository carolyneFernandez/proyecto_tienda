<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
  include_once("../plantilla/sesionusu.php");
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
  include "../plantilla/header.php"
?>
<div class="panel-group" role="tablist" aria-multiselectable="true">
  

  <div class="panel-group" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
  <div class="panel-heading" role="tab"  id="header">
  <h4 class="pannel-title"><center>
  TUS PEDIDOS
  </center></h4><p>
    <center>

    Echale un vistazo  a tus pedidos en nuestra Tienda Online </center>
  </p>
  </div>
  <div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
  <div class="panel-body">
  <center>
    <img src="../dasboard/php/estausu.php" id="dasboard"/></center>
  </div>
  </div>
  </div>

    </div>

<div class="panel panel-default">
<div class="panel-heading" role="tab"  id="header">
<h4 class="pannel-title"><center>
NUESTROS PRODUCTOS
</center></h4><p>
  <center>

Una estadistica de nuestros productos para que tenga la informacion mas reciente de nuestra tienda  </center>
</p>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
<div class="panel-body">
<center>
<img src="../dasboard/php/estadisticas.php" /></center>
</div>
</div>
</div>

  </div>
<?php

  include "../plantilla/foot.php"
?>

    </body>
</html>
