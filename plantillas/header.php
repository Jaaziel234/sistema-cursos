<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Codificacion -->
        <meta charset="utf-8">
        <title>CoderZoom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="recursos/css/bootstrap.css">
        <!--Estilos CSS -->
        <link rel="stylesheet" href="recursos/css/style.css" type="text/css" />
        <!-- Ionic icons -->
        <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    </head>
    <body>
        <!-- N A V B A R -->
        <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon ion-md-menu"></span>
            </button>
            <a href="index.php"><img src="recursos/images/logo.png" class="img-fluid nav-logo-mobile" alt="Company Logo"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="container">
                    <a href="index.php"><img src="recursos/images/logo.png" class="img-fluid nav-logo-desktop" alt="Company Logo" width="150px"></a>
                    <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
                        <li class="nav-item nav-custom-link">
                            <a class="nav-link" href="cursos.php">CURSOS <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                        </li>
                        <li class="nav-item nav-custom-link">
                            <a class="nav-link" href=" ">PREMIUM <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                        </li>
                        <?php if(!isset($_SESSION['usuario'])) { ?>
                        <li class="nav-item nav-custom-link">
                            <a class="nav-link" href="iniciarSesion.php">INICIAR SESION <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                        </li>
                        <li class="nav-item nav-custom-link btn btn-demo-small">
                            <a class="nav-link" href="registrarse.php">REGISTRARSE <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item nav-custom-link btn btn-demo-small">
                            <a class="nav-link" href="#">PERFIL <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>