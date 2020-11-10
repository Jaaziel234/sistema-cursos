<!----Menu principal------>
<?php include_once "templates/header.php";   ?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Perfil</h1>
            <p>Actualizacion&perfil</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Perfil</li>
            <li class="breadcrumb-item"><a href="#">Administrador</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4">
            <div class="tile">
                <h3 class="text-center">Perfil</h3>
                <div class="card">
                    <div class="d-flex justify-content-center">
                      <?php if(isset($_SESSION['admin'])):?><img style="width: 150px" class="" src="./recursos/images/fotoDocente/<?php echo $_SESSION['admin']['Foto']; ?>" alt="User Image"><?php else:?><img style="width: 100px" class="app-sidebar__user-avatar bg-light" src="./recursos/images/fotoDocente/linux-logo.png" alt="User Image">
                        <?php endif?>  
                    </div>
                    
                    <div class="card-body d-flex justify-content-center flex-column">
                        <strong>Nombre completo:</strong>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <?php echo $_SESSION['admin']['Nombres']." ".$_SESSION['admin']['Apellidos']; ?>
                            <?php } ?>
                        <strong>Sexo:</strong>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <?php echo $_SESSION['admin']['Sexo']; ?>
                            <?php } ?>
                        <strong>Usuario:</strong>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <?php echo $_SESSION['admin']['Usuario']; ?>
                            <?php } ?>
                        <strong>Estado:</strong>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <?php echo "Activo"; ?>
                            <?php }else{ ?>
                            <?php echo "Activo"; ?>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8">
            <div class="tile">
                <form action="modulos/docente.php?update=docente" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input hidden="" name="Id" class="form-control" id="Nombres" type="text" value="<?php echo $_SESSION['admin']['Id']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Nombres">Nombres</label>
                                <input name="Nombres" class="form-control" id="Nombres" type="text" value="<?php echo $_SESSION['admin']['Nombres']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Apellidos">Apellidos</label>
                                <input name="Apellidos" class="form-control" id="Apellidos" type="text" value="<?php echo $_SESSION['admin']['Apellidos']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Sexo">Seleccione su sexo</label>
                                <select class="form-control" id="Sexo" name="Sexo" required="">
                                    <option value="<?php echo $_SESSION['admin']['Sexo']; ?>"><?php if ($_SESSION['admin']['Sexo']=='M'){ echo "Masculino";}else{ echo "Femenino";} ?></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Usuario">Usuario</label>
                                <input name="Usuario" class="form-control" id="Usuario" type="text" value="<?php echo $_SESSION['admin']['Usuario']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Clave">Contraseña</label>
                                <input name="Clave" class="form-control" id="Clave" type="password" value="<?php echo $_SESSION['admin']['Contraseña']; ?>">
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
</main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>