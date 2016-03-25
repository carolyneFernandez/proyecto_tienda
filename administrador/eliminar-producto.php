<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="estilo.css">
    <script src=""></script>
</head>

<body>


   <?php

     $connection1 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection2 = new mysqli($db_host, $db_user, $db_password, $db_name);
      if ($connection->connect_errno) {
          printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
          exit();
      }

    $id = $_GET['id'];
 $consulta1="DELETE FROM tallasproducto WHERE codproducto=$id ";
       $consulta2="DELETE FROM producto WHERE codproducto=$id ";


       $connection1->query($consulta1);
       $connection2->query($consulta2);


        unset($connection1);
          unset($connection2);
        var_dump($consulta1);

      header("Location:producto.php");



   ?>


</body>
</html>
