
<?php
session_start();
if(!isset($_SESSION['nombre']) or $_SESSION['nombre'] == '' or $_SESSION["administrador"]!="0"){
header("Location:../usuarios/index.php");

}

?>
