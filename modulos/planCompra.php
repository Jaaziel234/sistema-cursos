<?php
include_once "../config/conexion.php";
//ID del usuario
$idUsuario = $_GET['idUsuario'];
$selectSQL = "SELECT * FROM curso";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

///Consulta para comprobar si ya existe el curso
$selectSqlVenta = "SELECT * FROM ventacurso";
$stmt = $pdo->prepare($selectSqlVenta);
$stmt->execute();
$resultVenta = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "INSERT INTO ventacurso (Correo,ClaveTransaccion,PaypalDato,Estado,Id_Usuario,Id_Curso) VALUES('','','','pagado',?,?)";
$consult = $pdo->prepare($sql);
foreach($result as $data){

		if($data['Id'] != $venta['Id_Curso'] && $idUsuario != $venta['Id_Usuario']){
			$consult->execute(array($idUsuario,$data['Id']));
		}
}
header("Location:../index.php");
?>