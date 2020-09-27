    <?php include_once "templates/header.php"; ?>
    <?php include_once "templates/sidebar.php"; ?>
    <!--Vista General o principal--->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> General</h1>
          <p>Cursos</p>
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
              <h4>Usuario</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <!-----Vista principal---->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Likes</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Cursos</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Docentes</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>
    </main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>