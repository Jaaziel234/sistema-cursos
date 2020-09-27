<?php include_once "templates/header.php";   ?><!----Menu principal------>
<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!----El back-end o logica---->
<?php include_once "modulos/curso.php";   ?>
<!----Contenido para  mostrar----->
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
              <input type="hidden" name="Id" value="<?php echo $Id ?>">
              <div class="form-group">
                <label for="Nombres">Nombre de curso</label>
                <input name="nombreCurso" class="form-control" id="Nombres" type="text" placeholder="Nombres" value="<?php echo $nombreCurso ?>">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion" type="textarea" placeholder="Aprenderas..."><?php echo $descripcion ?></textarea>
              </div>
              <div class="form-group">
                <label for="fecha">Fecha</label>
                <input name="fecha" class="form-control" id="fecha" type="date" placeholder="Fecha de lanzamiento" value="<?php echo $fechaCurso ?>">
              </div>
              <div class="form-group">
                <label for="duracion">Duración</label>
                <input name="duracion" class="form-control" id="duracion" type="number" placeholder="La duración del curso" value="<?php echo $duracion ?>">
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input min="0" max="100" name="precio" class="form-control" id="precio" type="number" placeholder="Precio del curso" value="<?php echo $precio ?>">
              </div>
              <div class="form-group">
                <label for="imgCurso">Portada</label>
                <input name="imgCurso" class="form-control" id="imgCurso" accept="image/*" type="file" placeholder="Imagen o portada del curso" value="<?php echo $imgCurso; ?>">
              </div>
              <div class="form-group">
                <label for="docente">Docente</label>
                <select class="form-control" id="docente" name="docente" required="">
                  <option value="<?php echo $docente ?>"><?php if($docente != ''){echo "Actualmente o cambiar";} ?></option>
                  <?php foreach($resultadoDocente as $docente) : ?>
                  <option value="<?php echo $docente['Id']; ?>"><?php echo $docente['Nombres']." ".$docente['Apellidos']; ?></option>
              	<?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="carrera">Carrera</label>
                <select class="form-control" id="carrera" name="carrera" required="">
                  <option value="<?php echo $carrera ?>"><?php if($carrera != ''){echo "Actualmente o cambiar";} ?></option>
                  <?php foreach($resultadoCarrera as $carrera) : ?>
                  <option value="<?php echo $carrera['Id']; ?>"><?php echo $carrera['Nombre']; ?></option>
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
            <h3 class="tile-title">Cursos Actualmente</h3>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha Lanzamiento</th>
                    <th>Duración hora</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>ID-Docente</th>
                    <th>ID-Carrera</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  	<?php foreach ($resultado as $data) : ?>
                  		<tr>
                  			<th><?php echo $data['Id'] ?></th>
                  			<th><?php echo $data['Nombre'] ?></th>
                  			<th><?php echo $data['Descripcion'] ?></th>
                  			<th><?php echo $data['Fecha'] ?></th>
                  			<th><?php echo $data['DuracionCurso'] ?></th>
                  			<th>$ <?php echo $data['Precio'] ?></th>
                  			<th><img style="width: 70px" src="./recursos/images/imgCurso/<?php echo $data['Imagen']; ?>"></th>
                  			<th><?php echo $data['Id_Docente'] ?></th>
                        <th><?php echo $data['Id_Carrera'] ?></th>
                  			<th>
                  				<form action="" method="POST" enctype="multipart/form-data">
                            <input name="Id" type="hidden" value="<?php echo $data['Id'] ?>">

                            <input name="nombreCurso" type="hidden" value="<?php echo $data['Nombre'] ?>">

                            <input name="descripcion" type="hidden" value="<?php echo $data['Descripcion'] ?>">

                            <input name="fecha"  type="hidden" value="<?php echo $data['Fecha'] ?>">

                            <input name="duracion"  type="hidden" value="<?php echo $data['DuracionCurso'] ?>">

                            <input name="precio"  type="hidden" value="<?php echo $data['Precio'] ?>">

                            <input name="imgCurso"  type="hidden" value="<?php echo $data['Imagen'] ?>">

                            <input name="docente"  type="hidden" value="<?php echo $data['Id_Docente'] ?>">

                            <input name="carrera"  type="hidden" value="<?php echo $data['Id_Carrera'] ?>">
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