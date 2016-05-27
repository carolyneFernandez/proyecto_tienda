<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>
  <?php
  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   if ($connection->connect_errno) {
         printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
         exit();
     }
 $id=$_POST['producto'];
 $nombretalla=$_POST['talla'];
 $consulta_mysql2="INSERT INTO tallasproducto(`idrelacion`, `codproducto`, `tallas`)
 VALUES (NULL,'$id','$nombretalla')";
 var_dump($consulta_mysql2);
         if($connection->query($consulta_mysql2)==true){
           $ida=$_POST['producto'];
     header("Location:detallecolor.php?deta=$ida");
               mysql_close();
         }else{
             echo $connection->error;
         }
         unset($connection);
?>
