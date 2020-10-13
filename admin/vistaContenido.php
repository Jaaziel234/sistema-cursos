<!----Menu principal------>
<?php include_once "templates/header.php";  
//<!----Barra lateral---->
include_once "templates/sidebar.php";   
//<!----El back-end o logica---->
include_once "modulos/contenidoCurso.php";   
?>
<!----Contenido para  mostrar----->
<?php 
$id_Curso = isset($_GET['id']) ? $_GET['id'] : '';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Administración</h1>
            <p>Agregar docentes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!---Envio de ID para permanecer las vista -->
                            <input type="hidden" name="Id_Curso" value="<?php echo $id_Curso ?>">
                            <!----Envio de ID para Actualizar---->
                            <input type="hidden" name="Id" value="<?php echo $Id ?>">
                            <div class="form-group">
                                <label for="temaContenido">Tema</label>
                                <select class="form-control" id="temaContenido" name="temaContenido" required="">
                                    <option value="<?php echo $temaContenido ?>"><?php if($temaContenido != ''){echo "Actualmente o cambiar";} ?></option>
                                    <?php foreach($resultadoTema as $fila) : ?>
                                    <?php if ($fila['Id_Curso'] == $id_Curso) :?>
                                    <option value="<?php echo $fila['Tema']; ?>"><?php echo $fila['Tema']; ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tituloVideo">Titulo del video</label>
                                <input name="tituloVideo" class="form-control" id="tituloVideo" type="text" placeholder="Titulo o nombre" value="<?php echo $tituloVideo ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" type="textarea" placeholder="Aprenderas..."><?php echo $descripcion ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="duracion">Duración de video</label>
                                <input min="0" max="100" name="duracion" class="form-control" id="duracion" type="number" placeholder="Precio del curso" value="<?php echo $duracion ?>">
                            </div>
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input name="video" class="form-control" id="video" accept="video/*" type="file" placeholder="Video->formato MP4" value="<?php echo $video; ?>">
                            </div>
                            <div class="form-group">
                                <label for="cursoId">Curso</label>
                                <select class="form-control" id="cursoId" name="cursoId" required="">
                                    <?php foreach($resultado as $fila) : ?>
                                    <?php if($fila['Id'] == $id_Curso) :?>
                                    <option value="<?php echo $fila['Id']; ?>"><?php echo $fila['Nombre']; ?></option>
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
                </div>
                <!---Parte de la tabla ---->
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Contenido Actualmente</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tema</th>
                                            <th>Titulo de videos</th>
                                            <th>Descripción</th>
                                            <th>Duración de video</th>
                                            <th>Video</th>
                                            <th>ID-Curso</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultadoContenido as $data) : ?>
                                        <?php if ($data['Id_Curso'] == $id_Curso) :?>
                                        <tr>
                                            <th><?php echo $data['Id'] ?></th>
                                            <th><?php echo $data['Temas'] ?></th>
                                            <th><?php echo $data['Nombre'] ?></th>
                                            <th><?php echo $data['Descripcion'] ?></th>
                                            <th><?php echo $data['DuracionVideo'] ?></th>
                                            <th><?php echo $data['Video'] ?></th>
                                            <th><?php echo $data['Id_Curso'] ?></th>
                                            <th>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                                                    <input name="temaContenido" type="hidden" value="<?php echo $data['Temas'] ?>">

                                                    <input name="tituloVideo" type="hidden" value="<?php echo $data['Nombre'] ?>">

                                                    <input name="descripcion"  type="hidden" value="<?php echo $data['Descripcion'] ?>">

                                                    <input name="duracion"  type="hidden" value="<?php echo $data['DuracionVideo'] ?>">

                                                    <input name="video"  type="hidden" value="<?php echo $data['Video'] ?>">

                                                    <input name="cursoId"  type="hidden" value="<?php echo $data['Id_Curso'] ?>">

                                                    <input class="btn btn-success" type="submit" name="seleccionar" value="seleccionar">
                                                    <button class="btn btn-danger" type="submit" name="accion" value="Eliminar">Eliminar</button>
                                                </form>
                                            </th>
                                            <?php endif ?>
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