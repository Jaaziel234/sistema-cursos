<?php
   include_once ("./config/conexion.php");
   //Guardamos los datos recibido de POST -> add-teacher.php front-end
   $Id = isset($_POST['Id'])? $_POST['Id'] : ""; //Sirve para actualizar
   $nombres = isset($_POST['Nombres']) ? $_POST['Nombres'] : "";
   $apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : "";
   $sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : "";
   $fechaNacimiento = isset($_POST['Fecha_nacimiento']) ? $_POST['Fecha_nacimiento'] : "";
   $correo = isset($_POST['Correo']) ? $_POST['Correo'] : "";
   $usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : "";
   $contraseña = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : "";
   $foto = isset($_FILES['Foto']['name']) ? $_FILES['Foto'] : "";
   
   //Input segun la opcion hacer
   $accion = isset($_POST['accion']) ? $_POST['accion'] : "";
   switch ($accion) {
           
       case 'Actualizar':
           //Sirve para actualizar desde su perfil y validar si es el docente su estado siempre sera activo
           if(isset($_GET['update'])){
               
           }
           $sql = "UPDATE usuario SET Nombres=?,Apellidos=?,Sexo=?,Fecha_nacimiento=?,Correo=?,Usuario=?,Contraseña=?,Foto=?WHERE Id=?";
           $sentencia = $pdo->prepare($sql);
           $sentencia->execute(array($nombres,$apellidos,$sexo,$fechaNacimiento,$correo,$usuario,$contraseña,$foto,$Id));
           //Movemos la imagen
           $fecha = new DateTime();
           //Seleecionamos el nombre del archivo
           $nombreFoto = ($foto != "") ? $fecha->getTimestamp()."_".$_FILES['Foto']['name'] : "foto.jpg";
           //Seleccionamos el value nombre temporal
           $tmpFoto = isset($_FILES['Foto']['tmp_name']) ? $_FILES['Foto']['tmp_name'] : "";
   
           if ($tmpFoto != ''){
               //Funcion para mover la foto
               move_uploaded_file($tmpFoto,"./admin/recursos/images/fotoUsuario/".$nombreFoto);
               //para borrar la foto de la carpeta donde se guardan
               $sentencia=$pdo->prepare("SELECT Foto FROM usuario WHERE Id=:Id");
               $sentencia->bindParam(':Id',$Id);
               $sentencia->execute();
               //Obtemos en un array la columna Foto, los datos
               $fila= $sentencia->fetch(PDO::FETCH_ASSOC);
               //print_r($fila);//solo para provar//
   
               if(isset($fila["Foto"])){
                   //Comprobamos si existe
                   if (file_exists("./admin/recursos/images/fotoUsuario/".$fila["Foto"])) {
                       unlink("./admin/recursos/images/fotoUsuario/".$fila["Foto"]);
                   }
               }
               $sql = "UPDATE usuario SET Foto=? WHERE Id=?";
               $sentencia = $pdo->prepare($sql);
               $sentencia->execute(array($nombreFoto,$Id)); 
           }
           //Si existe esta peticion redireccionar a 
           if(isset($_GET['update'])){
               echo "<script>alert('Vuelve a iniciar sesión para ver los cambios')</script>";
   
               header("Location./index.php");
           }else{
               header("Location:./index.php");
           }
   
           break;
       default:
           # code...
           break;
   }
   $pdo = null;
   ?>