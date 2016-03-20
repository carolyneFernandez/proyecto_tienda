<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
session_start();
ob_start();
if(isset($_SESSION["nombre"])){

}else{
  header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Distribuidor</title>
    <link rel="stylesheet" href="editar.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>
       <h3>EDITAR DISTRIBUIDOR</h3>
 <div id="center" class="container">

   <?php

  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   if($connection->connect_errno){
       printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
       exit();

   }

   if(!isset($_POST['envia'])){


   $id=$_GET['id'];
   $consulta=("SELECT * FROM distribuidor where coddistribuidor=$id");

    $result=$connection->query($consulta);
    $obj = $result->fetch_object();
    echo "<form method='post' action='#'>";

    echo "<input type='hidden' name='coddistribuidor' value='$obj->coddistribuidor'><br> ";
    echo " <label>Nombre del Distribuidor:</label><br>";
    echo "<input type='text' name='nombre'  value='$obj->nombre' class='form-control'>";
    echo " <label>Localidad:</label>";
    echo  "<input type='text' name='localidad'  value='$obj->localidad' class='form-control'>";
    echo " <label>Provincia:</label>";
    echo  "<input type='text' name='provincia'  value='$obj->provincia' class='form-control'>";
    echo " <label>CIF:</label>";
    echo  "<input type='text' name='cif'  value='$obj->cif' class='form-control'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";
}else{
$coddistribuidor=$_POST['coddistribuidor'];
$nombre=$_POST['nombre'];
$localidad=$_POST['localidad'];
$provincia=$_POST['provincia'];
$cif=$_POST['cif'];


$consulta_mysql2="UPDATE distribuidor SET coddistribuidor='".$coddistribuidor."',nombre='".$nombre."',
localidad='".$localidad."',provincia='".$provincia."',cif='".$cif."' WHERE coddistribuidor=$coddistribuidor;";


        if($connection->query($consulta_mysql2)==true){
          header('Location:distribuidor.php');

        }else{
            echo $connection->error;

        }
}
        unset($connection);

?>

</div>
</body>
</html>
