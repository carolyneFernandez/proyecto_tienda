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



        $consulta="SELECT count(categoria) AS CANTIDAD,categoria  from producto group by categoria;";
        $result=$connection->query($consulta);

               while($obj=$result->fetch_object()){

                 $datos[]=$obj->CANTIDAD;
                  $label[]=$obj->categoria;
                }
                $width=400;
                $height=500;

                // Set the basic parameters of the graph
                $graph = new Graph($width,$height);
                $graph->SetScale('textlin');

                $top = 60;
                $bottom = 30;
                $left = 80;
                $right = 30;
                $graph->Set90AndMargin($left,$right,$top,$bottom);
                $graph->xaxis->SetLabelAlign('right','center','right');

                // Label align for Y-axis
                $graph->yaxis->SetLabelAlign('center','bottom');

                $graph->xaxis->SetTickLabels($label);
                $graph->title->Set('PRENDAS POR CATEGORIA');

                // Create a bar pot
                $bplot = new BarPlot($datos);
                $bplot->SetFillColor('orange');
                $bplot->SetWidth(0.8);
                $bplot->SetYMin(1);

                $graph->Add($bplot);
  $bplot->value->Show();
                $graph->Stroke();



 }
  ?>
