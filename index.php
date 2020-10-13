<?php
include_once 'modulos/cursos.php';
//Cabecera de sitio web
include_once "plantillas/header.php";
?>
<!-- E N D  N A V B A R -->
<!-- H E R O -->
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <img src="recursos/images/persona.jpg" class="img-fluid" alt="Demo image">
            </div>
            <div class="col-md-7 content-box hero-content text-center">
                <span>BIENVENIDOS</span>
                <h1>CODERZOOM</h1>
                <p>La plataforma de apredizaje para desarrolladores</p>
                <a href="#" class="btn btn-regular">Leer mas</a>
            </div>
        </div>
    </div>
</section>
<!-- E N D  H E R O -->
<!-- Informacion-->
<section id="marketing">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="content-box">
                    <h2>APRENDE DESDE CERO</h2>
                    <p>Programar no tiene que ser tan dificil. Aprende los fundamentos desde cero y obtén una base sólida.</p>
                    <a href="#" class="btn btn-regular">COMENZAR</a>
                </div>
            </div>
            <div class="col-md-7">
                <img src="recursos/images/fondo1.jpg" class="img-fluid" alt="Demo image">
            </div>
        </div>
    </div>
</section>
<!----Fin informacion--->
<section id="ver">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h1>Conoce más de nuestros contenidos</h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="ver-thumb">
                    <div class="ver-title">
                        <h3>Estudia a tu ritmo</h3>
                    </div>
                    <div class="ver-info">
                        <p>Programar no tiene que ser tan dificil. Aprende los fundamentos desde cero y obtén una base sólida.</p>
                    </div>
                    <div class="ver-bottom">
                        <span class="pricing-dollar">A delante!</span>
                        <a href="#" class="section-btn ver-btn">Register now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="ver-thumb">
                    <div class="ver-title">
                        <h3>Estudia a tu ritmo</h3>
                    </div>
                    <div class="ver-info">
                        <p>Programar no tiene que ser tan dificil. Aprende los fundamentos desde cero y obtén una base sólida.</p>
                    </div>
                    <div class="ver-bottom">
                        <span class="pricing-dollar">Listo!</span>
                        <a href="#" class="section-btn ver-btn">Register now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="ver-thumb">
                    <div class="ver-title">
                        <h3>Estudia a tu ritmo</h3>
                    </div>
                    <div class="ver-info">
                        <p>Programar no tiene que ser tan dificil. Aprende los fundamentos desde cero y obtén una base sólida.</p>
                    </div>
                    <div class="ver-bottom">
                        <span class="pricing-dollar">Vamos!</span>
                        <a href="#" class="section-btn ver-btn">Register now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   

<!-- C A L L  T O  A C T I O N -->
<section id="call-to-action">
    <div class="container text-center">
        <h2>Conoce más de nuestros contenidos</h2>
        <div class="title-block">
            <a href="#" class="btn btn-regular">Explorar Más</a>
        </div>
    </div>
</section>

<div class="container"></div>
<!--targetas de los cursos-->
<div class="row">
    <?php foreach($resultadoCursos as $curso): ?>
    <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center">
        <div class="card mb-4  mt-4 shadow-lg mt-4" style="width: 18rem;">
            <img src="./admin/recursos/images/imgCurso/<?php echo $curso['Imagen'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $curso['Nombre'] ?></h5>
                <p class="card-text"><?php echo $curso['Descripcion'] ?></p>
                <a href="#" class="btn btn-primary">$<?php echo number_format($curso['Precio'],2) ?> | <s>$<?php echo number_format($curso['Precio'] + 5,2) ?></s> </a>
                <a href="temarioCurso.php?id_curso=<?php echo $curso['Id']; ?>" class="btn btn-primary">Conoce más...</a>
            </div>
        </div>
    </div>
    <?php endforeach?>
</div>
<!--final targetas-->

<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->

