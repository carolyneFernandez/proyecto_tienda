<?php // fichero de la libreria
include("../jpgraph/jpgraph.php");
//fichero de tipo de grafico tipo pie(redondo)
include("../jpgraph/jpgraph_pie.php");
//fichero de conexion de base de datos
include("../../plantilla/db_configuration.php");
//conexion de base de datos
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

//comprobacion de la conexion
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//consulta de la base de datos para que me muestre los pedidos mas comprados


$consulta="SELECT pro.nombre as nombre,sum(i.cantidad) as cantidad from
 incluyen i join producto pro on i.codproducto=pro.codproducto group by i.codproducto;";
$result=$connection->query($consulta);

//añadimos los valores de nombre del producto y a cantidad de el
       while($obj=$result->fetch_object()){

         $label[]=$obj->nombre;
          $data[]=$obj->cantidad;
        }
//creacion un div con el grafico
$graph = new PieGraph(1300,600);

// tamaño del grafico
$size=0.30;
//creacion del grafico con los valores
$p1 = new PiePlot($data);
$p1->SetLegends($label);
$p1->SetSize($size);
//formato del %
$p1->value->SetFont(FF_FONT0);
//añade al grafico el objeto pie
$graph->Add($p1);
//Se muestra el grafico
$graph->Stroke();

?>
