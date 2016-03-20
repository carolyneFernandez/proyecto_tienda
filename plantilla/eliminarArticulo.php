<?PHP
	session_start();
	if(!isset($_SESSION['carrito']) || count($_SESSION['carrito']) <= 0){
		$_SESSION['carrito'] = [];
	}
	if(isset($_POST['id'])){
		unset($_SESSION['carrito'][$_POST['id']]);
	}
	header("location: ../usuarios/carrito.php?id=".$_POST['id_producto']);
?>
