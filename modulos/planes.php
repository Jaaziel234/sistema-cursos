<?php
//Conexion a BD
include_once 'config/conexion.php';
//Consulta para mostrar los planes
$selectSQL = "SELECT * FROM plan";
$sentencia = $pdo->prepare($selectSQL);
$sentencia->execute();
$resultPlanes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Consulta para mostrar los tipos de pagos
$selectSQL = "SELECT * FROM pago";
$sentencia = $pdo->prepare($selectSQL);
$sentencia->execute();
$resultPago = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>