<?php
include_once 'modulos/cursos.php';
//Cabecera de sitio web
include_once "plantillas/header.php";
?>
<section class="container">
	<article class="mb-4">
		<h3 class="text-center">Cursos disponibles</h3>
	</article>
	<div class="row">
    <?php foreach($resultadoCursoDocente as $curso): ?>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <div class="card mb-4  mt-4 shadow-lg mt-4" style="width: 18rem;">
            <img src="./admin/recursos/images/imgCurso/<?php echo $curso['Imagen'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $curso['Nombre'] ?></h5>
                <p class="card-text"><?php echo $curso['Descripcion'] ?></p>

                <div class="list-group list-group-flush m-0">
                    <li class="list-group-item">$<?php echo number_format($curso['Precio'],2) ?> | <s>$<?php echo number_format($curso['Precio'] + 5,2) ?></s> </li>
                </div>
                <a href="temarioCurso.php?id_curso=<?php echo $curso['Id']; ?>" class="btn btn-primary">Explorar curso</a>
            </div>
        </div>
    </div>
    <?php endforeach?>
</div>
</section>


<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->