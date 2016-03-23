<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    </head>
    <body>
      <?PHP

       //DECLARAMOS LAS VARIABLES QUE VAMOS A UTILIZAR EN LA CONSULTA Y LES ASIGNAMOS EL VALOR DEL FORMULARIO
       $usuario = $_POST['usuario'];
       $password = $_POST['pass'];

       //CREAMOS LA VARIABLE CON LA CADENA DE LA CONSULTA
       $consulta = "SELECT * FROM usuarios WHERE nombre = '".$usuario."' AND passwd = '".md5($password)."'";


       //AHORA DEBEMOS REALIZAR UNA CONEXIÓN A LA BASE DE DATOS
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
       $resultado = $connection->query($consulta);


       if($resultado->num_rows > 0){
           session_start();
            //Coge los datos devueltos por la consulta.
        while ($fila = $resultado->fetch_assoc()){


         //creamos las session
           $_SESSION["nombre"] = $fila["Nombre"];
              $_SESSION["estilo"] = $fila["estilo"];
           $_SESSION["administrador"]=$fila["administrador"];
           $_SESSION["codusuario"]=$fila["codusuario"];


            if($_SESSION["administrador"]==="0"){
              header("Location: ../administrador/administrador.php");

            }else{
             header("Location: index.php");
            }

        }
      }

include("../plantilla/alert.php");
       unset($connection);


      ?>

    </body>
</html>
