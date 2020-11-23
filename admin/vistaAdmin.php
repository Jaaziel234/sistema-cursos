<!----Menu principal------>
<?php include_once "templates/header.php";   ?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!----El back-end o logica---->
<?php include_once "modulos/admin.php";   ?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Administración</h1>
            <p>Agregar administrador</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item"><a href="#">Formulario</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-8 offset-md-2">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $Id ?>">
                            <div class="form-group">
                                <label for="nombresAdmin">Nombres</label>
                                <input name="nombresAdmin" class="form-control" id="nombrePlan" type="text" placeholder="Ingrese su nombre" value="<?php echo $nombresAdmin ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidosAdmin">Apellidos</label>
                                <input name="apellidosAdmin" class="form-control" id="Descripcion" type="text" placeholder="Ingrese sus apellidos" value="<?php echo $apellidosAdmin ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuarioAdmin">Usuario</label>
                                <input name="usuarioAdmin" class="form-control" id="Descripcion" type="text" placeholder="Usuario " value="<?php echo $usuarioAdmin ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="claveAdmin">Contraseña</label>
                                <input name="claveAdmin" class="form-control" id="Descripcion" type="password" placeholder="Password" value="<?php echo $claveAdmin ?>" required>
                            </div>
                            <div class="tile-footer">
                                <?php if (isset($_POST['seleccionar'])) { ?>
                                <input name="accion" value="Actualizar" class="btn btn-primary" type="submit">
                                <?php }else{ ?>
                                <input name="accion" value="Agregar" class="btn btn-primary" type="submit">
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                    <!---Parte de la tabla ---->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Administradores</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sqlDatos as $data) : ?>
                                        <tr>
                                            <th><?php echo $data['Id'] ?></th>
                                            <th><?php echo $data['Nombres'] ?></th>
                                            <th><?php echo $data['Apellidos'] ?></th>
                                            <th><?php echo $data['Usuario'] ?></th>
                                            <th><?php echo $data['Contraseña'] ?></th>
                                            <th>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                                                    <input name="nombresAdmin" type="hidden" value="<?php echo $data['Nombres'] ?>">
                                                    <input name="apellidosAdmin" type="hidden" value="<?php echo $data['Apellidos'] ?>">
                                                    <input name="usuarioAdmin" type="hidden" value="<?php echo $data['Usuario'] ?>">
                                                    <input name="claveAdmin" type="hidden" value="<?php echo $data['Contraseña'] ?>">
                                                    <input class="btn btn-success" type="submit" name="seleccionar" value="seleccionar">
                                                    <button class="btn btn-danger" type="submit" name="accion" value="Eliminar">Eliminar</button>
                                                </form>
                                            </th>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>