<?php // content="text/plain; charset=utf-8"
include("../jpgraph/jpgraph.php");
include("../jpgraph/jpgraph_pie.php");
include("../../plantilla/db_configuration.php");
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}



$consulta="SELECT pro.nombre as nombre,sum(i.cantidad) as cantidad from
 incluyen i join producto pro on i.codproducto=pro.codproducto group by i.codproducto;";
$result=$connection->query($consulta);

       while($obj=$result->fetch_object()){

         $label[]=$obj->nombre;
          $data[]=$obj->cantidad;
        }
// Some data
// Create the Pie Graph.
$graph = new PieGraph(1300,600);
$graph->SetShadow();
//$graph->img->SetTransparent("white");



// Create plots
$size=0.30;
$p1 = new PiePlot($data);
$p1->SetLegends($label);
$p1->SetSize($size);

$p1->value->SetFont(FF_FONT0);

$graph->Add($p1);
$graph->Stroke();

?>
