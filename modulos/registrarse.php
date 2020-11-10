<?php
//Incluimos la conexion a base de datos
include_once './config/conexion.php';
$nombre=isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apellido=isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$correo=isset($_POST['correo']) ? $_POST['correo'] : '';
$usuario=isset($_POST['usuario']) ? $_POST['usuario'] : '';
$clave=isset($_POST['clave']) ? $_POST['clave'] : '';
//Comprobacion de usuarios
$selectSQL = "SELECT * FROM usuario WHERE Correo=? OR Usuario=?";
$sentencia = $pdo->prepare($selectSQL);
$sentencia->execute(array($correo,$usuario));
if ($sentencia->rowCount() > 0){
	echo "<script>alert('Ya existe un usuario con el correo')</script>";
}else if (isset($_POST['accion'])){
	//Consulta SQL
	$sql = "INSERT INTO usuario(Nombres,Apellidos,Correo,Usuario,Contraseña) VALUES(?,?,?,?,?)";
	//Comprobación de INSERT DATA
	$consulta=$pdo->prepare($sql);
	if ($consulta->execute(array($nombre,$apellido,$correo,$usuario,$clave))){
		echo "<script>alert('Registrado')</script>";
		echo "<script>window.setTimeout(function() { window.location = './index.php' }, 100);</script>";
	}
}
//Array para errores
$aErrores = array();
if((strlen($clave) < 6)){
	$aErrores[] = "Correo no valido o contraseña";
}
$pdo = "";
?>