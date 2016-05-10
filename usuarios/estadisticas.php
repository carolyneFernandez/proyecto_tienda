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

<center>

  <h2>Nuestros Productos</h2>
  <p>
    Una estadistica de nuestros productos para que tenga la informacion mas reciente de nuestra tienda
  </p></center>
  <img src="../dasboard/php/estadisticas.php" />

  <hr style="border: 1px solid black;">

    <center>

      <h2>Tus Pedidos</h2>
      <p>
        Echale un vistazo  a tus pedidos en nuestra Tienda Online
      </p></center>

  <img src="../dasboard/php/estausu.php" id="dasboard"/>

<?php

  include "../plantilla/foot.php"
?>

    </body>
</html>
