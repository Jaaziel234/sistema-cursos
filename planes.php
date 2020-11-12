<?php
   //Cabecera de sitio web
   include_once "plantillas/header.php";
   //Back-end
   include_once "modulos/planes.php";
?>

    
<section class="container">
  <h1 class="text-center py-4">Planes disponibles</h1>
  <div class="row">
     <?php foreach($resultPlanes as $plan): ?>
    <article class="col-12 col-sm-12 col-md-6">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-info text-white">
         <h3><?php echo $plan['Tipo_Plan'] ?></h3>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
         <h3><?php echo $plan['Descripcion'] ?></h3>
          <i class='bx bx-plus bx-md' ></i>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <h3><?php echo $plan['Precio'] ?></h3>
          <i class='bx bx-dollar-circle bx-md' ></i>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#compra-premium">
          Adquirir plan
        </button>
        </li>
      </ul>
    </article>
    <?php endforeach?>
  </div>
</section>
<section>
  <!-- Button trigger modal -->
  

  <!-- Modal -->
  <div class="modal fade" id="compra-premium" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecciona el método de pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center my-4">
            <i class='bx bxl-paypal bx-md pr-2'></i>
          <i class='bx bxs-credit-card bx-md pr-2'></i>
          </div>
          <form method="POST" action="modulos/planCompra.php">
            <?php foreach($resultPago as $pago):?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metodoPago" value="<?php echo $pago['Id']?>" required>
              <label class="form-check-label">
                <?php echo $pago['Nombre']?>
              </label>
            </div>
            <?php endforeach ?>
            <input type="submit" class="btn btn-info btn-md my-4 btn-block">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</section>


<!---pie de sitio---->
<?php include_once "plantillas/footer.php"; ?>
<!---fin pie-->