<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <a href="#" class="navbar-brand" >MODA CAROLYNE</a>
<div class="collapse navbar-collapse" id="navegacion">
<ul class="nav navbar-nav">
  <li><a href="administrador.php">USUARIOS</a></li>
  <li><a href="producto.php">PRODUCTOS</a></li>
  <li><a href="pedidos.php">PEDIDOS</a></li>
  <li><a href="distribuidor.php">DISTRIBUIDOR</a></li>
  <li><a href="cyt.php">COLORES Y TALLAS</a></li>
    <li><a href="../usuarios/index.php">PAGINA PRINCIPAL</a></li>
</ul>
<?PHP

if(isset($_SESSION['nombre']) && $_SESSION['nombre'] != ''){

?>

<div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>
          <?PHP
          echo $_SESSION['nombre']; ?></b> <span class="caret"></span></a>
          <ul class='dropdown-menu' style='width:100px;'>
              <li>
                <div class='collapse navbar-collapse'>
                  <ul class='nav navbar-nav'>
                    <li><a href='../usuarios/perfil.php'><span class='glyphicon glyphicon-user'></span>
                      Ver perfil
                    </a>
                    </li>
                  
                    <li><a href='../plantilla/cerrar.php'>
                    <span class='glyphicon glyphicon-log-in'></span>Cerrar sesion
                    </a>
                    </li>
                  </ul>
                </div>
              </li>
          </ul>

      </li>
    </ul>


<?PHP
}else{
?>
<div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
    <ul id="login-dp" class="dropdown-menu">
      <li>


              <form method="POST"  action="login.php">
                  <div class="form-group">

                     <input type="text" class="form-control" name="usuario"  required>
                  </div>
                  <div class="form-group">

                     <input type="password" class="form-control" name="pass"  required>

                  </div>
                  <div class="form-group">

                     <input type="submit" class="btn btn-primary btn-block" value="entrar"/>
                  </div>

               </form>
            </div>
<?php
}
?>
         </div>

</div>
</nav>

</header>
