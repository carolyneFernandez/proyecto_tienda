<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/default.css">
</head>

<body>
  <?php
      include "../plantilla/cabeceradmin.php"
  ?>

  <div class="panel-group" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab"  id="header">
<h4 class="pannel-title"><center>
  AÑADE UN PRODUCTO
</center></h4>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
<div class="panel-body">
  <?php
  //creamos la coneccion
      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
  if($connection->connect_errno){
      printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
      exit();
  }
  //si no esta definida el input typo sumbit con el nombre envia
  //que me muestre el formulario
  if(!isset($_POST['envia'])){

  $consulta1="SELECT * FROM distribuidor";
 //creamos la query
       $result1=$connection->query($consulta1);
     echo "<form method='post' action='#' enctype='multipart/form-data'>";
  echo   "<div class='col-md-12'>";
   echo "<div class='col-md-6'>";
   ?>
   <div class="form-group">
     <label class="col-sm-4 control-label" for="formGroup">Nombre del  Distribuidor:</label>
     <div class="input-group col-sm-3">

       <?php

       echo "<select  name='coddistribuidor' ";

     while( $obj1 = $result1->fetch_object()){
       echo "<option value='$obj1->coddistribuidor' >$obj1->nombre</option>";
     }
     echo "</select><br>";
     ?>
     </div>
   </div>

 <div class="form-group">
   <label class="col-sm-4 control-label" for="formGroup">Nombre del Producto</label>
   <div class="input-group col-sm-3">

     <input class="form-control" type="text" name='nombre'  class='form-control ' required>
   </div>
 </div>

 <div class="form-group">
   <label class="col-sm-4 control-label" for="formGroup">Descripcion:</label>
   <div class="input-group col-sm-3">

     <textarea name='descripcion' style='width: 500px; height: 150px;' required></textarea>
   </div>
 </div>

 <div class="form-group">
   <label class="col-sm-4 control-label" for="formGroup">Stock :</label>
   <div class="input-group col-sm-3">
<?php
echo "<select name='stock' >";

//bucle que cuenta del 1 al 100 con un incremento de 1
for ($i=1; $i<=100; $i++)
{
        echo  "<option value= $i;>";
        echo $i;
        echo "</option>";
}

echo "</select><br>";
?>

   </div>
 </div>
 </div>
 <div class='col-md-6'>

    <div class="form-group">

   <label>Elige la Imagen del Producto</label><br>

      <input type='file' name='imagen' required><br>
</div>
<div class="form-group">
       <label>Categoria:</label>
  <select  name='categoria'>
    <?php
   //creamos la consulta
   $consulta="SELECT DISTINCT categoria FROM producto";
       $result=$connection->query($consulta);
 while( $obj = $result->fetch_object()){
   echo "<option value='$obj->categoria'>$obj->categoria</option>";
 }
 echo "</select><br>";
 echo "</div>";
 ?>
 <div class="form-group">

<label>Precio del Producto:</label>
<?php
echo"<select name='precio'>";
    //bucle que cuenta del 1 al 100 con un incremento de 1
for ($i=10; $i<=100; $i++)
{
        echo "<option value=$i>$i €</option>";
}
echo "</select><br>";
?>
</div>
<div class="form-group">

<label>Para quien es el producto (Mujer,Hombre,Niño):</label>

<input type='text' name='sexo'  class='form-control' style='width: 25%' required>
</div>



<input type='submit' name='envia' class='btn btn-success' value='Enviar'>
  </div>
</div>
  </form>
   <?php
 }else{
 //si ya esta definida name "envia" me recoje los valores y los mete en variables
 $codproducto=$_POST['codproducto'];
 $coddistribuidor=$_POST['coddistribuidor'];
 $nombre=$_POST['nombre'];
 $descripcion=$_POST['descripcion'];
 $stock=$_POST['stock'];
 //creamos la ruta donde queremos que suban las imagenes
 $dir_subida = '/var/www/html/proyecto_tienda/imagenes/';
 //basename devuelve el ultimo nombre de una ruta
 $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
 $imagen=$_FILES['imagen']['name'];
 var_dump($_POST);
 var_dump($_FILES);
 $categoria=$_POST['categoria'];
 $precio=$_POST['precio'];
 $sexo=$_POST['sexo'];
 //movemos el fichero imagen a donde se le a asignado
 if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
   echo "El fichero es válido y se subió con éxito.\n";
 } else {
   echo "¡Posible ataque de subida de ficheros!\n";
 }
 //se crea la consulta y si se realiza correctamente nos redirige a otra pagina
 $consulta_mysql2="INSERT INTO producto (codproducto,coddistribuidor,nombre,descripcion,stock,foto,categoria,precio,sexo)
 VALUES  ( NULL,'$coddistribuidor','$nombre','$descripcion','$stock','$imagen','$categoria','$precio','$sexo')";
    if($connection->query($consulta_mysql2)==true){
  header('Location:producto.php');
 }else{
   echo $connection->error;
 }
 }
       unset($connection);
 ?>

</div>
</div>
</div>

    </div>


  <?php
      include "../plantilla/foot.php"
  ?>
</body>
</html>
