<?php 
include_once '../config/sesiones.php';
?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img style="width: 55px" class="app-sidebar__user-avatar" src="./recursos/images/fotoDocente/<?php echo $_SESSION['admin']['Foto']; ?>" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?php if(isset($_SESSION['admin'])) { ?>
                <?php echo $_SESSION['admin']['Nombres']; ?>
                <?php }else{ ?>
                <?php echo $_SESSION['adminPrincipal']['Nombres']; ?>
                <?php } ?>
            </p>
            <p class="app-sidebar__user-designation">Admistrador</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a>
        </li>
        <?php if (isset($_SESSION['adminPrincipal'])) : ?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Docentes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="vistaAgregarDocente.php"><i class="icon fa fa-circle-o"></i> Agregar</a></li>
                <li><a class="treeview-item" href="vistaDocente.php"><i class="icon fa fa-circle-o"></i> Ver registrados</a></li>
            </ul>
        </li>
        <?php endif ?>
        <li><a class="app-menu__item" href="vistaCurso.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Cursos</span></a>
        </li>
        <li><a class="app-menu__item" href="vistaCarrera.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Carreras</span></a>
        </li>
        <li><a class="app-menu__item" href="vistaTema.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Temas de cursos</span></a>
        </li>
        <li><a class="app-menu__item" href="vistaAgregarContenido.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Contenido de curso</span></a>
        </li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Pago</span></a>
        </li>
        <li><a class="app-menu__item" href="vistaPlan.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Planes</span></a>
        </li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Administrador</span></a>
        </li>
    </ul>
</aside>
