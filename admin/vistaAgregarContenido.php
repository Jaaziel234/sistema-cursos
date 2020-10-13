<?php
//<!----Menu principal------>
include_once "templates/header.php";   
//<!----Barra lateral---->
include_once "templates/sidebar.php";   
//<!----El back-end o logica---->
include_once "modulos/contenidoCurso.php";   
?>
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
        <div class="col-md-12 tile">
            <h1>Cursos disponibles</h1>
            <div class="list-group">
                <?php foreach($resultado as $curso) :?>
                <a href="vistaContenido.php?id=<?php echo $curso['Id'] ?>" class="list-group-item list-group-item-action">
                    <?php echo $curso['Nombre']; ?>
                </a>
                <?php endforeach?>
            </div>
        </div>
    </div>
</main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>