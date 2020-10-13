<?php
//PDO::MYSQL_ATTR_INIT_COMMAND-> sirve para establecer el codificado de caracteres
try{
    $pdo = new PDO("mysql:host=localhost;dbname=sistema-cursos","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "<script>alert('conectado')</script>";
}catch(Exception $e){
    die($e->getMessaget());
    //echo "<script>alert('Error')</script>";
}
?>