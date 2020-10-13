<?php
//Incluimos la conexion a base de datos
include_once 'config/conexion.php';
$usuario = isset($_POST['usuario'])? $_POST['usuario'] : "";
$clave = isset($_POST['clave'])? $_POST['clave'] : "";

//Consulta SQL
$sqlUser = "SELECT * FROM usuario WHERE Usuario=:usuario AND Contraseña=:clave";

//Ejecutando consulta 
$resultado = $pdo->prepare($sqlUser);
$resultado->bindParam(':usuario', $usuario,PDO::PARAM_STR);
$resultado->bindParam(':clave', $clave, PDO::PARAM_STR);
$resultado->execute();
//La consulta para obtener los datos devueltos 
$loginUser = $resultado->fetch(PDO::FETCH_ASSOC);

if ($resultado->rowCount() > 0){
    //Iniciamos la session de usuario 
    session_start();
    $_SESSION['usuario'] = $loginUser;
    header("Location:index.php");
}else{
    $_SESSION['errores'] = 'errorSession'; //Mensaje de error (Session)
}
$pdo = ''; //Vaciamos la variable
?>