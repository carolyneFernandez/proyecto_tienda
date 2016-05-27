<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html style="background-image: url('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRF9qi4WRoBLE0OhgMbzmCgBtJ-oQRTWchhUCn3R3UObvm0BcRsTA');">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/default.css">

    <title></title>
</head>
  <body>
    <?php
        include "../plantilla/cabeceradmin.php"
    ?>

<body>
  <div class="panel-heading" role="tab"  id="header" style="
    background: lightgray;
    border: 1px solid;
">
    <h4 class="pannel-title"><center>
      EDITAR PRODUCTO
    </center></h4>
  </div>



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
   $consulta=("SELECT * FROM producto where codproducto=$id");

    $result=$connection->query($consulta);
    $obj = $result->fetch_object();
    ?>
    <div style="margin-left: 5%;width: 50%;float: left;">
    <?php
    echo "<form method='post' action='#'>";
    echo  "<input type='hidden' name='codproducto'  value='$obj->codproducto' class='form-control'>";
    echo  "<input type='hidden' name='coddistribuidor'  value='$obj->coddistribuidor' class='form-control'>";
    echo " <label style='margin-top: 3%;'>Nombre del Producto:</label><br>";
    echo "<input type='text' name='nombre'  value='$obj->nombre' class='form-control' style='width: 70%;'>";



  $consulta1="SELECT * FROM distribuidor";

       $result1=$connection->query($consulta1);


     echo " <label style='margin-right: 1%;margin-top: 2%;'>Nombre del  Distribuidor:</label>";
   echo "<select  name='coddistribuidor'>";
 while( $obj1 = $result1->fetch_object()){
   echo "<option value='$obj1->coddistribuidor'>$obj1->nombre</option>";
 }
 echo "</select><br>";

    echo " <label style='margin-top: 2%;'>Descripcion:</label> <br>";
    echo "<textarea name='descripcion' style='width: 500px; height: 150px;' >$obj->descripcion</textarea> <br>";

    echo " <label style='margin-top: 2%;'> Stock:</label>";
    echo  "<input type='numer' name='stock'  value='$obj->stock' class='form-control' style='width: 23%;'>";
echo "</div>";
  ?>
    <div style="background-image: url('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRF9qi4WRoBLE0OhgMbzmCgBtJ-oQRTWchhUCn3R3UObvm0BcRsTA');">
<?php

    echo " <label style='margin-top: 2%;'>Categoria:</label>";
    echo  "<input type='text' name='categoria'  value='$obj->categoria' class='form-control' style='width: 23%;'>";
    echo " <label style='margin-top: 2%;'>Precio:</label>";
    echo  "<input type='text' name='precio'  value='$obj->precio' class='form-control' style='width: 23%;'>";
    echo " <label style='margin-top: 2%;'>Sexo:</label>";
    echo  "<input type='text' name='sexo'  value='$obj->sexo' class='form-control' style='margin-bottom: 1%;width: 23%;'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
  echo "</form>";
      echo "<a href='producto.php'><input type='submit'  class='btn btn-info' value='ATRAS' style='margin-left: 9%;'></a>";
  echo "</div>";


}else{
//creamos las variables
$codproducto=$_POST['codproducto'];
$coddistribuidor=$_POST['coddistribuidor'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$stock=$_POST['stock'];
$foto=$_POST['foto'];
$categoria=$_POST['categoria'];
$precio=$_POST['precio'];
$sexo=$_POST['sexo'];
//actualizamos los datos con los introducidos
$consulta_mysql2="UPDATE producto SET coddistribuidor='".$coddistribuidor."',nombre='".$nombre."',
descripcion='".$descripcion."',stock='".$stock."',
categoria='".$categoria."',precio='".$precio."',sexo='".$sexo."' WHERE codproducto=$codproducto;";

        if($connection->query($consulta_mysql2)==true){
          $codproducto=$_POST['codproducto'];
          header("Location:editar-producto.php?id=$codproducto");

        }else{
            echo $connection->error;

        }
}
        unset($connection);

?>

</div>
</body>
</html>
