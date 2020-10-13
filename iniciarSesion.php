<?php
include_once 'modulos/iniciarSesion.php';
//Cabecera de sitio web
include_once "plantillas/header.php";
?>
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

<!-- Formulario de session -->
<form class="formulario" method="POST" action="">
    <h1>Iniciar sesión</h1>
    <p class="text-center">BIENVENIDO DE NUEVO </p>
    <div class="contenedor">
        <div class="input-contenedor">
            <input name="usuario" type="text" placeholder="Usuario" required>
        </div>
        <div class="input-contenedor">
            <input name="clave" type="password" placeholder="Contraseña" required>
        </div>
        <input type="submit" value="Login" class="button">
        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p>¿No tienes una cuenta? <a class="link" href="registrarse.php">Registrate </a></p>
    </div>
</form>

<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->