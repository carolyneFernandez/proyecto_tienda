<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php

    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html>
  <head>

      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../css/default.css">

    <title></title>

</head>
  <body>
    <?php
        include "../plantilla/cabeceradmin.php"
    ?>
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
      if ($result = $connection->query("SELECT * FROM usuarios;")) {//si se ejecuta la consulta



      ?>
      <div class="container" id="divcolores">
        <!-- PINTA LA CABECERA DE LA TABLA -->
        <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed" >
        <thead>
          <tr class="info" >
            <th colspan="11">
              TABLA DE USUARIOS
            </th>
            <th>
            DESCARGAS<a href="../pdf/usuarios.php" ><span class="glyphicon glyphicon-download-alt"></span></a>
            </th>
          </tr>
          <tr class="info" >
            <th>CodCliente</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Localidad</th>
            <th>Provincia</th>
            <th>Pais</th>
            <th>Adminstrador</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>

        </thead>

      <?php

        //hacemos un bucle con el resultado del fetch_object

        while($obj = $result->fetch_object()) {
            //Printamos las filas
            echo "<tr>";
            echo "<td>".$obj->codusuario."</td>";
            echo "<td>".$obj->Nombre."</td>";
            echo "<td>".$obj->apellido."</td>";
            echo "<td>".$obj->dni."</td>";
            echo "<td>".$obj->localidad."</td>";
            echo "<td>".$obj->provincia."</td>";

            echo "<td>".$obj->pais."</td>";
            echo "<td>".$obj->administrador."</td>";
            echo "<td>".$obj->direccion."</td>";
            echo "<td>".$obj->telefono."</td>";
            //echo "<td>".$obj->estado."</td>";

            echo "<td><center><a href='editar-usu.php?id=$obj->codusuario'><img class='usu' src='../admin/1.png'></center></td>";
            echo "<td><center><a href='eliminar-usu.php?id=$obj->codusuario'><img  class='usu' src='../admin/eliminar.jpg'></center></td>";
            echo "</tr>";
        }

        //cerramos la variable result,obj y la coneccion de la base de datos
        $result->close();
        unset($obj);
        unset($connection);


      }
      ?>
    </table>
    </div>
      <?php
          include "../plantilla/foot.php"
      ?>
  </body>
</html>
