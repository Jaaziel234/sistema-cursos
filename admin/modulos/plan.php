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
        $sql = "UPDATE docente SET Nombres=?,Apellidos=?,Sexo=?,Usuario=?,Contraseña=?,Estado=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombres,$apellidos,$sexo,$usuario,$clave,$estado,$Id));
        //Movemos la imagen
        $fecha = new DateTime();
        //Seleecionamos el nombre del archivo
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp()."_".$_FILES['Foto']['name'] : "foto.jpg";
        //Seleccionamos el value nombre temporal
        $tmpFoto = isset($_FILES['Foto']['tmp_name']) ? $_FILES['Foto']['tmp_name'] : "";

        if ($tmpFoto != ''){
            //Funcion para mover la foto
            move_uploaded_file($tmpFoto,"../recursos/images/fotoDocente/".$nombreFoto);
            //para borrar la foto de la carpeta donde se guardan
            $sentencia=$pdo->prepare("SELECT Foto FROM docente WHERE Id=:Id");
            $sentencia->bindParam(':Id',$Id);
            $sentencia->execute();
            //Obtemos en un array la columna Foto, los datos
            $fila= $sentencia->fetch(PDO::FETCH_ASSOC);
            //print_r($fila);//solo para provar//

            if(isset($fila["Foto"])){
                //Comprobamos si existe
                if (file_exists("../recursos/images/fotoDocente/".$fila["Foto"])) {
                    unlink("../recursos/images/fotoDocente/".$fila["Foto"]);
                }
            }
            $sql = "UPDATE docente SET Foto=? WHERE Id=?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($nombreFoto,$Id)); 
        }
        header("Location:../vistaDocente.php");

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