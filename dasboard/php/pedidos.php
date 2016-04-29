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




       $consulta="SELECT COUNT(p.codpedido) as precio,DATE_FORMAT(p.fechaemision,'%M') as mes from pedidos p GROUP BY MONTH(p.fechaemision);";
       $result=$connection->query($consulta);


       while($obj=$result->fetch_object()){
         $label[]=$obj->mes;
         $datos[]=$obj->precio;
        }

        $grafico = new Graph(1200,500,"auto");
      	$grafico->SetScale("textlin");
        $grafico->xaxis->title->Set("MESES");
        $grafico->xaxis->SetTickLabels($label);
        $grafico->yaxis->title->Set("CANTIDAD");


      	$barplot1=new BarPlot($datos);
      	$barplot1->SetFillGradient("#BE81F7","#E3CEF6",GRAD_HOR);
      	$barplot1->SetWidth(80);

      	$grafico->Add($barplot1);
        $barplot1->value->Show();
      	$grafico->Stroke();
        $grafico->stroke("IMG2.PNG");



}
 ?>
