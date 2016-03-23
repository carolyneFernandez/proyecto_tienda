<?php
  include_once("../plantilla/db_configuration.php");
?>
<html>
<head><title>Registrate</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php
    include "../plantilla/temas.php"
    ?>
</head>
<body>
  <header>
    <?php
    include "../plantilla/header.php"
    ?>
  </header>
    <?php if(!isset($_POST["envia"])) : ?>

  <div class="container">

  <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
  		<form action="registro.php" method="post">
  			<h2>REGISTRATE <small>Registro gratis y rapido.</small></h2>
  			<hr class="colorgraph">
  			<div class="row">
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
                <input type="text" name="nombre"  class="form-control input-lg" placeholder="Nombre" tabindex="2">
		</div>
  				</div>
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
  						<input type="password" name="passwd" class="form-control input-lg" placeholder="Contraseña" tabindex="2">
  					</div>
  				</div>
  			</div>
        <div class="row">
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
                <input type="text" name="apellido"  class="form-control input-lg" placeholder="Apellido" tabindex="2">
		</div>
  				</div>
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
  						<input type="text" name="dni" class="form-control input-lg" placeholder="DNI" tabindex="2">
  					</div>
  				</div>
  			</div>
        <div class="row">
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
                <input type="text" name="localidad"  class="form-control input-lg" placeholder="Localidad" tabindex="2">
		</div>
  				</div>
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
  						<input type="text" name="provincia" class="form-control input-lg" placeholder="Provincia" tabindex="2">
  					</div>
  				</div>
  			</div>
        <div class="row">
  				<div class="col-xs-12 col-sm-6 col-md-6">
  					<div class="form-group">
                <input type="text" name="pais"  class="form-control input-lg" placeholder="Pais" tabindex="2">
		</div>
  				</div>
          <div class="form-group">
				<input type="text" name="direccion"  class="form-control input-lg" placeholder="Direccion" tabindex="4">
			</div>
  			</div>

  			<hr class="colorgraph">
  			<div class="row">
  				<div class="col-xs-12 col-md-6"><input type="submit"  name="envia" value="Enviar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>

  			</div>
  		</form>
  	</div>
  </div>

  </div>


  <?php
  include "../plantilla/foot.php"
  ?>
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
