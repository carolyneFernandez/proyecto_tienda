<?php
  include_once("../plantilla/db_configuration.php");
?>
  <?php
  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   if ($connection->connect_errno) {
         printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
         exit();
     }

//creamos las variables
 $id=$_POST['producto'];
 $nombretalla=$_POST['talla'];

//consulta_mysql2:inserta una nueva columna en la tabla tallasproducto

 $consulta_mysql2="INSERT INTO `tienda`.`tallasproducto` (`idrelacion`, `codproducto`, `tallas`)
 VALUES (NULL,'$id','$nombretalla')";

//si la consulta da verdadera es decir que se efectua bien

         if($connection->query($consulta_mysql2)==true){
           //coje la variable que la habia perdido
           $ida=$_POST['producto'];
//redirige a la pagina
     header("Location:detallecolor.php?deta=$ida");
//cierra la coneccion
               mysql_close();


         }else{
             echo $connection->error;

         }

         unset($connection);

?>
