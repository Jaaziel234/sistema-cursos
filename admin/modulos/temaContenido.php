<?php
include_once "../config/conexion.php";

//Datos enviados desde el formulario, obteniendo por metodo POST
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar y eliminar
$temaContenido = isset($_POST['temaContenido']) ? $_POST['temaContenido'] : "";
$curso = isset($_POST['curso']) ? $_POST['curso'] : "";

//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

//Usando estrurando Switch, para evaluar diferentes eventos
switch ($accion) {
        //Agregamos los datos a nuestra base de datos
    case 'Agregar':
        $sql = "INSERT INTO tema_contenido (Tema,Id_Curso) VALUES(?,?)";
        //Consulta SQL
        $sentencia = $pdo->prepare($sql);
        //Pasando los datos de tipo array
        $sentencia->execute(array($temaContenido,$curso));
        //Comprobando si se insertaron
        if ($sentencia){
            echo "<script>alert('Agregados')</script>";
        }else{
            echo "<script>alert('Error al insertar los datos')</script>";
        }
        break;

    case 'Eliminar':
        //Consulta para eliminar el dato
        $sql = "DELETE FROM tema_contenido WHERE Id=:Id";
        $sentencia  = $pdo->prepare($sql);
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        break;
    case 'Actualizar':
        //Consulta para actualizar los datos de tabla carrera
        $sql = "UPDATE tema_contenido SET Tema=?,Id_Curso=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($temaContenido,$curso,$Id));
        break;
    default:
        # code...
        break;
}
//Sirve para mostrar los datos en mi formulario
$sql = "SELECT * FROM curso ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultadoCurso = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Sirve para mostrar los datos en mi tabla
$sql = "SELECT * FROM tema_contenido ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultadoContenido = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>