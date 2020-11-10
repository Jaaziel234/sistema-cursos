<?php
session_start();
if (isset($_SESSION['usuario'])){
	unset($_SESSION['usuario']);
	echo "<script>setTimeout(function (){window.location = '../index.php'},100)</script>";
}
?>