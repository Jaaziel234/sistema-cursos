<?php
include_once "./../config/conexion.php";

$sql = "SELECT * FROM docente ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;
?>