<?php


?>

<?php
require_once('../app/views/template/header.php');
?>


<!-- Main content -->
<div class="main-content">
    <h1 class="page-title">Gestionar Aeropuerto</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Datos de Aeropuerto</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                        <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                        <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p style="color: red">   <?php echo $MensajeError; ?>  </p>
                    <form class="form-horizontal" role="form" method="post" action="?controller=aeropuerto&action=guardar">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4"><input required="required" type="text" id="nombre" name="nombre"
                                                                  class="form-control" placeholder="Nombre"
                                                                  value="<?php if (isset($nombre)) {
                                                                      echo $nombre;
                                                                  } ?>">
                                        <input type="text" hidden="hidden" id="ide" name="ide" <?php if (isset($CodAeropuerto)) {?>
                                                value=" <?php echo $CodAeropuerto;} ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ciudad</label>
                            <div class="col-sm-10">
                                <input type="text" required="required" placeholder="Ciudad" id="ciudad" name="ciudad"
                                        class="form-control" value="<?php if (isset($ciudad)) {
                                    echo $ciudad;
                                } ?>">
                            </div>
                        </div>
                        <div class="line-dashed"></div>
                        <!-- añadidas codigos-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Provincia</label>
                            <div class="col-sm-10">
                                <input type="text" required="required" placeholder="Provincia" id="provincia" name="provincia"
                                        class="form-control" value="<?php if (isset($provincia)) {
                                    echo $provincia;
                                } ?>">
                            </div>
                        </div>
                        
                        <div class="line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-10">
                            </div>
                            <input class="btn btn-success" type="submit" name="submit" value="Guardar">
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
                    <h3 class="panel-title">Tabla de Aeropuerto</h3>
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Provincia</th>                              
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($items_modelo as $obj) { ?>
                                <tr class="gradeX">
                                    <td>
                                        <?php echo $obj->CodAeropuerto; ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->nombre; ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->ciudad; ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->provincia; ?>
                                    </td>                                    
                                    <td class="size-80 text-center">
                                        <div class="dropdown">
                                            <a class="more-link" data-toggle="dropdown" href="#/"><i
                                                        class="icon-dot-3 ellipsis-icon"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="?controller=aeropuerto&action=actualizar&id=<?php echo $obj->CodAeropuerto; ?>">Editar</a>
                                                </li>
                                                <li>
                                                    <a href="?controller=aeropuerto&action=eliminar&id=<?php echo $obj->CodAeropuerto; ?>">Eliminar</a>
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
                                window.locationf = "?controller=aeropuerto&action=actualizar&id=" + dato;
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
