<?php
//Archivo de sesiones
include_once "../config/sesiones.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="description" content="Sistema para administrar los cursos de la plataforma de cursos en linea">
        <title>Sistema | Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="./recursos/css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="app sidebar-mini">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="index.html">Admin | Cursos</a>
            <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                <li class="app-search">
                    <input class="app-search__input" type="search" placeholder="Search">
                    <button class="app-search__button"><i class="fa fa-search"></i></button>
                </li>
                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <!---No disponible para administrador Principal-->
                        <?php if(isset($_SESSION['admin'])):?>
                            <li><a class="dropdown-item" href="vistaPerfil.php"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                        <?php endif?>
                        <li><a class="dropdown-item" href="./modulos/cerrarSesion.php"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </header>