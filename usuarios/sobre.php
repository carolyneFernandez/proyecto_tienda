<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
  session_start();
   $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}

?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaquetas de mujer</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

      <?php
      include "../plantilla/temas.php"
      ?>
    </head>

  <?php
  include "../plantilla/header.php"
  ?>

  <?php

  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
  if ($connection->connect_errno) {
  printf("Connection failed: %s\n", $connection->connect_error);
  header('location: index.php');

  }
  $connection->set_charset("utf8");
  $consulta=("SELECT * from producto;");

  $result = $connection->query($consulta);

  if (isset($result) && $result->num_rows==0) {
  echo "<p>
  No existen productos en la categoria indicada.
  </p>";
  } else {
  ?>
  <div class="container">
    <div class="col-md-12" id="parrafocenter">

    <h2 style="color:yellow">¿Quienes Somos?</h2>
    <p>
      En Moda Carolyne, la mayor tienda online europea, encontrarás una gran selección de ropa, zapatos
      y accesorios que harán las delicias de las más fashionistas. Cada día tenemos nuevos artículos y una gran
      cantidad de novedades para que, busques lo que busques, lo encuentres. Como ves, nos encanta la moda y para
      ello hacemos posible que las nuevas tendencias tengan cabida en nuestro catálogo. Si, por el contrario no te
      interesan tanto las últimas tendencias y prefieres encontrar ropa, zapatos o complementos a un precio más asequible,
       en nuestra sección de ofertas los podrás encontrar.

      En Moda Carolyne también disponemos de ropa para cualquier tipo de ocasión. Si quieres ir a una fiesta,
      disponemos de una gran colección de vestidos de fiesta entre los que elegir. Y no solo eso, si no que si
      estás buscando vestidos hechos de un material concreto, o para una ocasión especial, disponemos de una guía
      de vestidos online donde los agrupamos para que te sea más fácil encontrarlos. Descubre también las últimas colecciones
      tanto para irte de festival, para irte a la playa de vacaciones, o si prefiereres los deportes de invierno, para irte a esquiar.

      Seas como seas y para lo que necesites,Moda Carolyne te ofrece la ayuda perfecta para que encuentres ese jersey, esas
       zapatillas o esas gafas de sol que estabas buscando. Por ejemplo, si necesitas unos cuantos consejos y saber qué llevar
       a una entrevista de trabajo, en nuestra tienda online los podrás encontrar, ya necesites un outfit más tradicional,
       uno más fashionista o uno para trabajar en una start up. Además, si te gusta la moda vaquera o tu estilo es más casual
       que deportivo o más clásico que trendy, ten por seguro que en Moda Carolyne tenemos la solución a tus problemas.


    </p>
    </div>
<center>
  <H2>CONOCE NUESTROS PRODUCTOS</H2>

</center>


  <div class="row">
  <?php
  while($obj = $result->fetch_object()) {
  echo "<div class='col-md-3' id='sobre'>";

    echo "<img src='../imagenes/$obj->foto' class='img-circle' alt='Cinque Terre' width='190' height='190' >";

?>


  </div>

  <?php } ?>
  </div>
  </div>
  <?php
  include "../plantilla/foot.php"
  ?>
  <?php
  }

  ?>

  </body>
  </html>
