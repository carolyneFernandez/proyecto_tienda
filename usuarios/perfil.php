<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
	#tel{
	 margin-right:16px;
	}
</style>

</head>
<body>
	<?php
			include "../plantilla/header.php"
	?>

    <?php

      //CREATING THE CONNECTION
     $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      $connection->set_charset("utf8");?>
      <div class="container well">
        <div class="row">
            <div class="col-xs-12"><h2>Tu Perfil de Usuario</h2></div>
          </div>
        <br /><br />
        <?php
	    $consulta=("SELECT * FROM usuarios where Nombre='".$_SESSION['nombre']."' ");

      if ($result = $connection->query($consulta)) {


  $obj = $result->fetch_object();
      ?>
		<form  action="modificardatos.php" class="form-horizontal " method="POST">

				<div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Nombre del Usuario
                </label>
					    <div class="col-sm-2">
                  <input class="form-control" name="id" type="hidden"  value=<?php echo $obj->codusuario;?> >
					      <input class="form-control" type="text" name="nombre" value=<?php echo $obj->Nombre;?> disabled>
					    </div>
					  </div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Nombre</label>
					    <div class="col-sm-4">
					      <input  class="form-control" type="text" name="nombre" value=<?php echo $obj->Nombre;?>>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Apellidos</label>
					    <div class="col-sm-4">
					      <input class="form-control" type="text"  name="apellido" value=<?php echo $obj->apellido;?>>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="col-sm-2 control-label" id="tel"  name="telefono">Teléfono</label>

					    <div class="input-group col-sm-3">
					      <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
					      <input class="form-control" type="number"  name="telefono" value=<?php echo $obj->telefono;?>>

					    </div>
					  </div>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="formGroup ">Direccion</label>
								<div class="col-sm-4">
									<input class="form-control" type="text"  name="direccion" value="<?php echo $obj->direccion;?>">

								</div>
							</div>
							<div class="form-group">
									<label class="col-sm-2 control-label" for="formGroup">Localidad</label>
									<div class="col-sm-4">
										<input class="form-control" type="text"   name="localidad" value=<?php echo $obj->localidad;?>>
									</div>
								</div>
								<div class="form-group">
										<label class="col-sm-2 control-label" for="formGroup">Pais</label>
										<div class="col-sm-4">
											<input class="form-control" type="text" name="pais" value=<?php echo $obj->pais?>>
										</div>
									</div>



					  </div>


            <div class="form-group">
      				<label class="col-sm-2 control-label" for="formGroup"></label>
      				<div class="col-sm-4">

      			<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>



      				</div>
      			</div>
		</form>
    <?php
  }?>

</body>
</html>
