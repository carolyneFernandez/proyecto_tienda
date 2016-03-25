<?PHP
  include_once("../plantilla/db_configuration.php");
	session_start();
	if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){  /*compueba si esta definida carrito y contar la cantidad de elementos que tiene array carrito*/
         $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

		/* comprobar conneccion*/
		if (mysqli_connect_errno()) {
			printf("Error de conexión: %s\n", mysqli_connect_error());
			exit();
		}



			$hoy = getdate(); /*recibir fecha del sistema*/
			$hoy = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday']; /*fecha actual*/
			$connection->query("INSERT INTO pedidos VALUES(NULL, '".$_SESSION['codusuario']."', '".$hoy."')");
       /*codusuario(que se tiene desde la variable sesion )*/
			if($resultado = $connection->query("SELECT MAX(codpedido) AS ID
       FROM pedidos WHERE codusuario = '".$_SESSION['codusuario']."' AND fechaemision = '".$hoy."'")){
			/*query  para el codpedido ,elija el mayor codpedido con los datos */
				$fila = $resultado->fetch_assoc(); /*se convierte en un array*/
				echo "SELECT MAX(codpedido) FROM pedidos WHERE codusuario = '".$_SESSION['codusuario']."' AND fechaemision = '".$hoy."'<br>";
				echo '<pre>'.print_r($fila, true).'</pre>';
				foreach($_SESSION['carrito'] as $id => $objeto){
          /*pasarlo como base la variable session carrito por un lado id y objeto*/
					$connection->query("INSERT INTO incluyen VALUES('".$id."', '".$fila['ID']."', '".$objeto['stock']."')");
          /*insertar inclyen */
					$connection->query("UPDATE producto SET stock=stock - ".$objeto['stock']." WHERE codproducto = '".$id."'");
           /*restar cantidad del producto*/
					echo "INSERT INTO incluyen VALUES('".$id."', '".$fila['ID']."', '".$objeto['stock']."')<br>";
				}
			}

			$connection->close();

	}
	echo '<pre>'.print_r($_POST, true).'</pre>';
	echo '<pre>'.print_r($_POST, true).'</pre>';


	unset($_SESSION['carrito']);
	header("location: ../usuarios/carrito.php");
?>
