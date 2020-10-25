<?php
session_start();
//Id del curso
$Id = isset($_GET['id']) ? $_GET['id'] : '';
//Validacion
if (!isset($_SESSION['usuario'])){
	header("Location:registrarse.php");
}
//Comprobacion para redireccionar y comprar el curso, y envio de ID
if (isset($_SESSION['usuario'])){
	header("Location:comprarCurso.php?codCurso=$Id");
}
?>