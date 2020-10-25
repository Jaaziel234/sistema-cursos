<?php
//Cabecera de sitio web
include_once "plantillas/header.php";
//Sirve para mostrar el contenido del curso
include_once 'modulos/videos.php';
//Id del curso
$Id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<section class="bg-light">
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<?php $video = isset($_GET['video']) ? $_GET['video'] : ''; 
				?>
				<?php foreach($resultadoVideo as $fila): ?>
					<?php if ($fila['Id'] == $video):?>
					<h4><?php echo $fila['Nombre']; ?></h4>
					<div class="embed-responsive embed-responsive-16by9">
					  <video class="embed-responsive-item" src="admin/contenido/videosCursos/<?php echo $fila['Video'] ?>" allowfullscreen controls controlsList="nodownload"></video>
					</div>
					<!----Comentario de los videos--->
					<ul class="list-unstyled py-4">
					  <li class="media">
					    <img src="..." class="mr-3" alt="FotoUser">
					    <div class="media-body">
					      <h5 class="mt-0 mb-1">Nombre de Usuario</h5>
					      <p>Comentario</p>
					    </div>
					  </li>
					</ul>
					<!----Fin comentarios---->
					<?php endif ?>
					<?php endforeach ?>
					<?php if ($video == '') :?>
					<p>La mejor forma de aprender es ponerlo en práctica <strong>empieza ahora</strong></p>
					<?php endif ?>
					
			</div>

			<div class="col-sm-12 col-md-6">
				<h1 class="text-center">Indice del curso</h1>
				<ul class="list-group">
					<?php foreach ($resultadoVideo as $video): ?>
						<?php if ($video['Id_Curso'] == $Id): ?>
					<li class="list-group-item bg-dark">h<a class="text-white" href="contenido.php?id=<?php echo $Id; ?>&video=<?php echo $video['Id']; ?>"><?php echo $video['Nombre'] ?></a></li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</section>



<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->