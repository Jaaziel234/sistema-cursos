<!----Menu principal------>
<?php 
include_once "templates/header.php";?>
<!----Barra lateral---->
<?php include_once "templates/sidebar.php";   ?>
<!------Incluyendo mis datos de BD ----->
<?php  include_once "modulos/mostrar-docente.php"; ?>
<!---Contenido---->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Eliminar y editar</h1>
            <p>vista de docentes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Docente</li>
            <li class="breadcrumb-item active"><a href="#">Editar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Docentes registrados</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Descripción</th>
                                <th>Sexo</th>
                                <th>E-mail</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Foto</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $data) : ?>
                            <tr>
                                <th><?php echo $data['Id'] ?></th>
                                <th><?php echo $data['Nombres'] ?></th>
                                <th><?php echo $data['Apellidos'] ?></th>
                                <th><?php echo $data['Descripcion'] ?></th>
                                <th><?php echo $data['Sexo'] ?></th>
                                <th><?php echo $data['Email'] ?></th>
                                <th><?php echo $data['Usuario'] ?></th>
                                <th><?php echo $data['Contraseña'] ?></th>
                                <th><img style="width: 70px" src="./recursos/images/fotoDocente/<?php echo $data['Foto'] ?>"></th>
                                <th>
                                    <?php if($data['Estado'] == 1):  ?>
                                        Activo
                                    <?php else: ?>
                                        Desactivado
                                    <?php endif?>
                                </th>
                                <th>
                                    <form action="modulos/docente.php" method="POST">
                                        <input hidden="" type="number" name="Id" value="<?php echo $data['Id']; ?>">
                                        <button name="accion" value="Eliminar" class="btn btn-primary">Eliminar</button>
                                    </form>
                                    <form action="vistaActualizarDocente.php" method="POST">
                                        <input hidden="" type="number" name="Id" value="<?php echo $data['Id']; ?>">
                                        <input hidden="" type="text" name="Nombres" value="<?php echo $data['Nombres'] ?>">
                                        <input hidden="" type="text" name="Apellidos" value="<?php echo $data['Apellidos']; ?>">
                                        <input hidden="" type="text" name="descripcion" value="<?php echo $data['Descripcion']; ?>">
                                        <input hidden="" type="text" name="Sexo" value="<?php echo $data['Sexo']; ?>">
                                        <input hidden="" type="text" name="email" value="<?php echo $data['Email']; ?>">
                                        <input hidden="" type="text" name="Usuario" value="<?php echo $data['Usuario']; ?>">
                                        <input hidden="" type="password" name="Clave" value="<?php echo $data['Contraseña']; ?>">
                                        <input hidden="" type="number" name="Estado" value="<?php echo $data['Estado']; ?>">
                                        <button name="actualizar" class="btn btn-primary">Actualizar</button>
                                    </form>
                                </th>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-----Footer y script---->
<?php include_once "templates/footer.php"; ?>