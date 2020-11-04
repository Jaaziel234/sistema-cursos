<!----Menu principal------>
<?php include_once "templates/header.php";   
//<!----Barra lateral---->
include_once "templates/sidebar.php";   
//<!----El back-end o logica---->
include_once "modulos/pago.php";   
?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Administración</h1>
            <p>Agregar pago</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Pago</li>
            <li class="breadcrumb-item"><a href="#">Formulario</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $Id ?>">
                            <div class="form-group">
                                <label for="pago">Pago</label>
                                <input name="nombrePago" class="form-control" id="pago" type="text" placeholder="Ingresar pago" value="<?php echo $nombrePago ?>">
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
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="tile">
                            <h3 class="tile-title">Pagos</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del pago</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado as $data) : ?>
                                        <tr>
                                            <th><?php echo $data['Id'] ?></th>
                                            <th><?php echo $data['Nombre'] ?></th>
                                            <th>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                                                    <input name="nombrePago" type="hidden" value="<?php echo $data['Nombre'] ?>">

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