<?PHP
  include_once("../plantilla/db_configuration.php");
	session_start();
	if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0){
         $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Error de conexión: %s\n", mysqli_connect_error());
			exit();
		}
		
			
			
			$hoy = getdate();
			$hoy = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
			$connection->query("INSERT INTO pedidos VALUES(NULL, '".$_SESSION['codusuario']."', '".$hoy."')");
			if($resultado = $connection->query("SELECT MAX(codpedido) AS ID  FROM pedidos WHERE codusuario = '".$_SESSION['codusuario']."' AND fechaemision = '".$hoy."'")){
			
				$fila = $resultado->fetch_assoc();
				echo "SELECT MAX(codpedido) FROM pedidos WHERE codusuario = '".$_SESSION['codusuario']."' AND fechaemision = '".$hoy."'<br>";
				echo '<pre>'.print_r($fila, true).'</pre>';
				foreach($_SESSION['carrito'] as $id => $objeto){
					$connection->query("INSERT INTO incluyen VALUES('".$id."', '".$fila['ID']."', '".$objeto['cantidad']."')");
					$connection->query("UPDATE producto SET stock=stock - ".$objeto['cantidad']." WHERE codproducto = '".$id."'");
					echo "INSERT INTO incluyen VALUES('".$id."', '".$fila['ID']."', '".$objeto['cantidad']."')<br>";
				}
			}
			
			$connection->close();
	
	}
	echo '<pre>'.print_r($_REQUEST, true).'</pre>';
	echo '<pre>'.print_r($_SESSION, true).'</pre>';
	
	
	unset($_SESSION['carrito']);
	header("location: ../usuarios/carrito.php");
?>
