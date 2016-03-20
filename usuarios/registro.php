<?php
  include_once("../plantilla/db_configuration.php");
?>
<html>
<head><title>Registrate</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/entra.css">
</head>
<body>
  <header>
     <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
          <a class="navbar-brand" href="#">MODA carolyne</a>
    </div>
  </header>
    <?php if(!isset($_POST["envia"])) : ?>
<center>

      <div id="formulario">


  <form action="registro.php" method="post">
<label>Registrate gratis y rapido</label>
    <input type="text" name="nombre"  class="form-control" required placeholder="Nombre" style=width: 15%; >

    <input type="password" name="passwd" class="form-control" required placeholder="Contraseña" >

    <input type="text" name="apellido"  class="form-control" required placeholder="Apellidos" >

    <input type="text" name="dni"  class="form-control" required placeholder="DNI" >

    <input type="text" name="localidad" class="form-control" required placeholder="Localida" >

    <input type="text" name="provincia"  class="form-control" required placeholder="Provincia" >

    <input type="text" name="pais"  class="form-control" required placeholder="Pais" >

    <input type="text" name="direccion"  class="form-control" required placeholder="Direccion" ><br>
    <input type="submit" name="envia" class="btn btn-success"value="Enviar">
  </form>
    </div>
  </center>
<?php else: ?>




  <?php


    $nombre=$_POST['nombre'];
    $passwd=$_POST['passwd'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
  $localidad=$_POST['localidad'];
  $provincia=$_POST['provincia'];
$pais=$_POST['pais'];
    $direccion=$_POST['direccion'];

      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      if($connection->connect_errno)
      {
          printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
          exit();

      }
		$resultado = $connection->query("SELECT * FROM usuarios WHERE dni = '".$dni."'");
		if($resultado->num_rows > 0){
			header('location:index.php?mensaje=1');
		}else{


		$consulta="INSERT INTO `tienda`.`usuarios` (`codusuario`, `nombre`, `apellido`, `dni`, `localidad`, `provincia`, `pais`, `administrador`, `direccion`, `passwd`)
VALUES (NULL, '$nombre', '$apellido', '$dni', '$localidad', '$provincia', '$pais', '1', '$direccion', MD5('$passwd'))";
          if($connection->query($consulta)==true){

              header('Location:index.php?mensaje=2');

          }else{
              echo $connection->error;

          }
          unset($connection);
		}


      ?>
 <?php endif ?>

</body>
</html>
