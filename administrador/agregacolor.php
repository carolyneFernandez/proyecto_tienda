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

 $nombreproducto=$_POST['producto'];
 $nombrecolor=$_POST['color'];

//consulta_mysql2:inserta una nueva columna en la tabla color producto

 $consulta_mysql2="INSERT INTO colorproducto (idrelacion,idcolor,codproducto)
 VALUES  ( NULL,'$nombrecolor','$nombreproducto')";
 var_dump($consulta_mysql2);

//si la consulta da verdadera es decir que se efectua bien

    if($connection->query($consulta_mysql2)==true){
        $ida=$_POST['producto'];

    header("Location:detallecolor.php?deta=$ida");

               mysql_close();


         }else{
             echo $connection->error;

         }

         unset($connection);*/

?>
