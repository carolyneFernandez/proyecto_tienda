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



        $consulta="select count(codusuario) as usuario  from usuarios;";
        $consulta1="select count(codpedido)  as pedido from pedidos;";
        $consulta2="select count(codproducto)  as producto from producto;";
        $consulta3="select count(coddistribuidor)  as distribuidor from  distribuidor;";
        $result=$connection->query($consulta);
        $result1=$connection->query($consulta1);
        $result2=$connection->query($consulta2);
        $result3=$connection->query($consulta3);
               while($obj=$result->fetch_object()){
                   $label[]="USUARIOS";
                  $datos[]=$obj->usuario;
                }
                while($obj1=$result1->fetch_object()){

                   $label[]="PEDIDO";
                   $datos[]=$obj1->pedido;
                 }

                 while($obj2=$result2->fetch_object()){

                    $label[]="PRODUCTO";
                    $datos[]=$obj2->producto;
                  }

                  while($obj3=$result3->fetch_object()){

                     $label[]="DISTRIBUIDOR";
                     $datos[]=$obj3->distribuidor;
                   }

                   while($obj1=$result1->fetch_object()){

                      $label[]="PEDIDO";
                      $datos[]=$obj1->pedido;
                    }




   $grafico = new Graph(1200,500,"auto");
 	$grafico->SetScale("textlin");
  // Ajustamos los margenes del grafico-----    (left,right,top,bottom)
  $grafico->SetMargin(40,30,30,40);

  $grafico->title->Set('Cuanta ropa existe en cada categoria');



   $grafico->xaxis->title->Set("CATEGORIA");
   $grafico->xaxis->SetTickLabels($label);
   $grafico->yaxis->title->Set("CANTIDAD");

   $grafico->title->SetFont(FF_FONT1,FS_BOLD);
   $grafico->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
   $grafico->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

 	$barplot1=new BarPlot($datos);

 	$barplot1->SetFillGradient("#FE2E2E","#08088A",GRAD_HOR);
 	$barplot1->SetWidth(80);

 	$grafico->Add($barplot1);
    $barplot1->value->Show();
 $grafico->Stroke();


 }
  ?>
