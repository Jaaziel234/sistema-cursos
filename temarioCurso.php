<?php
    include_once 'modulos/cursos.php';
    //Cabecera de sitio web
    include_once "plantillas/header.php";
    //Recepción de ID de curso
    $Id = isset($_GET['id_curso']) ? $_GET['id_curso'] : '';
    //Validacion de GET en temarioCurso.php
    if ($Id === ""){
        header("Location:index.php");
    }
?>
<header class="bg-dark section-info" style="margin-top:75px">
    <div class="container text-white">
        <div class="row">
            <?php foreach($resultadoCursoDocente as $curso) : ?>
            <?php if ($curso['Id'] == $Id) : ?>
            <div class="col-12 col-sm-12 col-md-6 d-flex flex-column  justify-content-center py-4">

                <h3><?php echo $curso['Nombre']; ?></h3>
                <p class="text-white">Fecha de lanzamiento: <?php echo $curso['Fecha']; ?></p>
                <p class="text-white">Descripción: <?php echo $curso['cursoDescripcion']; ?></p>
                <p class="text-white">Duracíón aproximado: <?php echo $curso['DuracionCurso']; ?> hrs</p>
                <a class="btn btn-primary" href="validacion.php?id=<?php echo $curso['Id']; ?>" >¡Toma el curso ahora!</a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center mb-4 my-sm-4">
                <img class="img-fluid rounded" src="./admin/recursos/images/imgCurso/<?php echo $curso['Imagen']; ?>" alt="">
            </div>
            <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</header>
<section class="bg-light">
    <div class="container">
        <h2>Temario del curso</h2>
        <div class="row">
            <?php $nombreDocente; foreach ($resultadoTemas as $tema): ?>
            <?php if ($tema['Id_Curso'] == $Id): ?>
            <?php $nombreDocente = $curso['Nombres'] ?>
            <div class="col-12 col-sm-12 col-md-8 my-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5><?php echo $tema['Tema'] ?></h5></li>
                </ul>
            </div>
            <?php endif ?>
            <?php endforeach ?>
            <div class="col-12 col-sm-12 col-md-4 my-0 d-flex justify-content-center">
                <div class="card" style="width: 15rem;">
                    <img class="img-thumbnail rounded-circle" src="./admin/recursos/images/fotoDocente/<?php echo $curso['Foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6>Creado por <?php echo $curso['Nombres']; ?></h6>
                        <p class="card-text"><?php echo $curso['Descripcion']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  


<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->