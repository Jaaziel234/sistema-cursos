<!----Menu principal------>
<?php include_once "templates/header.php";   ?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!----El back-end o logica---->
<?php include_once "modulos/temaContenido.php";   
//Obteniendo ID por GET desde vistaAgregarTemas.php
$id_Curso = isset($_GET['id']) ? $_GET['id'] : '';
//Precargamos la vista->enviando ID del curso
if (isset($_POST['accion'])) //Comrobacion envio de formulario
{
    echo "<script>window.setTimeout(function() { window.location = './vistaTema.php?id=$id_Curso' }, 10);</script>";
}
?>
<!----Contenido para  mostrar----->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Administración de Temario</h1>
            <p>Agregar nombre de tema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tema</li>
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
                                <label for="temaContenido">Nombre de tema</label>
                                <input name="temaContenido" class="form-control" id="temaContenido" type="text" placeholder="Nombre de tema" value="<?php echo $temaContenido ?>">
                            </div>
                            <div class="form-group">
                                <label for="curso">Curso</label>
                                <select class="form-control" id="curso" name="curso" required="">
                                    <?php $curse; foreach($resultadoCurso as $curso) : ?>
                                    <!--Selecccion de curso--->
                                    <?php if($id_Curso == $curso['Id']):?>
                                        <!--Guarda el curso para mostrar en tabla--->
                                        <?php $curse = $curso['Nombre'] ?>
                                    <option value="<?php echo $curso['Id']; ?>"><?php echo $curso['Nombre']; ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
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
                            <h3 class="tile-title">Temas de Cursos</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Temario</th>
                                            <th>Curso</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultadoContenido as $data) : ?>
                                            <!--Selecccion de curso--->
                                        <?php if($id_Curso == $data['Id_Curso']):?>
                                        <tr>
                                            <th><?php echo $data['Id'] ?></th>
                                            <th><?php echo $data['Tema'] ?></th>
                                            <th><?php echo $curse ?></th>
                                            <th>
                                                <form action="" method="POST">
                                                    <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                                                    <input name="temaContenido" type="hidden" value="<?php echo $data['Tema'] ?>">
                                                    <input name="curso" type="hidden" value="<?php echo $data['Id_Curso'] ?>">

                                                    <input class="btn btn-success" type="submit" name="seleccionar" value="seleccionar">
                                                    <button class="btn btn-danger" type="submit" name="accion" value="Eliminar">Eliminar</button>
                                                </form>
                                            </th>
                                        </tr>
                                        <?php endif ?>
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