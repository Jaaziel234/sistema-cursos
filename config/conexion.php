<?php

try{
	$pdo = new PDO("mysql:host=localhost;dbname=sistema-cursos;charset=utf8","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	//echo "<script>alert('conectado')</script>";
}catch(Exception $e){
	//echo "<script>alert('Error')</script>";
}


?>