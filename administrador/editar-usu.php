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

    echo "<form method='post' action='#'>";
    ?>
    <div class="panel-group" role="tablist" aria-multiselectable="true" style="height: 430px;margin-top: 5%;">
<div class="panel panel-default">
<div class="panel-heading" role="tab"  id="header">
  <?php
  echo "<h4 class='pannel-title' style='text-transform: uppercase'>";

  echo "<center>

<b>EDITAR LOS DATOS PERSONALES DE $obj->Nombre</b>  </center>";

echo "</h4>";
  ?>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" >
<div class="panel-body">
  <div class="col-md-12">

<div class="col-md-6">


    <div class="form-group">
          <label class="col-sm-4 control-label" for="formGroup">Nombre del Usuario
            </label>
          <div class="input-group col-sm-4">
              <input class="form-control" name="id" type="hidden"  value=<?php echo $obj->codusuario;?> >
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text" name="nombre" value=<?php echo $obj->Nombre;?> disabled>
          </div>
        </div>
        <div class="form-group">
              <label class="col-sm-4 control-label" for="formGroup">Nombre del Usuario
                </label>
              <div class="input-group col-sm-4">

                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input  class="form-control" type="text" name="nombre" value=<?php echo $obj->Nombre;?>>
              </div>
            </div>


        <div class="form-group">
          <label class="col-sm-4 control-label" for="formGroup">Apellidos</label>
          <div class="input-group col-sm-4">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text"  name="apellido" value="<?php echo $obj->apellido?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label" for="formGroup">DNI</label>
          <div class="input-group col-sm-4">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text"  name="dni" value="<?php echo $obj->dni?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label" for="formGroup">Provincia</label>
          <div class="input-group col-sm-4">
            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
            <input class="form-control" type="text"  name="provincia" value="<?php echo $obj->provincia?>">
          </div>
        </div>
</div>
<div class="col-md-6">


        <div class="form-group">
          <label class="col-sm-4 control-label" for="formGroup"  >Telefono</label>

          <div class="input-group col-sm-4">
            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            <input class="form-control" type="number"  name="telefono" value=<?php echo $obj->telefono;?>>

          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="formGroup ">Direccion</label>
              <div class="input-group col-sm-4">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
              <input class="form-control" type="text"  name="direccion" value="<?php echo $obj->direccion;?>">

            </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4 control-label" for="formGroup">Localidad</label>
                <div class="input-group col-sm-4">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                <input class="form-control" type="text"   name="localidad" value=<?php echo $obj->localidad;?>>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="formGroup">Pais</label>
                <div class="input-group col-sm-4">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                  <input class="form-control" type="text" name="pais" value=<?php echo $obj->pais?>>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label" for="formGroup"></label>
                <div class="input-group col-sm-4">

            <input type='submit' name='envia' class='btn btn-success' value='GUARDAR'>


                </div>
              </div>

        </div>

</div>
</form>
</div>
</div>
</div>

      </div>

    <?php

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
          $id=$_POST['id'];
          header("Location:editar-usu.php?id=$id");

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
