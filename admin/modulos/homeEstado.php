<?php
//Conexion a BD
include_once "../config/conexion.php";
//Obteniendo session->Id
if(isset($_SESSION['admin'])){
	$idDocente = $_SESSION['admin']['Id'];
}
//Consulta SQL para traer mis datos
$selectSQL = "SELECT Id_Curso,Id_Docente FROM ventacurso INNER JOIN curso ON ventacurso.Id_Curso=curso.Id WHERE Id_Docente=?";
$stmt = $pdo->prepare($selectSQL);
$stmt->bindParam(1,$idDocente,PDO::PARAM_INT);
$stmt->execute();
$resultEstudiante = $stmt->rowCount();

//Trayendo la cantidad de rursos

$stmt = $pdo->prepare("SELECT * FROM curso WHERE Id_Docente=?");
$stmt->bindParam(1,$idDocente,PDO::PARAM_INT);
$stmt->execute();
$resultCursos = $stmt->rowCount();

//Vista para administrador
//Consulta SQL para traer mis datos
$selectSQL = "SELECT Id_Curso,Id_Docente FROM ventacurso INNER JOIN curso ON ventacurso.Id_Curso=curso.Id";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute();
$resultEstudianteAdmin = $stmt->rowCount();

//Trayendo la cantidad de rursos

$stmt = $pdo->prepare("SELECT * FROM curso");
$stmt->execute();
$resultCursosAdmin = $stmt->rowCount();

//Sirve para mostrar la cantidad de docentes
$stmt = $pdo->prepare("SELECT * FROM docente");
$stmt->execute();
$resultDocente = $stmt->rowCount();
?>