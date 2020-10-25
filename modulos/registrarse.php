<?php
//Incluimos la conexion a base de datos
include_once '../config/conexion.php';
$nombre=isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apellido=isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$correo=isset($_POST['correo']) ? $_POST['correo'] : '';
$usuario=isset($_POST['usuario']) ? $_POST['usuario'] : '';
$clave=isset($_POST['clave']) ? $_POST['clave'] : '';
//Array para errores
$aErrores = array();
if((strlen($clave) < 6)){
	$aErrores[] = "Correo no valido o contraseña";
}
//Consulta SQL
$sql = "INSERT INTO usuario(Nombres,Apellidos,Correo,Usuario,Contraseña) VALUES(?,?,?,?,?)";

$consulta=$pdo->prepare($sql);
$consulta->execute(array($nombre,$apellido,$correo,$usuario,$clave));
//Comprobación
if($consulta){
    header('location:../index.php');
}else{
    echo "Error no se pudo almacenar los datos";
}
?>