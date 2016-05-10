<header>
     <nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="cabeza">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" >MODA carolyne</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="../usuarios/index.php">INICIO</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            MUJERES<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="chaqueta_mujer.php">Chaquetas</a> </li>
            <li class="divider"></li>
             <li><a href="sudadera-mujer.php">Sudadera</a> </li>
              <li class="divider"></li>
              <li><a href="pantalon-mujer.php">Vaqueros</a> </li>
              <li class="divider"></li>
              <li><a href="blusa-mujer.php">Blusas</a> </li>
          </ul>

        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            HOMBRE<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="chaqueta-hombre.php">Chaquetas</a> </li>
            <li class="divider"></li>

              <li><a href="pantalon-hombre.php">Vaqueros</a> </li>

          </ul>

        </li>

        <li><a href="sobre.php">SOBRE NOSOTROS</a></li>
        <li><a href="ubicacion.php">COMO LLEGAR</a></li>
        <?php
              if(isset($_SESSION['nombre']) && $_SESSION['nombre'] != ''){ ?>
        <li><a href="estadisticas.php">ESTADISTICAS GENERALES</a></li>
          <?php
        }else {}?>
        <li>
      <?PHP
      if(isset($_SESSION['nombre']) && $_SESSION['nombre'] != ''){

      ?>

      <div class="container-fluid">
          <ul class="nav navbar-nav" id="login">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>
                <?PHP
                echo $_SESSION['nombre']; ?></b> </a>
                <ul class='dropdown-menu' style='width:100px;'>
                    <li>
                      <div class='collapse navbar-collapse'>
                        <ul class='nav navbar-nav'>

                          <li><a href='perfil.php'><span class='glyphicon glyphicon-user'></span>
                            Ver perfil
                          </a>
                        </li>

                      <?PHP
                      if( $_SESSION["administrador"]=="0"){
                     ?>
                          <li><a href='../administrador/administrador.php'>
                          <span class='glyphicon glyphicon-log-in'></span>Vuelve a la pagina administrador
                          </a>

                          </li>
                          <?php
                        }?>
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
		</div>
      <?PHP
      }else{
      ?>
      <div  class="container-fluid">
          <ul class="nav navbar-nav" id="login">
            <li  class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> </a>
			  <ul   id="login-dp" class="dropdown-menu">
				<li>
					<form  method="POST"  action="login.php">
						<div class="form-group">

						   <input type="text" class="form-control" name="usuario"  required>
						</div>
						<div class="form-group">

						   <input type="password" class="form-control" name="pass"  required>

						</div>
						<div class="form-group">

						   <input type="submit" class="btn btn-primary btn-block" value="ENTRA"/>

						   <a href="registro.php">Si no tienes una cuenta pincha aqui y registrate</a>
						</div>

					 </form>
				</li>
			  </ul>
            </li>
          </ul>
	  </div>

      <?php
      }
      ?>
		</li>
		<?PHP if(isset($_SESSION['carrito'])){
		$total = 0;
		foreach($_SESSION['carrito'] as $producto){
			if(isset($producto['cantidad'])){
				$total+=$producto['cantidad'];
			}
		}
		?>
		<li><a href="carrito.php"><i class="fa fa-shopping-cart fa-lg"></i>
      <span class="badge"><?PHP echo $total; ?></span></a></li>
		<?PHP }
		if(isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == '1'){
		?>
		<li><label style="margin-top:15px;margin-left:15px;" class="text-danger">
      <strong>El DNI indicado ya se encuentra en uso en la base de datos</strong></label></li>
		<?PHP
			}
		if(isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == '2'){
		?>
		<li><label style="margin-top:15px;margin-left:15px;" class="text-success">
      <strong>El usuario ha sido creado correctamente</strong></label></li>
		<?PHP
			}
      if(isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == '3'){
      ?>
      <li><label style="margin-top:15px;margin-left:15px;" class="text-danger">
        <strong>No existe el Usuario y/o error en la Contraseña</strong></label></li>
      <?PHP
        }
		?>
      </ul>

    </div>
  </nav>


  </header>
