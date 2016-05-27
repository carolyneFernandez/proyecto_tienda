<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php

    include "../plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../css/default.css">

    <title>Añadir Distribuidor</title>
</head>
    <body>
      <?php
        include_once("../plantilla/cabeceradmin.php");
      ?> <div id="center" class="container">
        <div class="panel-heading" role="tab"  id="header">
          <h4 class="pannel-title"><center>
      AÑADIR DISTRIBUIDOR
          </center></h4>
        </div>
      	<hr class="colorgraph" style="margin-bottom: 0px;margin-top: 0px;">

       <?php
        //creamos la coneccion a la base de datos
          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
       if($connection->connect_errno){
         //si la coneccion no se realiza sale el mensaje
           printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
           exit();

       }
       //si no esta definida el input typo sumbit con el nombre envia
       //que me muestre el formulario
       if(!isset($_POST['envia'])){



         $consulta="SELECT * FROM coddistribuidor";
             $result=$connection->query($consulta);
             echo "<form method='post' action='#' enctype='multipart/form-data' style='width: 20%;margin-bottom: 4%;padding: 1%;margin-top: 2%;margin-left: 40%;'>";
          echo "<input type='hidden'name='coddistribuidor'> ";
            echo " <label>Nombre del distribuidor:</label>";
            echo "<input type='text' name='nombre'  class='form-control' required>";
            echo " <label>Localidad:</label>";
          echo "<input type='text' name='localidad'  class='form-control' required>";
          echo " <label>Provincia : </label><br>";
          echo "<input type='text' name='provincia'  class='form-control' required>";
          echo " <label>CIF:</label>";
          echo  "<input type='number' name='cif'  class='form-control' required>";
          echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
          echo "</form>";
    }else{
      //si ya esta definida name "envia" me recoje los valores y los mete en variables
    $coddistribuidor=$_POST['coddistribuidor'];
    $nombre=$_POST['nombre'];
    $localidad=$_POST['localidad'];
    $provincia=$_POST['provincia'];

    $cif=$_POST['cif'];

//realizamos la consulta para insertar una columna a la tabla distribuidor
    $consulta_mysql2="INSERT INTO distribuidor (coddistribuidor,nombre,localidad,provincia,cif)
    VALUES  ( NULL,'$nombre','$localidad','$provincia','$cif')";

//si se ejecuta la consulta nos redirige a otra pagina sino sale el error
            if($connection->query($consulta_mysql2)==true){
           header('Location:distribuidor.php');

            }else{
                echo $connection->error;

            }
    }
            unset($connection);

    ?>

    </div>
    <?php
      include_once("../plantilla/foot.php");
    ?>
    </body>
    </html>
