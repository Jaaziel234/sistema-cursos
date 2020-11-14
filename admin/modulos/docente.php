<?php
include_once "../../config/conexion.php";
//Guardamos los datos recibido de POST -> add-teacher.php front-end
$Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar
$nombres = isset($_POST['Nombres']) ? $_POST['Nombres'] : "";
$apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : "";
$sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : "";
$usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : "";
$clave = isset($_POST['Clave']) ? $_POST['Clave'] : "";
//Encriptando clave
$claveHash = password_hash($clave, PASSWORD_DEFAULT);
$foto = isset($_FILES['Foto']['name']) ? $_FILES['Foto'] : "";
$estado = isset($_POST['Estado']) ? $_POST['Estado'] : "";
//Input segun la opcion hacer
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
switch ($accion) {
        //Agregamos los datos a nuestra base de datos
    case 'Agregar':
        //Validando si no existe un docente que se ingresa a la BD
        $sqlMostrar = "SELECT Usuario FROM docente WHERE Usuario=?";
        $sentencia = $pdo->prepare($sqlMostrar);
        $sentencia->execute(array($usuario));
        //Comprobacion si no existe en administrador
        $sqlMostrarAdmin = "SELECT Usuario FROM administrador WHERE Usuario=?";
        $sentencia1 = $pdo->prepare($sqlMostrarAdmin);
        $sentencia1->execute(array($usuario));
        if($sentencia->rowCount()>0 || $sentencia1->rowCount() > 0){
            echo "<script>alert('Ya existe este usuario')</script>";
            header("Location:../vistaAgregarDocente.php");
        }else{
            $sql = "INSERT INTO docente (Nombres, Apellidos, Sexo, Usuario, Contraseña, Foto, Estado) VALUES(?,?,?,?,?,?,?)";
            //Agregando la fecha y moviendo el archivo a una carpeta especifica
            $fecha = new DateTime();
            //Seleecionamos el nombre del archivo
            $nombreFoto = ($foto != "") ? $fecha->getTimestamp()."_".$_FILES['Foto']['name'] : "foto.jpg";
            //Seleccionamos el value nombre temporal
            $tmpFoto = isset($_FILES['Foto']['tmp_name']) ? $_FILES['Foto']['tmp_name'] : "";

            if ($tmpFoto != ''){
                //Funcion para mover la foto
                move_uploaded_file($tmpFoto,"../recursos/images/fotoDocente/".$nombreFoto);
            }
            //Consulta SQL
            $sentencia = $pdo->prepare($sql);
            //Pasando los datos
            $sentencia->execute(array($nombres,$apellidos,$sexo,$usuario,$claveHash,$nombreFoto,$estado));
            //Comprando si se insertaron
            if ($sentencia){
                header("Location:../vistaAgregarDocente.php");
            }else{
                echo "<script>alert('Error')</script>";
            }
        }
        break;
    case 'Eliminar':
        //Obtenemos el ID del docente
        $Id = isset($_POST['Id'])? $_POST['Id'] : "";
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
        //Consulta para eliminar el dato
        $sql = "DELETE FROM docente WHERE Id=:Id";
        $sentencia  = $pdo->prepare($sql);
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        //Redirigimos a la vista
        header("Location:../vistaDocente.php");
        break;
    case 'Actualizar':
        //Sirve para actualizar desde su perfil y validar si es el docente su estado siempre sera activo
        if(isset($_GET['update'])){
            $estado = 1;
        }
        $sql = "UPDATE docente SET Nombres=?,Apellidos=?,Sexo=?,Usuario=?,Contraseña=?,Estado=? WHERE Id=?";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombres,$apellidos,$sexo,$usuario,$claveHash,$estado,$Id));
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
        //Si existe esta peticion redireccionar a 
        if(isset($_GET['update'])){
            echo "<script>alert('Vuelve a iniciar sesión para ver los cambios')</script>";
            header("Location:../vistaPerfil.php");
        }else{
            header("Location:../vistaDocente.php");
        }

        break;
    default:
        # code...
        break;
}
$pdo = null;
?>