<!----Menu principal------>
<?php include_once "templates/header.php";   ?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!----El back-end o logica---->
<?php include_once "modulos/plan.php";   ?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Administración</h1>
            <p>Agregar planes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Planes</li>
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
                                <label for="nombrePlan">Nombre del Plan</label>
                                <input name="nombrePlan" class="form-control" id="nombrePlan" type="text" placeholder="nombre Plan" value="<?php echo $nombrePlan ?>">
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                                <input name="descripcion" class="form-control" id="Descripcion" type="text" placeholder="Descripción" value="<?php echo $descripcion ?>">
                            </div>
                            <div class="form-group">
                                <label for="Precio">Precio</label>
                                <input name="precio" class="form-control" id="Precio" type="number" placeholder="Precio" value="<?php echo $precio ?>">
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
                            <h3 class="tile-title">Planes disponibles</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del Plan</th>
                                            <th>Descripcion</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sqlDatos as $data) : ?>
                                        <tr>
                                            <th><?php echo $data['Id'] ?></th>
                                            <th><?php echo $data['Tipo_Plan'] ?></th>
                                            <th><?php echo $data['Descripcion'] ?></th>
                                            <th><?php echo $data['Precio'] ?></th>
                                            <th>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                                                    <input name="nombrePlan" type="hidden" value="<?php echo $data['Tipo_Plan'] ?>">
                                                    <input name="descripcion" type="hidden" value="<?php echo $data['Descripcion'] ?>">
                                                    <input name="precio" type="hidden" value="<?php echo $data['Precio'] ?>">

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