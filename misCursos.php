<?php
include_once 'modulos/cursos.php';
//Cabecera de sitio web
include_once "plantillas/header.php";
//Guardando el ID del usuario de su session
$idUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']['Id'] : '';
?>

<section>
	<article class="container mb-4">
		<h3 class="text-center">Mis cursos</h3>
	</article>
	<div class="row">
    <?php foreach($resultadoCursoDocente as $curso): ?>
    	<?php foreach($comprabacionCurso as $cursoComprado ):?>
    		<?php if(($cursoComprado['Id_Curso'] === $curso['Id']) && ($idUsuario == $cursoComprado['Id_Usuario'])):?>
    			<div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
			        <div class="card mb-4  mt-4 shadow-lg mt-4" style="width: 18rem;">
			            <img src="./admin/recursos/images/imgCurso/<?php echo $curso['Imagen'] ?>" class="card-img-top" alt="...">
			            <div class="card-body">
			                <h5 class="card-title"><?php echo $curso['Nombre'] ?></h5>
			                <p class="card-text"><?php echo $curso['Descripcion'] ?></p>

			                <div class="list-group list-group-flush m-0">
			                    <li class="list-group-item">Comprado&Acceso de por vida </li>
			                </div>
			                <a href="contenido.php?id=<?php echo $curso['Id']; ?>" class="btn btn-primary">Seguir viendo</a>
			            </div>
			        </div>
			    </div>
    		<?php endif ?>
    	<?php endforeach ?>
    <?php endforeach?>
</div>
</section>


<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->