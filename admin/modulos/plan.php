<?php
include_once "../config/conexion.php";//Guardamos los datos recibido de POST -> add-teacher.php front-end
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar
$nombrePlan = isset($_POST['nombrePlan']) ? $_POST['nombrePlan'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";

//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
switch ($accion) {
        //Agregamos los datos a nuestra base de datos
    case 'Agregar':
        $sql = "INSERT INTO plan (Tipo_Plan, Descripcion, Precio) VALUES(?,?,?)";
        //Consulta SQL
        $sentencia = $pdo->prepare($sql);
        //Pasando los dat90os
        $sentencia->execute(array($nombrePlan,$descripcion,$precio));
        //Comprando si se insertaron
        if ($sentencia){
            echo "<script>window.setTimeout(function() { window.location = './vistaPlan.php' }, 1000);</script>";
        }else{
            echo "<script>alert('Error')</script>";
        }
        break;
    case 'Eliminar':
        //Obtenemos el ID del plan
        $Id = isset($_POST['Id'])? $_POST['Id'] : "";

        //Consulta para eliminar el dato
        $sql = "DELETE FROM plan WHERE Id=:Id";
        $sentencia  = $pdo->prepare($sql);
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        //Redirigimos a la vista
        echo "<script>window.setTimeout(function() { window.location = './vistaPlan.php' }, 1000);</script>";
        break;
    case 'Actualizar':
        $sql = "UPDATE plan SET Tipo_plan=?,Descripcion=?,Precio=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombrePlan,$descripcion,$precio));

        header("Location:../vistaPlan.php");

        break;
    default:
        # code...
        break;
}
$sqlmostrar = "select * from plan";
$sql = $pdo->prepare($sqlmostrar);
$sql->execute();
$sqlDatos = $sql->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;
?>