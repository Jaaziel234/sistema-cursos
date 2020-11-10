<?php
if (!isset($_SESSION)){
	session_start();
}
//Si no existe esta session redirigime a index.php
if (!isset($_SESSION['admin']) && !isset($_SESSION['adminPrincipal'])) {
	header("Location:index.php"); 
}
?>