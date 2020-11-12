<?php
//Inclusion de CNX
include_once '../config/conexion.php';
//Guardamos los datos enviados por GET 
$codCurso = isset( $_GET['codCurso'] ) ? $_GET['codCurso'] : '';
$codUsuario = isset( $_GET['codUsuario'] ) ? $_GET['codUsuario'] : '';

if ($codUsuario != ''){
$sql = "INSERT INTO ventacurso (Correo,ClaveTransaccion,PaypalDato,Estado,Id_Usuario,Id_Curso) VALUES('','','','pagado',?,?)";
$consult = $pdo->prepare($sql);
$consult->execute(array($codUsuario,$codCurso));
header("Location:../contenido.php?id=$codCurso");
}


?>