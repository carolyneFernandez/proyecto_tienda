<?php
session_start();
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0 maximum-scale=1.0,minimum-scale=1.0">
    <title>Moda carolyne </title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php
    include "../plantilla/temas.php"
    ?>

  </head>
    <body>

      <?php
      include "../plantilla/header.php"
      ?>
      <?php
      //include "../plantilla/logeado.php"
      ?>
<seccion class="jumbotron">
  <div class="container">
  <center><h1 class="titulo-blog">MODA CAROLYNE</h1>
    <p>
      Toda la ropa de Temporada y de la mejor calidad
    </p>

  </center>
  </div>
</seccion>
<div class="container">
  <br>
  <div class="col-md-12">
    <div id="micarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicadores -->
      <ol class="carousel-indicators">
        <li data-target="#micarousel" data-slide-to="0" class="active"></li>
        <li data-target="#micarousel" data-slide-to="1"></li>
        <li data-target="#micarousel" data-slide-to="2"></li>

      </ol>
<!--contenedor del carrusel-->
      <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="../carrusel/1.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="../carrusel/2.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="../carrusel/3.jpg" alt="Flower">
          </div>
        </div>

<!--controles-->
<a class="left carousel-control" href="#micarousel" role="button" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
 </a>
 <a class="right carousel-control" href="#micarousel" role="button" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
 </a>
    </div>
  </div>
</div>
<?php
include "../plantilla/foot.php"
?>
</body>
</html>
