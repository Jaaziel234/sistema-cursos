<?php
//Back-end
include_once 'modulos/registrarse.php';
//Cabecera de sitio web
include_once "plantillas/header.php";
?>

<form class="formulario" method="POST" action="" onsubmit="return validacion()">
    <h1>Registrate</h1>
    <!----Mensaje de validacion de formulario.---->
    <!----Fin validacion---->
    <div class="contenedor">
        <div class="input-contenedor">
            <input id="nombres" name="nombres" type="text" placeholder="Nombre" required value="<?php echo $nombre ?>">
        </div>
        <div class="input-contenedor">
            <input id="apellidos" name="apellidos" type="text" placeholder="Apellido" required value="<?php echo $apellido ?>">
        </div>
        <div class="input-contenedor">
            <input id="email" name="correo" type="email" placeholder="Email" required>
        </div>
        <div class="input-contenedor">
            <input id="usuario" name="usuario"  type="text" placeholder="Usuario" required>
        </div>
        <div class="input-contenedor">
            <input name="clave" id="clave"  type="password" placeholder="Contraseña" required>
        </div>
        <input name="accion" type="submit" value="Registrate" class="button">
        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p>¿Ya tienes una cuenta?<a class="link" href="iniciarSesion.php">Iniciar Sesion</a></p>
    </div>
</form>

<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->