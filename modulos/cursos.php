<?php
include_once 'config/conexion.php';
//Consulta SQL
$sql = "SELECT curso.Id,Nombre,curso.Descripcion as cursoDescripcion,Fecha,DuracionCurso,Precio,Imagen,docente.Nombres,docente.Apellidos,docente.Descripcion,docente.Foto FROM curso INNER JOIN docente ON curso.Id_Docente = docente.Id";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoCursoDocente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Datos de la base de datos->mostramos en el index principal
$sql = "SELECT * FROM curso LIMIT 3";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoCursos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//Trayendo de la base de datos los temas()
$sql = "SELECT * FROM curso INNER JOIN tema_contenido ON tema_contenido.Id_Curso = curso.Id";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoTemas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

/*
***************Consulta para comprobar si ya ha comprado el curso**************
*/

$consultaSQL = "SELECT Id_Usuario,Id_Curso FROM ventacurso";
$sentencia = $pdo->prepare($consultaSQL);
$sentencia->execute();
$comprabacionCurso = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>