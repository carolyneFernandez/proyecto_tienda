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
    <title>COLORES Y TALLAS</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/default.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      <?php
          include "../plantilla/cabeceradmin.php"
      ?>
      <?php
      //si esta definida la variable deta
      if(isset($_GET["deta"])){
        $deta=$_GET["deta"];
        //Crear la coneccion
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $connection->set_charset("utf8");


        $consulta2="SELECT producto.nombre, producto.codproducto, colores.nombrecolor, tallas.nombretalla FROM producto, colores, tallas WHERE tallas.idtalla IN(SELECT tallas FROM tallasproducto WHERE codproducto = $deta) AND producto.codproducto = $deta AND colores.idcolor IN(SELECT idcolor FROM colorproducto WHERE codproducto = $deta) ORDER BY colores.nombrecolor ASC";

     $result2=$connection->query($consulta2);
  ?>


  <div class="col-mod-10 cold-offset-1">

      <div class="nav nav-tabs well well-sm" style="text-aling:center;">
          <a href="cyt.php" ><img src="../admin/atras.jpg"  width=2% height=2%></a>
        <h5>Detalles del Producto</h5>
        <div class="table-responsive">
          <table style="margin-top:-1%,text-align:center;font-size:90%" class="table table-hover table-bordered">
            <tr style="font-weight:bold">
              <td>Nombre del Producto</td>
              <td>Talla disponible</td>
              <td>Color disponible</td>

            </tr>

            <?php

            //recorrer objetos
            while ($obj2=$result2->fetch_object()) {
              //pinta la filas

              echo "<tr>";
                echo "<td>$obj2->nombre</td>";
                echo "<td>$obj2->nombretalla</td>";
                echo "<td>$obj2->nombrecolor</td>";

              echo "</tr>";
            }
            ?>
          </table>
        </div>  <a href="cyt.php" ><img src="../admin/atras.jpg"  width=2% height=2%></a>
      </div>
  </div>
  <?php
  }
  ?>



    <div class="col-mod-10 cold-offset-1">
        <div class="nav nav-tabs well well-sm" style="text-aling:center;">

      <?php
      //consulta desde tallas hasta producto con la condicion que se muestre solo del codproducto selecccionado
      $consulta1="SELECT DISTINCT nombretalla ,p.codproducto,tp.tallas FROM tallas  t join tallasproducto tp  on
  tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto where p.codproducto=$deta order by nombretalla";

   $result1=$connection->query($consulta1);
   echo "<div class='cuerpo'>";
   echo "<center><form name='myform' action='eliminar-talla.php'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR TALLAS</legend>";
   $obj1=$result1->fetch_object();

    while ($obj1) {
   echo "<input type='hidden' name='producto' value='$obj1->codproducto'>";
    echo "<label class='radi'>";
    echo  "<input id='ta' type='radio' name ='talla' value='$obj1->tallas'>$obj1->nombretalla<br>";
    echo "</label>";
	$obj1=$result1->fetch_object();
    }
    echo "  </fieldset>";
    echo "<center><button type='submit' class='btn btn-danger'>ELIMINAR</button></center>";
    echo "  </form></center>";
   echo "</div>";?>

     <?php
     //consulta desde colores hasta producto con la condicion que se muestre solo del codproducto selecccionado
     $consulta3="SELECT DISTINCt nombrecolor,p.codproducto,cp.idcolor FROM  producto p join colorproducto cp on p.codproducto=cp.codproducto join
       colores c on c.idcolor=cp.idcolor where p.codproducto=$deta order by nombre";

   $result3=$connection->query($consulta3);
   echo "<div class='cuerpo'>";
  echo "<center><form name='myform1' action='eliminacolor.php'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR COLOR</legend>";
   $obj3=$result3->fetch_object();
   echo "<input type='hidden' name='producto' value='$deta'>";
       while ($obj3) {
   echo "<label class='radi' >";
   //como valor ponemos el id pero para mostrar el nombre
   echo  "<input id=color  type='radio'  name='color' value='$obj3->idcolor'>$obj3->nombrecolor<br>";

   echo "</label>";
	$obj3=$result3->fetch_object();
   }

   echo "  </fieldset>";
   echo "<center><button type='submit' class='btn btn-danger'>ELIMINAR</button></center>";

   echo "  </form><center>";
    echo "</div>";
  ?>
</div>
  </div>
  <div class="col-mod-10 cold-offset-1">
      <div class="nav nav-tabs well well-sm" style="text-aling:center;">

    <?php
    $consulta4="SELECT DISTINCT nombretalla ,tp.tallas FROM tallas  t join tallasproducto tp  on
tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto ";

 $result4=$connection->query($consulta4);

 echo "<div class='cuerpo'>";
 echo "<center><form name='myform' action='agrega-talla.php'  method='POST'>";
 echo "<fieldset>";
 echo "<legend>AGREGAR TALLAS</legend>";
 $obj4=$result4->fetch_object();
  while ($obj4) {
   echo "<input type='hidden' name='producto' value='$deta'>";
 echo "<label class='radi'>";
 echo  "<input id='ta'  type='radio'name ='talla' value='$obj4->tallas'>$obj4->nombretalla<br>";

 echo "</label>";
$obj4=$result4->fetch_object();

  }
  echo "  </fieldset>";
  echo "<center><button type='submit' class='btn btn-info'>AGREGAR</button></center>";
  echo "  </form></center>";
 echo "</div>";?>

   <?php
   $consulta3="SELECT DISTINCt nombrecolor,cp.idcolor FROM  producto p join colorproducto cp on p.codproducto=cp.codproducto join
     colores c on c.idcolor=cp.idcolor order by nombre";

 $result3=$connection->query($consulta3);
 echo "<div class='cuerpo'>";
echo "<center><form name='myform1' action='agregacolor.php'  method='POST'>";
 echo "<fieldset>";
 echo "<legend>AGREGAR  COLOR</legend>";
 $obj3=$result3->fetch_object();
 echo "<input type='hidden' name='producto' value='$deta'>";
 while ($obj3) {
 echo "<label class='radi' >";
 echo  "<input id=color type='radio'  name='color' value='$obj3->idcolor'>$obj3->nombrecolor<br>";
 echo "</label>";
$obj3=$result3->fetch_object();
 }

 echo "  </fieldset>";
 echo "<center><button type='submit' class='btn btn-info'>AGREGAR</button></center>";

 echo "  </form><center>";
  echo "</div>";
?>
</div>
</div>
<?php
  include_once("../plantilla/foot.php");
?>
    </body>
    </html>
