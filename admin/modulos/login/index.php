<?php
//Incluimos la conexion a base de datos
include_once '../../../config/conexion.php';
$usuario = isset($_POST['usuario'])? $_POST['usuario'] : "";
$clave = isset($_POST['clave'])? $_POST['clave'] : "";

$sql = "SELECT * FROM docente WHERE Usuario=:usuario AND Contraseña=:clave";
$resultado = $pdo->prepare($sql);
$resultado->bindParam(':usuario', $usuario,PDO::PARAM_STR);
$resultado->bindParam(':clave', $clave, PDO::PARAM_STR);
$resultado->execute();
//La consulta
$registro = $resultado->fetch(PDO::FETCH_ASSOC);
//Traemos el número de filas
$numeroRegistro = $resultado->rowCount();

if ($numeroRegistro >= 1){
	//Iniciamos la session del perfil
	session_start();
	$_SESSION['admin'] = $registro;
	echo "Bienvenido";
	header("Location:../../home.php");
}else{
	session_start();
	$_SESSION['errores'] = 'errorSession';
	header("Location:../../index.php");
}
?>