<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="recursos/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sistema | Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Sistema de Cursos</h1>
      </div>
      <!------Alerta--------->
      <?php if(isset($_SESSION['errores'])=="errorSession"): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        El usuario o contraseña es invalido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-------Eliminando la session errores----->
      <?php unset($_SESSION['errores']); ?>
      <?php endif; ?>
      <!------Fin Alerta----->
      <div class="login-box">
        <form class="login-form" action="modulos/login/index.php" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input name="usuario" class="form-control" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">CLAVE</label>
            <input name="clave" class="form-control" type="password" placeholder="Password">
          </div>
          <!----
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Recuperar contraseña ?</a></p>
            </div>
          </div>
          ----->
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>
        <!----
        <form class="forget-form" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Volver a login</a></p>
          </div>
        </form>
        --->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="recursos/js/jquery-3.3.1.min.js"></script>
    <script src="recursos/js/popper.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
    <script src="recursos/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="recursos/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>