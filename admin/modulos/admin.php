<?php
include_once "../config/conexion.php";//Guardamos los datos recibido de POST -> add-teacher.php front-end
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar
$nombresAdmin = isset($_POST['nombresAdmin']) ? $_POST['nombresAdmin'] : "";
$apellidosAdmin = isset($_POST['apellidosAdmin']) ? $_POST['apellidosAdmin'] : "";
$usuarioAdmin = isset($_POST['usuarioAdmin']) ? $_POST['usuarioAdmin'] : "";
$claveAdmin = isset($_POST['claveAdmin']) ? $_POST['claveAdmin'] : "";

//Verificando clave para actualizar
if (strlen($claveAdmin) > 20 ){
    $claveHash = $claveAdmin;
}else{
    //Encriptando clave
    $clave_hash = password_hash($claveAdmin, PASSWORD_DEFAULT);
    $claveHash = $clave_hash;
}

//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
switch ($accion) {
        //Agregamos los datos a nuestra base de datos
    case 'Agregar':
        //Comprobacion de registro
        $sqlMostrar = "SELECT Usuario FROM docente WHERE Usuario=?";
        $sentencia = $pdo->prepare($sqlMostrar);
        $sentencia->execute(array($usuarioAdmin));
        //Comprobacion si no existe en administrador
        $sqlMostrarAdmin = "SELECT Usuario FROM administrador WHERE Usuario=?";
        $sentencia1 = $pdo->prepare($sqlMostrarAdmin);
        $sentencia1->execute(array($usuarioAdmin));
        if($sentencia->rowCount()>0 || $sentencia1->rowCount() > 0){
            echo "<script>alert('Ya existe este usuario')</script>";
        }else{
            //SQL para insertar a la BD
            $sql = "INSERT INTO administrador (Nombres, Apellidos, Usuario,Contraseña,Estado) VALUES(?,?,?,?,'1')";
            //Consulta SQL
            $sentencia = $pdo->prepare($sql);
            //Pasando los dat90os
            $sentencia->execute(array($nombresAdmin,$apellidosAdmin,$usuarioAdmin,$claveHash));
            //Comprando si se insertaron
            if ($sentencia){
                echo "<script>window.setTimeout(function() { window.location = './vistaAdmin.php' }, 10);</script>";
            }else{
                echo "<script>alert('Error')</script>";
            }
        }
        
        break;
    case 'Eliminar':
        //Evaluacion de seguridad para no eliminar todos los admin
        if ($Id != 1){
            $sql = "DELETE FROM administrador WHERE Id=:Id";
            $sentencia  = $pdo->prepare($sql);
            $sentencia->bindParam(':Id',$Id);
            $sentencia->execute();
            //Redirigimos a la vista
            echo "<script>window.setTimeout(function() { window.location = './vistaAdmin.php' }, 10);</script>";
        }else{echo "<script>alert('Imposible eliminar')</script>";}
        break;
    case 'Actualizar':
        $sql = "UPDATE administrador SET Nombres=?,Apellidos=?,Usuario=?,Contraseña=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombresAdmin,$apellidosAdmin,$usuarioAdmin,$claveHash,$Id));

        echo "<script>window.setTimeout(function() { window.location = './vistaAdmin.php' }, 10);</script>";

        break;
    default:
        # code...
        break;
}
$sqlmostrar = "SELECT * FROM administrador";
$sql = $pdo->prepare($sqlmostrar);
$sql->execute();
$sqlDatos = $sql->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;
?>