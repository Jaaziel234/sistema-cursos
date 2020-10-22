<?php
include_once 'config/conexion.php';
///Sirve para mostrar el contenido delcurso
$sql = "SELECT * FROM contenido";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoVideo = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$pdo = '';

?>