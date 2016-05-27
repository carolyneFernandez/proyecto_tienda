<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="css/default.css">
  </head>
  <sytle>

  </sytle>
  <body style="background-image:url('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRF9qi4WRoBLE0OhgMbzmCgBtJ-oQRTWchhUCn3R3UObvm0BcRsTA');">

<header>
<img src="imagenes/logotipo/LOGO.png" style="margin-left: 42%;
    padding: 1%;">
</header>

		<hr class="colorgraph" style="margin-bottom: 0px;margin-top: 0px;">
    <div style="padding: 1%;background: #D8D8D8;">
<H2>ASISTENTE DE INSTALACIÓN</H2>
    </div>
    		<hr class="colorgraph" style="margin-bottom: 0px;margin-top: 0px;">
    <div  style="height: 100%;    padding-bottom: 3%;" id="contenido">

    <div class="row">
      <h4 style="text-align: left;color: black;font-weight: bold;margin-top: 5%;margin-left: 10%;">
        Configura tu Base de datos Rellenando los siguientes campos
      </h4>
      <p style="margin-left: 10%;text-align: left;color: black; margin-top: 5%; width: 55%;">
        Para usar Moda Carolyne,usted debe crear una base de datos para recolectar todas las actividades relacionadas con informacion de su
        tienda.
        Por favor ,rellena estos datos con el fin de que Moda Carolyne pueda conectarse a tu Base de Datos
      </p>
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    			<div class="row">
            <form method="post">
    				<div class="col-xs-12 col-sm-6 col-md-6">

              <label style="margin-top: 19%;margin-left: -184%;">Usuario de la base de datos</label>
                <input type="text" name="us" class="form-control input-lg " placeholder="Usuario" tabindex="2" style="margin-top: -12%;margin-left: 33%;" >
              <label  style="margin-left: -177%;margin-top: 19%;">Contraseña de la base de datos  </label>
                <input type="password" name="pw" class="form-control input-lg" placeholder="Contraseña" style="margin-top: -13%;margin-left: 33%;">
              <label  style="margin-left: -153%;margin-top: 27%;">Direccion de Servidor de la Base de Datos</label>
              <input type="text" name="lc" class="form-control input-lg" placeholder="LOCALHOST" style="margin-top: -17%;margin-left: 33%;">
              <label style="margin-top: 18%;margin-left: -184%;">Nombre de la base de datos</label>
              <input type="text" name="db" class="form-control input-lg" placeholder="NOMBRE_BASE" style="margin-top: -14%; margin-left: 34%;">
            </div>
            <label style="margin-top: 58%;float: left;margin-left: -33%;">
              <input type="checkbox" name="terms"> ACEPTA <a href="#">Terminos y Condiciones</a>.</label><br>
            <input type="submit" value="Sign up" class="btn btn-primary pull-left" style="margin-top: 64%;margin-left: -23%;">

    			</div>

        </div>
      </div>




        </form>
        <?php
          if(isset($_POST["us"])){
              $username=$_POST["us"];
              $password=$_POST["pw"];
              $database=$_POST["db"];
              $localhost=$_POST["lc"];
              $connection = new mysqli($localhost, $username, $password, $database);
                 //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }else{
                include("./database.php");
                $file = fopen("./plantilla/configuration_instalacion.php", "a");
                fwrite($file, "<?php"."\n");
                fwrite($file, "$"."username="."'".$username."';"."\n");
                fwrite($file, "$"."password="."'".$password."';"."\n");
                fwrite($file, "$"."database="."'".$database."';"."\n");
                fwrite($file, "$"."localhost="."'".$localhost."';"."\n");
                fwrite($file, "?>"."\n");
                fclose($file);
                unlink('instalacion.php');
                 unlink('database.php');
                 header('Location:./usuarios/');
              }
          }
        ?>
    </div>

    <section class="footer">

          <div class="row">
            <div class="col-lg-3  col-md-3 col-sm-3">
                <div class="footer_dv">
                    <h4>FORMAS DE PAGO</h4>


                   <img src="imagenes/tarjetas/1.png">
                  <img src="imagenes/tarjetas/2.png">
                    <img src="imagenes/tarjetas/3.jpg">
                  <img src="imagenes/tarjetas/4.jpg">

                  </div>
              </div>
              <div class="col-lg-3  col-md-3 col-sm-3">
                <div class="footer_dv">
                    <h4>SERVICIOS</h4>
                    <ul id="listas">
                        <li>Ropa de Mujer</li>
                          <li>Ropa de Hombre</li>



                      </ul>
                  </div>
              </div>
              <div class="col-lg-3  col-md-3 col-sm-3">
                <div class="footer_dv">
                    <h4>Contactanos</h4>
                    <ul id="listas">
                        <li>Calle Rafeael Beca Nº 15</li>
                          <li>LLAMANOS 684065028</li>



                      </ul>
                </div>
              </div>

              <div class="col-lg-3  col-md-3 col-sm-3">
                  <div class="footer_dv">
                      <h4>REDES SOCIALES</h4>
                      <a href="https://github.com/"><img src="imagenes/logotipo/1.png"></a>
                      <a href="https://github.com/"><img src="imagenes/logotipo/2.png"></a>
                      <a href="https://github.com/"><img src="imagenes/logotipo/4.gif"></a>
                      <a href="https://github.com/"><img src="imagenes/logotipo/5.png"></a>

                    </div>
              </div>

            </div>


    </section>


  </body>
</html>
