<?php
//Incluimos la conexion a base de datos
include_once 'config/conexion.php';
$usuario = isset($_POST['usuario'])? $_POST['usuario'] : "";
$clave = isset($_POST['clave'])? $_POST['clave'] : "";
//Comprobación de envio
if (isset($_POST['enviar'])){
	//Consulta SQL
	$sqlUser = "SELECT * FROM usuario WHERE Usuario=:usuario";

	//Ejecutando consulta 
	$resultado = $pdo->prepare($sqlUser);
	$resultado->bindParam(':usuario', $usuario,PDO::PARAM_STR);
	$resultado->execute();
	//La consulta para obtener los datos devueltos 
	$loginUser = $resultado->fetch(PDO::FETCH_ASSOC);
	$pass_hash = $loginUser['Contraseña'];
	if(password_verify($clave, $pass_hash)){
		session_start();
	    $_SESSION['usuario'] = $loginUser;
	    header("Location:index.php");
	}else{
		session_start();
	    $_SESSION['errores'] = 'errorSession'; //Mensaje de error (Session)
	}
}
$pdo = ''; //Vaciamos la variable
?>