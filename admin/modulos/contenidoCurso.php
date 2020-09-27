<?php
$idDocente = "";
include_once "../config/conexion.php";

//Datos enviados desde el formulario, obteniendo por metodo POST
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar y eliminar
$temaContenido = isset($_POST['temaContenido']) ? $_POST['temaContenido'] : "";
$tituloVideo = isset($_POST['tituloVideo']) ? $_POST['tituloVideo'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$duracion = isset($_POST['duracion']) ? $_POST['duracion'] : "";
$video = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
$cursoId = isset($_POST['cursoId']) ? $_POST['cursoId'] : "";
print_r($video);
//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

//Usando estrurando Switch, para evaluar diferentes eventos
switch ($accion) {
	//Agregamos los datos a nuestra base de datos
	case 'Agregar':
		$sql = "INSERT INTO contenido (Temas,Nombre,Descripcion,DuracionVideo, Video, Id_Curso) VALUES(?,?,?,?,?,?)";
		//Agregando la fecha y moviendo el archivo a una carpeta especifica
		$fecha = new DateTime();
		//Seleecionamos el nombre del archivo
		$nombreVideo = ($video != "") ? $fecha->getTimestamp()."_".$_FILES['video']['name'] : "Video.mp4";
		//Seleccionamos el value nombre temporal
		$tmpFoto = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";

		if ($tmpFoto != ''){
			//Funcion para mover la foto
			move_uploaded_file($tmpFoto,"./contenido/videosCursos/".$nombreVideo);
		}
		//Consulta SQL
		$sentencia = $pdo->prepare($sql);
		//Pasando los datos de tipo array
		$sentencia->execute(array($temaContenido,$tituloVideo,$descripcion,$duracion,$nombreVideo,$cursoId));
		//Comprando si se insertaron
		if ($sentencia){
			echo "<script>alert('Agregados')</script>";
			//header("Location:./vistaContenido.php");
			echo "<script>window.setTimeout(function() { window.location = './vistaContenido.php' }, 1000);</script>";
		}else{
			echo "<script>alert('Error al insertar los datos')</script>";
		}
		break;

	case 'Eliminar':
			//para borrar la foto de la carpeta donde se guardan
		  	$sentencia=$pdo->prepare("SELECT Video FROM contenido WHERE Id=:Id");
		  	$sentencia->bindParam(':Id',$Id);
		  	$sentencia->execute();
		  	//Obtemos en un array la columna Foto, los datos
		  	$fila= $sentencia->fetch(PDO::FETCH_ASSOC);

		  	if(isset($fila["Video"])){
		  		//Comprobamos si existe
		     	if (file_exists("./contenido/videosCursos/".$fila["Video"])) {
		       		unlink("./contenido/videosCursos/".$fila["Video"]);
		     	}
		    } 
			//Consulta para eliminar el dato
			$sql = "DELETE FROM contenido WHERE Id=:Id";
			$sentencia  = $pdo->prepare($sql);
			$sentencia->bindParam(':Id',$Id);
			$sentencia->execute();
			//Redirigimos a la vista
			echo "<script>window.setTimeout(function() { window.location = './vistaContenido.php' }, 1000);</script>";
		break;
	case 'Actualizar':
			//Consulta para actualizar los datos de tabla cursos
			$sql = "UPDATE contenido SET Temas=?,Nombre=?,Descripcion=?,DuracionVideo=?, Id_Curso=? WHERE Id=?";
			$sentencia = $pdo->prepare($sql);
			$sentencia->execute(array($temaContenido,$tituloVideo,$descripcion,$duracion,$cursoId,$Id));
			//Movemos la imagen
			$fecha = new DateTime();
			//Seleecionamos el nombre del archivo
			$nombreVideo = ($video != "") ? $fecha->getTimestamp()."_".$_FILES['video']['name'] : "video.mp4";
			//Seleccionamos el value nombre temporal
			$tmpFoto = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";

			if ($tmpFoto != ''){
				//Funcion para mover la foto
				move_uploaded_file($tmpFoto,"./contenido/videosCursos/".$nombreVideo);
				//para borrar la foto de la carpeta donde se guardan
			  	$sentencia=$pdo->prepare("SELECT Video FROM contenido WHERE Id=:Id");
			  	$sentencia->bindParam(':Id',$Id);
			  	$sentencia->execute();
			  	//Obtemos en un array la columna Foto, los datos
			  	$fila= $sentencia->fetch(PDO::FETCH_ASSOC);
			  	//print_r($fila);//solo para provar//

			  	if(isset($fila["Video"])){
			  		//Comprobamos si existe
			     	if (file_exists("./contenido/videosCursos/".$fila["Video"])) {
			       		unlink("./contenido/videosCursos/".$fila["Video"]);
			     	}
			    }
			    //Nueva consulta para actualizar el nombre de la Imagen
			    $sql = "UPDATE contenido SET Video=? WHERE Id=?";
				$sentencia = $pdo->prepare($sql);
				$sentencia->execute(array($nombreVideo,$Id));
			}
			echo "<script>window.setTimeout(function() { window.location = './vistaContenido.php' }, 1000);</script>";

		break;
	default:
		# code...
		break;
}
//Sirve para mostrar los datos en mi tabla
$sql = "SELECT * FROM contenido ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultadoContenido = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Sirve para mostrar los datos en mi Fomulario
$sql = "SELECT * FROM curso ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>