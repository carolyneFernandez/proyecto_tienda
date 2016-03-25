<?php
  include_once("../plantilla/db_configuration.php");
?><?php
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if($connection->connect_errno){
    printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
    exit();

}
   $consulta=("SELECT * FROM usuarios where codusuario=$id");
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$localidad=$_POST['localidad'];
$provincia=$_POST['provincia'];
$telefono=$_POST['telefono'];
$pais=$_POST['pais'];
$direccion=$_POST['direccion'];

  $connection->set_charset("utf8");
$consulta_mysql2="UPDATE usuarios SET codusuario='$id',nombre='".$nombre."',apellido='".$apellido."',
dni='".$dni."',localidad='".$localidad."',provincia='".$provincia."',
pais='".$pais."',direccion='".$direccion."',telefono='".$telefono."' WHERE codusuario=$id";
var_dump($consulta_mysql2);


        if($connection->query($consulta_mysql2)==true){
        header('Location:perfil.php');

        }else{
          echo $connection->error;

        }
        unset($connection);

?>
