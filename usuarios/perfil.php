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
    <?php
    include "../plantilla/temas.php"
    ?>
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

      <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">DATOS PERSONALES</a></li>

  <li><a data-toggle="tab" href="#menu1">PEDIDOS</a></li>




<?php
if($_SESSION["administrador"]!="0"){?>
  <li><a data-toggle="tab" href="#menu2">TEMAS</a></li>
  <?php  }?>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">

    <div  style="
    height: 360px;
    margin-bottom: 0px;
    ">


      <br /><br />
      <?php
    $consulta=("SELECT * FROM usuarios where Nombre='".$_SESSION['nombre']."' ");

    if ($result = $connection->query($consulta)) {


$obj = $result->fetch_object();
    ?>
  <form  action="modificardatos.php" class="form-horizontal " method="POST">
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
            <label class="col-sm-4 control-label" for="formGroup">Nombre</label>
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
            <label class="col-sm-4 control-label" for="formGroup"  >Teléfono</label>

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

                <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>



                  </div>
                </div>

          </div>

</div>
</div>
  </form>
  <?php
}?>

  </div>
  <div id="menu1" class="tab-pane fade">
    <?php
      include_once("../plantilla/db_configuration.php");
    ?>

    <?php

       $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        header('location: index.php');

    }


$connection->set_charset("utf8");
if ($result1 = $connection->query("SELECT * from usuarios u join  pedidos p  on
u.codusuario=p.codusuario join incluyen i on p.codpedido=i.codpedido join producto pro on i.codproducto=pro.codproducto
where u.Nombre='".$_SESSION['nombre']."'")){



?>

<div style="
margin-bottom: 0px;">


    <!-- PRINT THE TABLE AND THE HEADER -->
    <table style="width: 96%;" class="table table-bordered table-hover table-condensed" id="pedido">
    <thead>
      <tr class="info" >
        <th colspan="4">
          <CENTER>
              TABLA DE USUARIOS
          </CENTER>

        </th>
              <th colspan="2">
                <CENTER>
                  DESCARGAR PDF<a href="../pdf/perfil.php" ><span class="glyphicon glyphicon-download-alt"></span></a>
                </CENTER>

        </th>
      </tr>
      <tr class="info" >
        <th>Nombre del Cliente</th>
        <th>Fecha del pedido</th>
        <th>Direccion del pedido</th>
        <th>Cantidad de Producto</th>
        <th>Precio del Producto</th>
        <th>Importe total del pedido</th>

</tr>

    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while($obj1 = $result1->fetch_object()) {

        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td>".$obj1->Nombre."</td>";
        echo "<td>".$obj1->fechaemision."</td>";
          echo "<td>".$obj1->direccion."</td>";
            echo "<td>".$obj1->cantidad."</td>";
              echo "<td>".$obj1->precio.'&nbsp€'."</td>";
              echo "<td>".$obj1->cantidad*$obj1->precio.'&nbsp€'."</td>";

        echo "</tr>";

    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
</table>
</div>
</div>
  <div id="menu2" class="tab-pane fade">

        <div class="container well " style="
        margin-bottom: 0px;">

        <div class="panel-group" role="tablist" aria-multiselectable="true">
          <div class="panel-group" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
          <div class="panel-heading" role="tab"  id="header">
          <h4 class="pannel-title"><center>
          ELIGE UN TEMA
          </center></h4><p>
            <center>

            Echale un vistazo  a tus pedidos en nuestra Tienda Online </center>
          </p>
          </div>
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
        $connection->set_charset("utf8");

      $consulta=("SELECT * FROM usuarios where Nombre='".$_SESSION['nombre']."' ");

      if ($result = $connection->query($consulta)) {


      $obj = $result->fetch_object();

      ?>
          <form  action="modificatemas.php" class="form-horizontal " method="POST" style="margin: 3%;">
            <form>
                <input class="form-control" name="id" type="hidden"  value=<?php echo $obj->codusuario;?> >
              <div style="display: inline;margin: 5%;">
                  <input type="radio" name="procesar" value="0" > <img class="zoom"  src="../imagenes/plantillas/default.png" height="142" width="142">
              </div>
              <div  style="margin: 9%;display: inline;">
                      <input type="radio" name="procesar" value="1"><img class="zoom" src="../imagenes/plantillas/plantilla1.png" height="142" width="142">
              </div>
              <div style="margin-left: 3%;display: inline;">
                <input type="radio" name="procesar" value="2"><img class="zoom"  src="../imagenes/plantillas/plantilla2.png" height="142" width="142">

              </div>




      <button type="submit" class="btn btn-primary" style="margin-left: 50%;float: left;margin-top: 4%;">MODIFICA</button>

    </form>
    </form>
    <?php
}else{

}?>
  </div>
</div>
  </div>
</div>
</div>
</div>

<?php
include "../plantilla/foot.php"
?>
</body>
</html>
