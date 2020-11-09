<?php
//Cabecera de sitio web
include_once "plantillas/header.php";
?>

<section class="profile"> 
 <div class="container">
  <div class="row pt-5">
        <div class="col-lg-4 col-sm-12 col-md-4">
            <div class="tile">
                <h3 class="text-center">TU PERFIL</h3>
                <div class="card">
                    <div class="d-flex justify-content-center">
                    <?php if(isset($_SESSION['usuario'])):?><img style="width: 150px" class="" src="./recursos/images/fotoDocente/<?php echo $_SESSION['usuario']['Foto']; ?>" alt="User Image"><?php else:?><img style="width: 100px" class="app-sidebar__user-avatar bg-light" src="./recursos/images/fotoDocente/linux-logo.png" alt="User Image">
                        <?php endif?>  
                    </div>
                    
                    <div class="card-body d-flex justify-content-center flex-column">
                        <strong>Nombre completo:</strong>
                            <?php if(isset($_SESSION['usuario'])) { ?>
                            <?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']; ?>
                            <?php } ?>
                          <strong>Correo:</strong>
                            <?php if(isset($_SESSION['usuario'])) { ?>
                            <?php echo $_SESSION['usuario']['Correo']; ?>
                            <?php } ?>
                        <strong>Usuario:</strong>
                            <?php if(isset($_SESSION['usuario'])) { ?>
                            <?php echo $_SESSION['usuario']['Usuario']; ?>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8">
            <div class="tile">
                <form action="VistaPerfil.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input hidden="" name="Id" class="form-control" id="Nombres" type="text" value="<?php echo $_SESSION['usuario']['Id']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Nombres">Nombres</label>
                                <input name="Nombres" class="form-control" id="Nombres" type="text" value="<?php echo $_SESSION['usuario']['Nombres']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Apellidos">Apellidos</label>
                                <input name="Apellidos" class="form-control" id="Apellidos" type="text" value="<?php echo $_SESSION['usuario']['Apellidos']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Sexo">Seleccione su sexo</label>
                                <select class="form-control" id="Sexo" name="Sexo" required="">
                                    <option value="<?php echo $_SESSION['usuario']['Sexo']; ?>"><?php if ($_SESSION['usuario']['Sexo']=='M'){ echo "Masculino";}else{ echo "Femenino";} ?></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                                <input name="Fecha_nacimiento" class="form-control" id="Fecha_nacimiento" type="text" value="<?php echo $_SESSION['usuario']['Fecha_nacimiento']; ?>">
                            </div>
                             <div class="form-group">
                                <label for="Correo">Correo</label>
                                <input name="Correo" class="form-control" id="Correo" type="email" value="<?php echo $_SESSION['usuario']['Correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Usuario">Usuario</label>
                                <input name="Usuario" class="form-control" id="Usuario" type="text" value="<?php echo $_SESSION['usuario']['Usuario']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Contraseña">Contraseña</label>
                                <input name="Contraseña" class="form-control" id="Contraseña" type="password" value="<?php echo $_SESSION['usuario']['Contraseña']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Foto">Foto</label>
                                <input name="Foto" class="form-control" id="Foto" accept="image/*" type="file" placeholder="Foto">
                            </div>
                            <div class="tile-footer">
                                <input name="accion" value="Actualizar" class="btn btn-primary" type="submit">
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>
</section>
<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->