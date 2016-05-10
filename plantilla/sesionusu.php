
<?php
session_start();
if(!isset($_SESSION['nombre']) or $_SESSION['nombre'] == ''){
header("Location:../usuarios/index.php");

}

?>
