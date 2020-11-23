    <?php include_once "templates/header.php"; ?>
    <?php include_once "templates/sidebar.php"; ?>
    <?php include_once "modulos/homeEstado.php";//Back-End de home ?>
    <!--Vista General o principal--->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> General</h1>
          <p>Home</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Panel</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Estudiantes</h4>
              <p><b>
              <?php  
                if(isset($_SESSION['admin'])):
                  echo $resultEstudiante;
                elseif($_SESSION['adminPrincipal']):
                  echo $resultEstudianteAdmin;
                endif
              ?>  
                </b></p>
            </div>
          </div>
        </div>
        <!-----Vista principal---->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Likes-Nodisponible</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Cursos</h4>
              <p><b>
              <?php  
                if(isset($_SESSION['admin'])):
                  echo $resultCursos;
                elseif($_SESSION['adminPrincipal']):
                  echo $resultCursosAdmin;
                endif
              ?> 
              </b></p>
            </div>
          </div>
        </div>
        <?php if(isset($_SESSION['adminPrincipal'])):?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Docentes</h4>
              <p><b><?php echo $resultDocente ?></b></p>
            </div>
          </div>
        </div>
        <?php endif?>
      </div>
    </main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>