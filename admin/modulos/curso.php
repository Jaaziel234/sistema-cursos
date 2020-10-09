<?php
$idDocente = "";
include_once "../config/conexion.php";
//Datos enviados desde el formulario, obteniendo por metodo POST
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar y eliminar
$nombreCurso = isset($_POST['nombreCurso']) ? $_POST['nombreCurso'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$fechaCurso = isset($_POST['fecha']) ? $_POST['fecha'] : "";
$duracion = isset($_POST['duracion']) ? $_POST['duracion'] : "";
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$imgCurso = isset($_FILES['imgCurso']['name']) ? $_FILES['imgCurso']['name'] : "";
$docente = isset($_POST['docente']) ? $_POST['docente'] : "";
$carrera = isset($_POST['carrera']) ? $_POST['carrera'] : "";
//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

//Usando estrurando Switch, para evaluar diferentes eventos
switch ($accion) {
	//Agregamos los datos a nuestra base de datos
	case 'Agregar':
		$sql = "INSERT INTO curso (Nombre, Descripcion, Fecha, DuracionCurso, Precio, Imagen, Id_Docente,Id_Carrera) VALUES(?,?,?,?,?,?,?,?)";
		//Agregando la fecha y moviendo el archivo a una carpeta especifica
		$fecha = new DateTime();
		//Seleecionamos el nombre del archivo
		$nombreFoto = ($imgCurso != "") ? $fecha->getTimestamp()."_".$_FILES['imgCurso']['name'] : "foto.jpg";
		//Seleccionamos el value nombre temporal
		$tmpFoto = isset($_FILES['imgCurso']['tmp_name']) ? $_FILES['imgCurso']['tmp_name'] : "";

		if ($tmpFoto != ''){
			//Funcion para mover la foto
			move_uploaded_file($tmpFoto,"./recursos/images/imgCurso/".$nombreFoto);
		}
		//Consulta SQL
		$sentencia = $pdo->prepare($sql);
		//Pasando los datos de tipo array
		$sentencia->execute(array($nombreCurso,$descripcion,$fechaCurso,$duracion,$precio,$nombreFoto,$docente,$carrera));
		//Comprando si se insertaron
		if ($sentencia){
			echo "<script>alert('Agregados')</script>";
			echo "<script>window.setTimeout(function() { window.location = './vistaCurso.php' }, 1000);</script>";
		}else{
			echo "<script>alert('Error al insertar los datos')</script>";
		}
		break;

	case 'Eliminar':
			//para borrar la foto de la carpeta donde se guardan
		  	$sentencia=$pdo->prepare("SELECT Imagen FROM curso WHERE Id=:Id");
		  	$sentencia->bindParam(':Id',$Id);
		  	$sentencia->execute();
		  	//Obtemos en un array la columna Foto, los datos
		  	$fila= $sentencia->fetch(PDO::FETCH_ASSOC);

		  	if(isset($fila["Imagen"])){
		  		//Comprobamos si existe
		     	if (file_exists("./recursos/images/imgCurso/".$fila["Imagen"])) {
		       		unlink("./recursos/images/imgCurso/".$fila["Imagen"]);
		     	}
		    } 
			//Consulta para eliminar el dato
			$sql = "DELETE FROM curso WHERE Id=:Id";
			$sentencia  = $pdo->prepare($sql);
			$sentencia->bindParam(':Id',$Id);
			$sentencia->execute();
			//Redirigimos a la vista
			echo "<script>window.setTimeout(function() { window.location = './vistaCurso.php' }, 1000);</script>";
		break;
	case 'Actualizar':
			//Consulta para actualizar los datos de tabla cursos
			$sql = "UPDATE curso SET Nombre=?, Descripcion=?, Fecha=?, DuracionCurso=?, Precio=?, Id_Docente=?,Id_Carrera=? WHERE Id=?";
			$sentencia = $pdo->prepare($sql);
			$sentencia->execute(array($nombreCurso,$descripcion,$fechaCurso,$duracion,$precio,$docente,$carrera,$Id));
			//Movemos la imagen
			$fecha = new DateTime();
			//Seleecionamos el nombre del archivo
			$nombreFoto = ($imgCurso != "") ? $fecha->getTimestamp()."_".$_FILES['imgCurso']['name'] : "foto.jpg";
			//Seleccionamos el value nombre temporal
			$tmpFoto = isset($_FILES['imgCurso']['tmp_name']) ? $_FILES['imgCurso']['tmp_name'] : "";

			if ($tmpFoto != ''){
				//Funcion para mover la foto
				move_uploaded_file($tmpFoto,"./recursos/images/imgCurso/".$nombreFoto);
				//para borrar la foto de la carpeta donde se guardan
			  	$sentencia=$pdo->prepare("SELECT Imagen FROM curso WHERE Id=:Id");
			  	$sentencia->bindParam(':Id',$Id);
			  	$sentencia->execute();
			  	//Obtemos en un array la columna Foto, los datos
			  	$fila= $sentencia->fetch(PDO::FETCH_ASSOC);
			  	//print_r($fila);//solo para provar//

			  	if(isset($fila["Imagen"])){
			  		//Comprobamos si existe
			     	if (file_exists("./recursos/images/imgCurso/".$fila["Imagen"])) {
			       		unlink("./recursos/images/imgCurso/".$fila["Imagen"]);
			     	}
			    }
			    //Nueva consulta para actualizar el nombre de la Imagen
			    $sql = "UPDATE curso SET Imagen=? WHERE Id=?";
				$sentencia = $pdo->prepare($sql);
				$sentencia->execute(array($nombreFoto,$Id));
			}
			echo "<script>window.setTimeout(function() { window.location = './vistaCurso.php' }, 1000);</script>";

		break;
	default:
		# code...
		break;
}
//Obteniendo mis datos de la BD para mostrar en el formulario
$sql = "SELECT Id,Nombres,Apellidos FROM docente";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoDocente = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//Obteniendo mis datos de la BD para mostrar en el formulario
$sql = "SELECT Id,Nombre FROM carrera";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultadoCarrera = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//Sirve para mostrar los datos en mi tabla
$sql = "SELECT * FROM curso ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>