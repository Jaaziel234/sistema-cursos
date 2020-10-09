<?php
//Incluimos la conexion a base de datos
include_once '../../../config/conexion.php';
$usuario = isset($_POST['usuario'])? $_POST['usuario'] : "";
$clave = isset($_POST['clave'])? $_POST['clave'] : "";
//$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';

//SQL para los casos de sesion
$sqlDocente = "SELECT * FROM docente WHERE Usuario=:usuario AND Contraseña=:clave";
$sqlAdmin = "SELECT * FROM administrador WHERE Usuario=:usuario AND Contraseña=:clave";

//Ejecutando consulta de docente
$resultado = $pdo->prepare($sqlDocente);
$resultado->bindParam(':usuario', $usuario,PDO::PARAM_STR);
$resultado->bindParam(':clave', $clave, PDO::PARAM_STR);
$resultado->execute();
//La consulta para obtener los datos devueltos en un array
$registro = $resultado->fetch(PDO::FETCH_ASSOC);
//Ejecutando consulta para admin
$resultadoAdmin = $pdo->prepare($sqlAdmin);
$resultadoAdmin->bindParam(':usuario', $usuario,PDO::PARAM_STR);
$resultadoAdmin->bindParam(':clave', $clave, PDO::PARAM_STR);
$resultadoAdmin->execute();
//La consulta para obtener los datos devueltos en un array
$registroAdmin = $resultadoAdmin->fetch(PDO::FETCH_ASSOC);
if ($resultado->rowCount() >= 1){
	if ($registro['Estado'] == 1){
		//Iniciamos la session del perfil
		session_start();
		$_SESSION['admin'] = $registro;
		header("Location:../../home.php");
	}else{
		session_start();
		$_SESSION['errores'] = 'errorSession';
		header("Location:../../index.php");
	}
	
}elseif($resultadoAdmin->rowCount() >= 1){
	//Iniciamos la session del perfil
	session_start();
	$_SESSION['adminPrincipal'] = $registroAdmin;
	header("Location:../../home.php");
}else{
	session_start();
	$_SESSION['errores'] = 'errorSession';
	header("Location:../../index.php");
}
$pdo = '';
?>