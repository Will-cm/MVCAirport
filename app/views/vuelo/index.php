<?php
/**
 * Created by PhpStorm.
 * User: WILL
 * Date: 05/08/2020
 * Time: 0:52
 */

?>

<?php
require_once('../app/views/template/header.php');
?>


<!-- Main content -->
<div class="main-content">
    <h1 class="page-title">Gestionar Vuelos</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Datos de vuelos</h3>
                    <ul class="panel-tool-options">
                        <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                        <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                        <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p style="color: red">   <?php echo $MensajeError; ?>  </p>
                    <form class="form-horizontal" role="form" method="post" action="?controller=vuelo&action=guardar">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Aerolinea</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4"><input required="required" type="text" id="NumVuelo" name="NumVuelo"
                                                                  class="form-control" placeholder="Aerolinea"
                                                                  value="<?php if (isset($NumVuelo)) {
                                                                      echo $NumVuelo;
                                                                  } ?>">
                                        <input type="text" hidden="hidden" id="ide" name="ide" <?php if (isset($id)) {?>
                                                value=" <?php echo $id;} ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Dias Semana</label>
                            <div class="col-sm-10">
                                <input type="text" required="required" placeholder="Dias semana" id="DiasSemana" name="DiasSemana"
                                        class="form-control" value="<?php if (isset($DiasSemana)) {
                                    echo $DiasSemana;
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
                                <th>ID</th>
                                <th>Numero de Vuelo</th>
                                <th>Dias Semana</th>                                                             
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($vuelos_modelo as $obj) { ?>
                                <tr class="gradeX">
                                    <td>
                                        <?php echo $obj->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->NumVuelo; ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->DiasSemana; ?>
                                    </td>                                                                       
                                    <td class="size-80 text-center">
                                        <div class="dropdown">
                                            <a class="more-link" data-toggle="dropdown" href="#/"><i
                                                        class="icon-dot-3 ellipsis-icon"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="?controller=vuelo&action=actualizar&id=<?php echo $obj->id; ?>">Editar</a>
                                                </li>
                                                <li>
                                                    <a href="?controller=vuelo&action=eliminar&id=<?php echo $obj->id; ?>">Eliminar</a>
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
