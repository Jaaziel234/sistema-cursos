<?php
//Conexion a BD
include_once 'config/conexion.php';

$selectSQL = "SELECT * FROM plan";
$sentencia = $pdo->prepare($selectSQL);
$sentencia->execute();
$resultPlanes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>