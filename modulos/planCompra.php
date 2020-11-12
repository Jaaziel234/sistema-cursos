<?php
//Iniciamos sesion para comprobar
session_start();
//Validando si no existe redirige a registrarse
if(!isset($_SESSION['usuario'])){
	header("Location:../registrarse.php");
}
include_once "../config/conexion.php";

//Datos de compra
$methodPago = isset($_POST['metodoPago']) ? $_POST['metodoPago'] : '';
//ID del usuario
$idUsuario = $_SESSION['usuario']['Id'];
//Consulta a la Tabla de cursos
$selectSQL = "SELECT * FROM curso";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

///Consulta para comprobar si ya existe el curso
//$selectSqlVenta = "SELECT * FROM ventacurso";
//$stmt = $pdo->prepare($selectSqlVenta);
//$stmt->execute();
//$resultVenta = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "INSERT INTO ventacurso (Correo,ClaveTransaccion,PaypalDato,Estado,Id_Usuario,Id_Curso) VALUES('','','','pagado',?,?)";
$consult = $pdo->prepare($sql);
//Fase de revision
foreach($result as $data){

	$consult->execute(array($idUsuario,$data['Id']));
}
header("Location:../misCursos.php");
?>