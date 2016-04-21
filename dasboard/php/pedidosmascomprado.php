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



$consulta="SELECT pro.nombre as nombre,sum(i.cantidad) as cantidad from incluyen i join producto pro on i.codproducto=pro.codproducto group by i.codproducto;";
$result=$connection->query($consulta);

       while($obj=$result->fetch_object()){

         $label[]=$obj->nombre;
          $data[]=$obj->cantidad;
        }



// Some data


// Create the Pie Graph.
$graph = new PieGraph(1065,300);
$graph->SetShadow();

// Set A title for the plot
$graph->title->Set("PRODUCTOS MAS VENDIDOS");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Create plots
$size=0.30;
$p1 = new PiePlot($data);
$p1->SetLegends($label);
$p1->SetSize($size);
$p1->SetCenter(0.50,0.32);
$p1->value->SetFont(FF_FONT0);

$graph->Add($p1);
$graph->Stroke();

?>
<?php

        include("../jpgraph/jpgraph.php");
        include("../jpgraph/jpgraph_bar.php");
        include("../../plantilla/db_configuration.php");
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }else{



        $consulta="SELECT pro.nombre as nombre,sum(i.cantidad) as cantidad from incluyen i join producto pro on i.codproducto=pro.codproducto group by i.codproducto;";
        $result=$connection->query($consulta);

               while($obj=$result->fetch_object()){

                 $datos[]=$obj->nombre;
                  $label[]=$obj->cantidad;
                }
   $grafico = new Graph(1500,500,"auto");
 	$grafico->SetScale("textlin");
   $grafico->xaxis->title->Set("Cantidad de Venta");
   $grafico->xaxis->SetTickLabels($datos);
   $grafico->yaxis->title->Set("Producto");


 	$barplot1=new BarPlot($label);
 	$barplot1->SetFillGradient("#BE81F7","#E3CEF6",GRAD_HOR);
 	$barplot1->SetWidth(80);

 	$grafico->Add($barplot1);
$barplot1->value->Show();
 $grafico->Stroke();


 }
  ?>
