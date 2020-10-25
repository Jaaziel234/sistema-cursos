<?php
//Cabecera de sitio web
include_once "plantillas/header.php";
?>

<form class="formulario" method="POST" action="modulos/registrarse.php">
    <h1>Registrate</h1>
    <?php if (isset($aErrores)): ?>
        <?php foreach($aErrores as $error) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo $error ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endforeach?>
    <?php endif ?>
    <div class="contenedor">
        <div class="input-contenedor">
            <input name="nombres" type="text" placeholder="Nombre" required>
        </div>
        <div class="input-contenedor">
            <input name="apellidos" type="text" placeholder="Apellido" required>
        </div>
        <div class="input-contenedor">
            <input name="correo" type="text" placeholder="Email" required>
        </div>
        <div class="input-contenedor">
            <input name="usuario"  type="text" placeholder="Usuario" required>
        </div>
        <div class="input-contenedor">
            <input name="clave"  type="password" placeholder="Contraseña" required>
        </div>
        <input name="accion" type="submit" value="Registrate" class="button">
        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p>¿Ya tienes una cuenta?<a class="link" href="iniciarSesion.php">Iniciar Sesion</a></p>
    </div>
</form>

<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->