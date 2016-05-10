<?php
session_start();
        include("../jpgraph/jpgraph.php");
        include("../jpgraph/jpgraph_bar.php");
        include("../../plantilla/db_configuration.php");
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }else{



        $consulta="SELECT count(codpedido) as pedi ,DATE_FORMAT(fechaemision,'%M') as fecha  from pedidos where
         codusuario='".$_SESSION['codusuario']."' group by month(fechaemision);";

        $result=$connection->query($consulta);

               while($obj=$result->fetch_object()){

                 $datos[]=$obj->pedi;
                  $label[]=$obj->fecha;
                }

   $grafico = new Graph(1200,500,"auto");
 	$grafico->SetScale("textlin");

  $grafico->SetMargin(40,30,30,40);


   $grafico->xaxis->title->Set("MES");

   $grafico->xaxis->SetTickLabels($label);
   $grafico->yaxis->title->Set("CANTIDAD");



 	$barplot1=new BarPlot($datos);
 	$barplot1->SetFillGradient("orange","blue",GRAD_HOR);
 	$barplot1->SetWidth(80);

 	$grafico->Add($barplot1);
$barplot1->value->Show();
 $grafico->Stroke();

 }
  ?>
