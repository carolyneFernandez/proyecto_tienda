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

   $id = $_POST['producto'];
   $talla = $_POST['talla'];

       $consulta="DELETE FROM tallasproducto WHERE codproducto=$id and tallas=$talla";






   $connection->query($consulta);
   var_dump($consulta);

      unset($connection);
      $ida=$_POST['producto'];

header("Location:detallecolor.php?deta=$ida");



   ?>


</body>
</html>
