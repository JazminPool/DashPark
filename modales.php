<?php include('links.php');?>

<!-- Modal efectivo y tarjeta -->
<div class="modal fade" id="modal_EfectivoTarjeta" tabindex="-1" role="dialog" aria-labelledby="modalTabla_totalesTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body bg-light">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><h2>Efectivo y tarjeta</h2> <br>
        <div class="row">
            <div class="col-md-12">
                <h5>Total 1:</h5>
                <input type="text" name="" class="form-control"><br>
            </div>
        </div><!--fin row-->
        <div class="row">
            <div class="col-md-12">
                <h5>Total 2:</h5>
                <input type="text" name="" class="form-control"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Total 3:</h5>
                <input type="text" name="" class="form-control"><br>
            </div>
        </div>
      </div><!--fin de modal body-->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button> 
        <button type="submit" class="btn btn-info btn-sm">Guardar</button>
    </div>
    </div><!--fin content-->
  </div><!--fin modal dialog-->
</div><!--Fin de modal tablas totales-->

<!-- Modal boletos fisicos -->
<div class="modal fade" id="modal_BoletosFisicos" tabindex="-1" role="dialog" aria-labelledby="modal_BoletosFisicosTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body bg-light">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><h2>Boletos físicos</h2> <br>
        <div class="row">
            <div class="col-md-12">
                <h5>Boletos físicos:</h5>
                <input type="text" name="" class="form-control"><br>
            </div>
        </div>
      </div><!--fin de modal body-->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button> 
        <button type="submit" class="btn btn-info btn-sm">Guardar</button>
      </div> <!--Fin del footer-->
    </div><!--fin content-->
  </div><!--fin modal dialog-->
</div><!--Fin de modal boletos fisicos-->


