<?php
include_once("../plantilla/db_configuration.php");
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($result = $connection->query("SELECT * FROM distribuidor;")){

?>
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
  <div class="container" id="titulo">
  <center><h1 class="titulo-blog" >MODA CAROLYNE</h1>
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


<div class="col-xs-3" id="div" style="width: 22%">
   <div class="thumbnail" style="
   border: 1px solid black;">

      <div class="caption">
          <h3 class="nombres">TODA ROPA DE MUJER</h3>
              <p>Tenemos infinidad de Ropa Para Mujer Accede para Verla
              </p>
          <p>
          <img src="../imagenes/blusa1.jpg"  style="width: 100%">

          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3" id="div" style="width:21.5%">
    <div class="thumbnail" style="
    border: 1px solid black;">

       <div class="caption">
           <h3 class="nombres">TODA ROPA DE HOMBRE</h3>
               <p>Tenemos la ropa de Moda para los Hombres de ahora
               </p>
           <p>
           <img src="../imagenes/chaquetah2.jpg" style="width: 100%">

           </p>
       </div>
    </div>
  </div>

  <div class="col-xs-3" id="div" style="width: 26%">
     <div class="thumbnail" style="
     border: 1px solid black;">

        <div class="caption">
            <h3 class="nombres">PROXIMAMENTE </h3>
                <p>Proximamente Ropa para los Peques y consentidos de la Casa
                </p>
            <p>
            <img src="../imagenes/bebe.jpg"  style="width: 100%">

            </p>
        </div>
     </div>
   </div>

</div>

<?php
include "../plantilla/foot.php"

?>
</body>
</html>
<?php
}else{
  printf("Connection failed: %s\n", $connection->connect_error);
   header('Location: ../instalacion.php');
}
?>
