<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar color y tallas</title>
    <link rel="stylesheet" href="estilo.css">
    <script src=""></script>
</head>

<body>


   <?php

     $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

      if ($connection->connect_errno) {
          printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
          exit();
      }

    $id = $_GET['id'];
    $talla = $_GET['talla'];
    $color= $_GET['color'];

$consulta="DELETE FROM tallasproducto WHERE codproducto=$id and tallas=$talla";
$consulta2="DELETE FROM colorproducto WHERE codproducto=$id and idcolor=$color";
$connection->query($consulta2);
    //$connection->query($consulta2);

var_dump($consulta);
var_dump($consulta2);
        unset($connection);
    //header("Location:detallecolor.php");



   ?>


</body>
</html>
