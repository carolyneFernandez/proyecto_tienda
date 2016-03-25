<?PHP
	session_start();
	if(!isset($_SESSION['carrito']) || count($_SESSION['carrito']) <= 0){
		 /*sino esta establecido o la cuenta es menor que 0 creamos el carritovacio*/
		$_SESSION['carrito'] = [];
	}
	$id_producto = null; /*se pone todas las variables a null para luego comprobar*/
	$nombre_producto = null;
	$precio_producto = null;
	$talla = null;
	$color = null;
	if(isset($_POST['id_producto']) && $_POST['id_producto'] != ''){
		/*mientras no este vacia y esta establecida genera el codproducto*/
		$id_producto = $_POST['id_producto'];
	}
	if(isset($_POST['nombre_producto']) && $_POST['nombre_producto'] != ''){
		$nombre_producto = $_POST['nombre_producto'];
	}
	if(isset($_POST['color']) && $_POST['color'] != ''){
		$color = $_POST['color'];
	}
	if(isset($_POST['precio_producto']) && $_POST['precio_producto'] != ''){
		$precio_producto = $_POST['precio_producto'];
	}
	if(isset($_REQUEST['talla']) && $_POST['talla'] != ''){
		$talla = $_REQUEST['talla'];
	}
	if(!isset($_SESSION['carrito'][$id_producto])){
	/*variable de sssecion carrito tiene dentro el variable de id_producto y se inicializa en 0*/
		$_SESSION['carrito'][$id_producto] = [];
		$_SESSION['carrito'][$id_producto]['cantidad'] = 0;
	}
	$_SESSION['carrito'][$id_producto]['nombre'] = $nombre_producto;
	$_SESSION['carrito'][$id_producto]['talla'] = $talla;
	$_SESSION['carrito'][$id_producto]['precio'] = $precio_producto;
	$_SESSION['carrito'][$id_producto]['color'] = $color;

	if($id_producto != null){
		if(isset($_POST['cantidad']) && intval($_POST['cantidad']) > 0){ /*intval(convierte el valor a entero )*/
			$_SESSION['carrito'][$id_producto]['cantidad']+=intval($_POST['cantidad']); /*sumale a lo que viene a la izquierda*/
		}else{
			$_SESSION['carrito'][$id_producto]['cantidad']++; /*actualiza el carrito*/
		}
	}
	header("location: ../usuarios/clienteproducto.php?id=".$_POST['id_producto']);
?>
