<?php
include_once 'config/conexion.php';
//Consulta SQL
$sql = "SELECT curso.Id,Nombre,Descripcion,Fecha,DuracionCurso,Precio,Imagen,docente.Nombres,docente.Apellidos,docente.Foto FROM curso INNER JOIN docente ON curso.Id_Docente = docente.Id";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoCursoDocente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Datos de la base de datos->mostramos en el index principal
$sql = "SELECT * FROM curso LIMIT 3";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoCursos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//Trayendo de la base de datos los temas(En desarrollo)
$sql = "SELECT * FROM tema_contenido";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoTemas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>