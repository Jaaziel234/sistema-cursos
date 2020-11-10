<?php
//Conexion a BD
if (is_null($pdo)){
	include_once 'config/conexion.php';
}
//Obteniendo data
$idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : '';
$idCurso = isset($_POST['idCurso']) ? $_POST['idCurso'] : '';
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : '';
$idVideo = isset($_POST['idVideo']) ? $_POST['idVideo'] : '';

if (isset($_POST['enviar'])){
	$insertSQL = "INSERT INTO comentario(Comentario,Id_Usuario,Id_Curso,Id_Video) VALUES(?,?,?,?)";
	$sentencia = $pdo->prepare($insertSQL);
	if ($sentencia->execute(array($comentario,$idUsuario,$idCurso,$idVideo))){
		echo "<script>alert('Comentario agregado')</script>";
	}

}

//Muestra los comentarios en el video
$selectSQL = "SELECT comentario.Id,Comentario,Fecha,Id_Usuario,Id_Curso,Id_Video,Nombres,Apellidos,Foto FROM comentario INNER JOIN usuario ON comentario.Id_Usuario = usuario.Id ORDER BY Id DESC";
$stmt = $pdo->prepare($selectSQL);
$stmt->execute();
$resultComent = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Eliminar comentario de BD
$idComentario = isset($_POST['idComentario']) ? $_POST['idComentario'] : '';
if(isset($_POST['delete'])){
	$deleteSQL = "DELETE FROM comentario WHERE Id=?";
	$stmt = $pdo->prepare($deleteSQL);
	if ($stmt->execute(array($idComentario))){
		echo "<script>alert('Comentario Eliminado')</script>";
	}
}

?>