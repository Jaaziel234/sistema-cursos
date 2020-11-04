<?php
include_once "../config/conexion.php";

//Datos enviados desde el formulario, obteniendo por metodo POST
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar y eliminar
$nombrePago = isset($_POST['nombrePago']) ? $_POST['nombrePago'] : "";
//$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

//Usando estrurando Switch, para evaluar diferentes eventos
switch ($accion) {
        //Agregamos los datos a nuestra base de datos
    case 'Agregar':
        $sql = "INSERT INTO pago (Nombre) VALUES(?)";
        //Consulta SQL
        $sentencia = $pdo->prepare($sql);
        //Pasando los datos de tipo array
        $sentencia->execute(array($nombrePago));
        //Comprobando si se insertaron
        if ($sentencia){
            echo "<script>alert('Agregados')</script>";
            echo "<script>window.setTimeout(function() { window.location = './vistaPago.php' }, 10);</script>";
        }else{
            echo "<script>alert('Error al insertar los datos')</script>";
        }
        break;

    case 'Eliminar':
        try{
            //Consulta para eliminar el dato
            $sql = "DELETE FROM pago WHERE Id=:Id";
            $sentencia  = $pdo->prepare($sql);
            $sentencia->bindParam(':Id',$Id);
            $sentencia->execute();
            //Redirigimos a la vista
            echo "<script>window.setTimeout(function() { window.location = './vistaPago.php' }, 10);</script>";
        }catch(Exception $e){
            echo "<script>alert('Error al eliminar: $nombreCarrera')</script>";
        }
        break;
    case 'Actualizar':
        //Consulta para actualizar los datos de tabla carrera
        $sql = "UPDATE pago SET Nombre=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombrePago,$Id));
        echo "<script>window.setTimeout(function() { window.location = './vistaPago.php' }, 10);</script>";

        break;
    default:
        # code...
        break;
}
//Sirve para mostrar los datos en mi tabla
$sql = "SELECT * FROM pago ORDER BY Id ASC";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
//Mis datos guardados en un array
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>