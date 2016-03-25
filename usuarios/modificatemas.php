<?php
  include_once("../plantilla/db_configuration.php");
?><?php
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if($connection->connect_errno){
    printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
    exit();

}
   $consulta=("SELECT * FROM usuarios where codusuario=$id");


$plantilla1=$_POST['procesar'];

 $id=$_POST['id'];
 $consulta_mysql2="UPDATE usuarios SET estilo='$plantilla1' WHERE codusuario=$id";

  $connection->set_charset("utf8");
 if($plantilla1==0){

   if($connection->query($consulta_mysql2)==true){
     include_once("../plantilla/cerrar.php");

   header("Location:index.php");


   }else{
     echo $connection->error;

   }

  }elseif ($plantilla1==1) {
    if($connection->query($consulta_mysql2)==true){

        include_once("../plantilla/cerrar.php");

      header("Location:index.php");


    }else{
      echo $connection->error;

    }

  }else{
    if($connection->query($consulta_mysql2)==true){
      include_once("../plantilla/cerrar.php");

    header("Location:index.php");


    }else{
      echo $connection->error;

    }

  }

$consulta_mysql2="UPDATE usuarios SET estilo='$plantilla' WHERE codusuario=$id";




        unset($connection);

?>
