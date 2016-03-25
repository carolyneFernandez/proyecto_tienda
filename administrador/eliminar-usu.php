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
    <title>BORRAR EMPLEADOS</title>
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


    $connection->query("DELETE FROM usuarios WHERE codusuario=$id ");


        unset($connection);
        header("Location:administrador.php?id=$id");



   ?>


</body>
</html>
