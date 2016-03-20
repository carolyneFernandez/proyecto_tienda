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
    <title>Eliminar distribuidor</title>
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


    $connection->query("DELETE FROM distribuidor WHERE coddistribuidor=$id ");


        unset($connection);
        header("Location:distribuidor.php");



   ?>


</body>
</html>
