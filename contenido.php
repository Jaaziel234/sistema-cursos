<?php
//Cabecera de sitio web
include_once "plantillas/header.php";
//Sirve para mostrar el contenido del curso
include_once 'modulos/videos.php';
//Sirve para insertar el comentario al BD
include_once 'modulos/comentarios.php';
//Id del curso
$Id = isset($_GET['id']) ? $_GET['id'] : '';
//Validacion de sesion
if(!isset($_SESSION['usuario'])){
	header("Location:index.php");
}
//Datos de sesion->ID
$id_Usuario = $_SESSION['usuario']['Id'];
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
					<h3 class="pt-4 d-none d-md-block">Aportes</h3>
						<?php foreach($resultComent as $coment): ?>
							<?php if(($coment['Id_Curso'] == $Id) && ($coment['Id_Video'] == $video)) :?>
					  <div class="media mb-4">
					  	<?php if ($coment['Foto'] == ''):?>
					    <img class="mr-3" width="100px" src="./recursos/images/logo.png" class="mr-3" alt="FotoUser">
						<?php endif ?>
					    <div class="media-body">
					      <h5 class="mt-0 mb-1"><?php echo $coment['Nombres']." ".$coment['Apellidos']; ?></h5>
					      <b>Comentario: </b><?php echo $coment['Comentario']; ?>
					      <!----Boton para eliminar---->
					      <?php if($id_Usuario == $coment['Id_Usuario']): ?>
					      	<form action="" method="POST">
						      	<input name="idComentario" type="hidden" value="<?php echo $coment['Id']?>">
						      	<input name="delete" type="submit" value="Eliminar" class="btn-sm btn-danger">
					      </form>
					      <?php //Recargamos el sitio para limpiar los envios
					      	if((isset($_POST['delete']) || (isset($_POST['enviar'])))){
					      		echo "<script>window.setTimeout(function() { window.location = './contenido.php?id=$Id&video=$video' }, 10);</script>";
					      	}
					      ?>
					      <?php endif ?>
					    </div>
					  </div>
					<?php endif ?>
					<?php endforeach ?>
					<!---Formulario para agregar comentario---->
					<form class="d-none d-md-block" action="" method="POST">
						<input name="idUsuario" type="hidden" value="<?php echo $id_Usuario ?>">
						<input name="idCurso" type="hidden" value="<?php echo $Id ?>">
						<input name="idVideo" type="hidden" value="<?php echo $video ?>">
						<div class="form-group">
							<textarea name="comentario" id="" cols="50" rows="5" class="form-control" minlength="2" maxlength="280" required=""></textarea>
						</div>
						<input name="enviar" type="submit" class="btn-sm btn-primary" value="Agregar comentario">
					</form>
					<!----Fin comentarios---->
					<?php endif ?>
					<?php endforeach ?>
					<?php if ($video == '') :?>
					<p>La mejor forma de aprender es ponerlo en práctica <strong>empieza ahora</strong></p>
					<?php endif ?>
					
			</div>

			<div class="col-sm-12 col-md-6 mt-3">
				<h1 class="text-center">Indice del curso</h1>
				<ul class="list-group">
					<?php foreach ($resultadoVideo as $video): ?>
						<?php if ($video['Id_Curso'] == $Id): ?>
					<li class="list-group-item bg-dark"><i class='bx bx-play text-white'></i> <a class="text-white" href="contenido.php?id=<?php echo $Id; ?>&video=<?php echo $video['Id']; ?>"><?php echo $video['Nombre'] ?></a></li>
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