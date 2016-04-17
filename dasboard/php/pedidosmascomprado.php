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

 $grafico->Stroke();


 }
  ?>
