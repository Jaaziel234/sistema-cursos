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
            <p>Agregar temas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Vista de cursos</li>
            <li class="breadcrumb-item"><a href="#">Agregar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12 tile">

            <h1>Agregar temas a cursos</h1>
            <div class="list-group">
                <?php foreach($resultado as $curso) :?>
                <!---Guardando el Id de la sesion del teacher-->
                <?php $idDocente = $_SESSION['admin']['Id'] ?>
                <!--Mostramos solo los cursos del docente, No todos--->
                <?php if ($idDocente == $curso['Id_Docente']):?>
                <a href="vistaTema.php?id=<?php echo $curso['Id'] ?>" class="list-group-item list-group-item-action">
                    <?php echo $curso['Nombre']; ?>
                </a>
                <?php endif ?>
                <?php endforeach?>
            </div>
        </div>
    </div>
</main>
<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>