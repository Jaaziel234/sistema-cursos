<?php
//Incluimos la conexion a base de datos
include_once '../config/conexion.php';
$nombre=$_POST['nombres'];
$apellido=$_POST['apellidos'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//Consulta SQL
$sql = "INSERT INTO usuario(Nombres,Apellidos,Correo,Usuario,Contraseña) VALUES(?,?,?,?,?)";

$consulta=$pdo->prepare($sql);
//Comprobación
if($consulta->execute(array($nombre,$apellido,$correo,$usuario,$clave))){
    header('location:../index.php');

}else{
    echo "Error no se pudo almacenar los datos";
}
?>