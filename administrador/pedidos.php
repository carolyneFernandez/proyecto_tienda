<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="">

    <title></title>
</head>
  <body>
    <?php
        include "../plantilla/cabeceradmin.php"
    ?>
  <body>
    <?php

      //CREATING THE CONNECTION
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      $connection->set_charset("utf8");
      if ($result = $connection->query("SELECT * from usuarios u join  pedidos p  on
u.codusuario=p.codusuario join incluyen i on p.codpedido=i.codpedido join producto pro on i.codproducto=pro.codproducto;")) {



      ?>
<div class="container">


          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr class="info" >
              <th>Nombre del Cliente</th>
              <th>Fecha del pedido</th>
              <th>Direccion del pedido</th>
              <th>Cantidad de Producto</th>
              <th>Precio del Producto</th>
              <th>Importe total del pedido</th>

</tr>

          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {

              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->Nombre."</td>";
              echo "<td>".$obj->fechaemision."</td>";
                echo "<td>".$obj->direccion."</td>";
                  echo "<td>".$obj->cantidad."</td>";
                    echo "<td>".$obj->precio.'&nbsp€'."</td>";
                    echo "<td>".$obj->cantidad*$obj->precio.'&nbsp€'."</td>";

              echo "</tr>";

          }

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
  </table>
    </div>

  </body>
  </html>
