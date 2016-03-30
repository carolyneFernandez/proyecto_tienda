<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>


<!DOCTYPE html>
<html lang="">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/default.css">

</head>

<body>
  <?php
      include "../plantilla/cabeceradmin.php"
  ?>

 <div id="center" class="container">

   <?php

   $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   if($connection->connect_errno){
       printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
       exit();

   }
   //si no esta definida el input typo sumbit con el nombre envia
   //que me muestre el formulario
   if(!isset($_POST['envia'])){


   $id=$_GET['id'];
   $connection->set_charset("utf8");
   $consulta=("SELECT * FROM usuarios where codusuario=$id");

    $result=$connection->query($consulta);
    $obj = $result->fetch_object();
    echo " <center>
        <h3><b>Edita los datos de $obj->Nombre</b></h3>
     </center>";
    echo "<form method='post' action='#'>";
    echo " <label>Nombre :</label>";
    echo  "<input type='text' name='nombre'  value='$obj->Nombre' class='form-control' >";
    echo "<input type='hidden'name='id' value='$obj->codusuario'> ";
    echo " <label>Apellido:</label>";
    echo "<input type='text' name='apellido'  value='$obj->apellido' class='form-control'>";
    echo " <label>DNI:</label>";
    echo  "<input type='text' name='dni'  value='$obj->dni' class='form-control'>";
    echo " <label>Localidad:</label>";
    echo  "<input type='text' name='localidad'  value='$obj->localidad' class='form-control'>";
    echo " <label>Provincia:</label>";
    echo  "<input type='text' name='provincia'  value='$obj->provincia' class='form-control'>";
    echo " <label>Pais:</label>";
    echo  "<input type='text' name='pais'  value='$obj->pais' class='form-control'>";
    echo " <label>Direccion:</label>";
    echo  "<input type='text' name='direccion'  value='$obj->direccion' class='form-control'>";
    echo " <label>Telefono:</label>";
    echo  "<input type='number' name='telefono'  value='$obj->telefono' class='form-control'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";
}else{
$id=$_POST['id'];

$nombre=$_POST['nombre'];

$apellido=$_POST['apellido'];

$dni=$_POST['dni'];
$localidad=$_POST['localidad'];
$provincia=$_POST['provincia'];
$pais=$_POST['pais'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];


$consulta_mysql2="UPDATE usuarios SET codusuario='.$id.',nombre='".$nombre."',apellido='".$apellido."',
dni='".$dni."',localidad='".$localidad."',provincia='".$provincia."',
pais='".$pais."',direccion='".$direccion."',telefono='".$telefono."' WHERE codusuario=$id";



        if($connection->query($consulta_mysql2)==true){
          header('Location:administrador.php');

        }else{
            echo $connection->error;

        }
}
        unset($connection);

?>

</div>
<?php
    include "../plantilla/foot.php"
?>
</body>
</html>
