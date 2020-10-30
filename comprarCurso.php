<?php
//Cabecera de sitio web
include_once "plantillas/header.php";
//Inclusion de cursos para comprobar si esta vendido
include_once 'modulos/cursos.php';
//Guardando el Id de curso
$codCurso = isset( $_GET['codCurso'] ) ? $_GET['codCurso'] : '';
//Guardando el Id del usuario
$codUsuario = $_SESSION['usuario']['Id'];
//Para comprobar y mostrar el boton de comprar
$codCompra = 0;
$codUsuarioCompra = 0;
//Pruebas
$registroUsuario = $_SESSION['usuario']['Id'];
?>

<section class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-6 offset-md-3">
			<h2 class="text-center">Compra el curso y obtendras acceso de por vida</h2>
			<div class="title-block">
				<?php foreach($comprabacionCurso as $cursoVenta) :?>
					<?php if (($cursoVenta['Id_Usuario'] == $registroUsuario) && ($cursoVenta['Id_Curso'] == $codCurso)) : ?>
						<?php $codCompra = $cursoVenta['Id_Curso'] ?>
        				<?php //header("Location:./contenido.php?id=$codCurso"); ?>
        				<?php echo "<script>window.setTimeout(function() { window.location = './contenido.php?id=$codCurso' }, 100);</script>"; ?>

        		<?php endif ?>
        		<?php endforeach ?>
        		<!--Si no existe el codigo en la tabla ventacurso me muestra el boton-->
        		<?php if (($codCompra != $codCurso) && ($codUsuarioCompra != $codUsuario)) :?>        			
        			<a href="./modulos/compra.php?codCurso=<?php echo $codCurso; ?>&codUsuario=<?php echo $codUsuario; ?>" class="btn btn-regular">Comprar el curso</a>
        		<?php endif ?>
    		</div>
		</div>
	</div>			
</section>


<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->