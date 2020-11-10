<?php
//Incluimos la conexion a base de datos
include_once '../../../config/conexion.php';
$usuario = isset($_POST['usuario'])? $_POST['usuario'] : "";
$clave = isset($_POST['clave'])? $_POST['clave'] : "";
//Decifrar password para Docente
$selectSQL = "SELECT * FROM docente WHERE Usuario=?";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute(array($usuario));
$resultUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
$claveHash1 = $resultUsuario['Contraseña'];

//Decifrar password para Administrador
$selectSQL = "SELECT * FROM administrador WHERE Usuario=?";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute(array($usuario));
$resultAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
$claveHash2 = $resultAdmin['Contraseña'];

if (password_verify($clave,$claveHash1)){
	if ($resultUsuario['Estado'] == 1){
		//Iniciamos la session del perfil
		session_start();
		$_SESSION['admin'] = $resultUsuario;
		header("Location:../../home.php");
	}else{
		session_start();
		$_SESSION['errores'] = 'errorSession';
		header("Location:../../index.php");
	}
	
}elseif(password_verify($clave,$claveHash2)){
	//Iniciamos la session del perfil
	session_start();
	$_SESSION['adminPrincipal'] = $resultAdmin;
	header("Location:../../home.php");
}else{
	session_start();
	$_SESSION['errores'] = 'errorSession';
	header("Location:../../index.php");
}

$pdo = '';
?>