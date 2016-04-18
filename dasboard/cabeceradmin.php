<header>


<nav class="navbar navbar-inverse navbar-static-top" role="navigation"  id="cabeza">
  <a href="#" class="navbar-brand" >MODA CAROLYNE</a>
<div class="collapse navbar-collapse" id="navegacion">
<ul class="nav navbar-nav">
  <li><a href="../administrador/administrador.php">USUARIOS</a></li>
  <li><a href="../administrador/producto.php">PRODUCTOS</a></li>
  <li><a href="../administrador/pedidos.php">PEDIDOS</a></li>
  <li><a href="../administrador/distribuidor.php">DISTRIBUIDOR</a></li>
  <li><a href="../administrador/cyt.php">COLORES Y TALLAS</a></li>
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ESTADISTICAS</a>
    <ul class="dropdown-menu">
        <li>
          <a href="../dasboard/general.php">Datos Generales</a>
        </li>
        <li>
          <a href="../dasboard/evousuarios.php">Datos de Usuarios</a>
        </li>
        <li>
          <a href="../dasboard/pedidomascomprado.php">Producto mas comprado</a>
        </li>
        <li>
          <a href="../dasboard/pedidos.php">Pedidos</a>
        </li>
        <li>
          <a href="../dasboard/productos.php">Producto</a>
        </li>
      </ul>


    </li>
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
