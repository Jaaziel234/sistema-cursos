<!----Menu principal------>
<?php include_once "templates/header.php";?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>

<?php
$Id = isset($_POST['Id']) ? $_POST['Id'] : "";
$nombres = isset($_POST['Nombres']) ? $_POST['Nombres'] : "";
$apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : "";

$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";

$sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : "";
$usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : "";
$clave = isset($_POST['Clave']) ? $_POST['Clave'] : "";
$foto = isset($_FILES['Foto']['name']) ? $_FILES['Foto'] : "";
$estado = isset($_POST['Estado']) ? $_POST['Estado'] : "";
?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="modulos/docente.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input hidden="" name="Id" class="form-control" id="Nombres" type="text" value="<?php echo $Id; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Nombres">Nombres</label>
                                <input name="Nombres" class="form-control" id="Nombres" type="text" value="<?php echo $nombres; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Apellidos">Apellidos</label>
                                <input name="Apellidos" class="form-control" id="Apellidos" type="text" value="<?php echo $apellidos; ?>">
                            </div>

                            <div class="form-group">
                                <textarea name="descripcionDocente" id="" cols="30" rows="10" class="form-control" placeholder="Descripción o profesión"><?php echo $descripcion; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Sexo">Seleccione su sexo</label>
                                <select class="form-control" id="Sexo" name="Sexo" required="">
                                    <option value="<?php echo $sexo; ?>"><?php if ($sexo=='M'){ echo "Masculino";}else{ echo "Femenino";} ?></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input name="email" class="form-control" id="email" type="email" placeholder="E-mail" required="" value="<?php echo $email; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Usuario">Usuario</label>
                                <input name="Usuario" class="form-control" id="Usuario" type="text" value="<?php echo $usuario; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Clave">Contraseña</label>
                                <input name="Clave" class="form-control" id="Clave" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="Foto">Foto</label>
                                <input name="Foto" class="form-control" id="Foto" accept="image/*" type="file" placeholder="Foto">
                            </div>
                            <div class="form-group">
                                <label for="">Estado de la cuenta</label>
                                <select class="form-control" name="Estado">
                                    <option value="<?php echo $estado; ?>"><?php if($estado == 1){ echo "Activado";}else{ echo "Desactivado";} ?></option>
                                    <option value="1">Activar</option>
                                    <option value="0">Desactivar</option>
                                </select>
                            </div>
                            <div class="tile-footer">
                                <input name="accion" value="Actualizar" class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <h3>Estas en la sesión de actualización de docente</h3>
                        <p>Los datos deben ser correctos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>