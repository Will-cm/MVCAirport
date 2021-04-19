
<?php
require_once('../app/views/template/header.php');
?>

<!-- <?php echo var_dump ( $PlanVuelo_modelo) ?>  -->


<!-- Main content -->
<div class="main-content">
  <h1 class="page-title">Gestionar Plan de Vuelos</h1>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading clearfix">
                  <h3 class="panel-title">Datos de plan de vuelos</h3>
                  <ul class="panel-tool-options">
                      <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                      <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                      <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                  </ul>
              </div>
              <div class="panel-body">
                  <p style="color: red">   <?php echo $MensajeError; ?>  </p>
                  <form class="form-horizontal" role="form" method="post" action="?controller=planVuelo&action=guardar">
                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Numero de Vuelo</label> 
                        <div class="col-sm-5"> 
                          <select class="select2-placeholer form-control" data-placeholder="Select a state" id="idVuelo" name="idVuelo">
                            <option value="<?php if (isset($idVuelo)) { echo $idVuelo;} ?>"><?php echo $NumVuelo; ?></option>
                            <?php foreach ($Vuelo_modelo as $obj_vm) { ?>
                                <option value="<?php echo $obj_vm->id; ?>"><?php echo $obj_vm->NumVuelo; ?></option>
                            <?php } ?>                            
                          </select>
                          <input type="text" hidden="hidden" id="ide" name="ide" <?php if (isset($NumPlan)) {?>
                                                value=" <?php echo $NumPlan;} ?>">

                        </div>
                      </div>
                      <div class="line-dashed"></div>
                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Aeropuerto Origen</label> 
                        <div class="col-sm-5"> 
                          <select class="select2-placeholer form-control" data-placeholder="Select a state" id="CodAeropuertoOrigen" name="CodAeropuertoOrigen">
                            <option value="<?php if (isset($CodAeropuertoOrigen)) { echo $CodAeropuertoOrigen;} ?>"><?php echo $Origen; ?></option>
                            <?php foreach ($Aeropuerto_modelo as $obj_a1) { ?>
                                <option value="<?php echo $obj_a1->CodAeropuerto; ?>"><?php echo $obj_a1->nombre; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="line-dashed"></div>
                      <div class="form-group"> 
                        <label class="col-sm-3 control-label">Aeropuerto Destino</label> 
                        <div class="col-sm-5"> 
                          <select class="select2-placeholer form-control" data-placeholder="Select a state" id="CodAeropuertoDestino" name="CodAeropuertoDestino">
                            <option value="<?php if (isset($CodAeropuertoDestino)) { echo $CodAeropuertoDestino;} ?>"><?php echo $Destino; ?></option>
                            <?php foreach ($Aeropuerto_modelo as $obj_a2) { ?>
                                <option value="<?php echo $obj_a2->CodAeropuerto; ?>"><?php echo $obj_a2->nombre; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="line-dashed"></div>
                      <div class="form-group">                          
                          <div class="col-sm-10">
                            <label class="col-sm-2 control-label">Hora salida</label>
                            <div class="col-md-2">                                  
                                <input type="time" required="required" id="HraSalida" name="HraSalida"
                                        class="form-control" value="<?php if (isset($HraSalida)) {
                                    echo $HraSalida;
                                } ?>">
                            </div>
                            <label class="col-sm-2 control-label">Hora llegada</label>
                            <div class="col-md-2">
                                <input type="time" required="required" id="HraLlegada" name="HraLlegada"
                                        class="form-control" value="<?php if (isset($HraLlegada)) {
                                    echo $HraLlegada;
                                } ?>">
                            </div>                    
                                                          
                          </div>
                      </div>
                      
                      
                                              
                      <div class="line-dashed"></div>
                      <div class="form-group">
                          <div class="col-sm-10">
                          </div>
                          <input class="btn btn-success" type="submit" value="Guardar">
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading clearfix">
                  <h3 class="panel-title">Tabla de Vuelos</h3>
                  <ul class="panel-tool-options">
                      <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                      <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                      <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                  </ul>
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example">
                          <thead>
                          <tr>
                              <th>ID Plan</th>
                              <th>Numero de Vuelo</th>
                              <th>Aeropuerto Origen</th>
                              <th>Aeropuerto Destino</th> 
                              <th>HraSalida</th> 
                              <th>HraLlegada</th>                                                             
                              <th>Opciones</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($PlanVuelo_modelo as $obj) { ?>
                              <tr class="gradeX">
                                  <td>
                                      <?php echo $obj->NumPlan; ?>
                                  </td>
                                  <td>
                                      <?php echo $obj->NumVuelo; ?>
                                  </td>
                                  <td>
                                      <?php echo $obj->Origen; ?>
                                  </td>
                                  <td>
                                      <?php echo $obj->Destino; ?>
                                  </td> 
                                  <td>
                                      <?php echo $obj->HraSalida; ?>
                                  </td> 
                                  <td>
                                      <?php echo $obj->HraLlegada; ?>
                                  </td>                                                                       
                                  <td class="size-80 text-center">
                                      <div class="dropdown">
                                          <a class="more-link" data-toggle="dropdown" href="#/"><i
                                                      class="icon-dot-3 ellipsis-icon"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                              <li>
                                                  <a href="?controller=planVuelo&action=actualizar&id=<?php echo $obj->NumPlan; ?>">Editar</a>
                                              </li>
                                              <li>
                                                  <a href="?controller=planVuelo&action=eliminar&id=<?php echo $obj->NumPlan; ?>">Eliminar</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </td>
                              </tr>
                          <?php } ?>


                          </tbody>

                      </table>
                      <script type="text/javascript">
                          function update(dato) {
                              window.locationf = "?controller=vuelo&action=actualizar&id=" + dato;
                          }
                      </script>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  

    <?php
    require_once('../app/views/template/footer.php');
    ?>
