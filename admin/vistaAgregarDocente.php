<!----Menu principal------>
<?php 
include_once "templates/header.php";
?>

<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>

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
            <form action="modulos/docente.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Nombres">Nombres</label>
                <input name="Nombres" class="form-control" id="Nombres" type="text" placeholder="Nombres">
              </div>
              <div class="form-group">
                <label for="Apellidos">Apellidos</label>
                <input name="Apellidos" class="form-control" id="Apellidos" type="text" placeholder="Apellidos">
              </div>
              <div class="form-group">
                <label for="Sexo">Seleccione su sexo</label>
                <select class="form-control" id="Sexo" name="Sexo" required="">
                  <option value=""></option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input name="Usuario" class="form-control" id="Usuario" type="text" placeholder="User">
              </div>
              <div class="form-group">
                <label for="Clave">Contraseña</label>
                <input name="Clave" class="form-control" id="Clave" type="password" placeholder="Clave de usuario">
              </div>
              <div class="form-group">
                <label for="Foto">Foto</label>
                <input name="Foto" class="form-control" id="Foto" accept="image/*" type="file" placeholder="Foto">
              </div>
              <div class="form-group">
                <input hidden="" name="Estado" class="form-control" value="1" type="number">
              </div>
              <div class="tile-footer">
		        <input name="accion" value="Agregar" class="btn btn-primary" type="submit">
		      </div>
            </form>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <h3>Información</h3>
            <p>Sesión para agregar docentes o creadores de cursos</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>





<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>