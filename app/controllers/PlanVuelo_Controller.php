<?php


class PlanVueloController
{

    public function index()
    {
      $MensajeError = '';
        //$pepe = Persona::all();
        $PlanVuelo_modelo = PlanVuelo::getTabla();
        
        $idVuelo = ''; // Variable inicial por defecto
        $NumVuelo = 'Seleccionar vuelo1'; // Variable inicial por defecto
        $CodAeropuertoOrigen = ''; // Variable inicial por defecto
        $Origen = 'Seleccione origen1'; // Variable inicial por defecto
        $CodAeropuertoDestino = ''; // Variable inicial por defecto
        $Destino = 'Seleccione destino1'; // Variable inicial por defecto

        $Vuelo_modelo = Vuelo::getTabla();
        $Aeropuerto_modelo = Aeropuerto::getTabla();
        require_once('../app/views/planv/index.php');

    }

    public function guardar()
    {
        if(isset($_POST)){
            if (empty($_POST['ide'])){
                $idVuelo = $_POST['idVuelo'];
                $CodAeropuertoOrigen = $_POST['CodAeropuertoOrigen'];               
                $CodAeropuertoDestino = $_POST['CodAeropuertoDestino'];               
                $HraSalida = $_POST['HraSalida'];               
                $HraLlegada = $_POST['HraLlegada'];               
                $MensajeError = $CodAeropuertoOrigen;
                // check codigo exist or not
                //$existeNombre = Vuelo::verificarNombre($Aerolinea);//falta
                //$count = count($existeNombre);                                  
                $okay = PlanVuelo::insertar($idVuelo,$CodAeropuertoOrigen,$CodAeropuertoDestino,$HraSalida, $HraLlegada);
                if ($okay){
                    $PlanVuelo_modelo = PlanVuelo::getTabla();                      
                    header("Location: ?controller=planVuelo&action=index");
                }else{
                    require_once('../app/views/error500.php');
                }
                    
                

            }else{  ///actualizar
                $NumPlan = $_POST['ide'];
                $idVuelo = $_POST['idVuelo'];
                $CodAeropuertoOrigen = $_POST['CodAeropuertoOrigen'];
                $CodAeropuertoDestino = $_POST['CodAeropuertoDestino'];
                $HraSalida = $_POST['HraSalida'];
                $HraLlegada = $_POST['HraLlegada'];
                $okay = PlanVuelo::actualizar($NumPlan, $idVuelo, $CodAeropuertoOrigen, $CodAeropuertoDestino,$HraSalida,$HraLlegada);
                if($okay){
                    $PlanVuelo_modelo = PlanVuelo::getTabla();                    
                    header("Location: ?controller=planVuelo&action=index");
                }else{
                    require_once('../app/views/error500.php');
                }
                //$MensajeError = 'Ingrese todos los datos';
            }
        }else{
            require_once('../app/views/planVuelo/index.php');
        }

    }

    ////////////////////////////////
    public static function actualizar(){

      $MensajeError = '';
        echo "hasta aqui";
        if (isset($_GET)) {
            $id = $_GET['id'];
            $objeto_pv = PlanVuelo::getpv($id);
            foreach ($objeto_pv as $pv) {
                $NumPlan = $pv->NumPlan;
                $idVuelo = $pv->idVuelo;
                $NumVuelo = $pv->NumVuelo;
                $CodAeropuertoOrigen = $pv->CodAeropuertoOrigen;
                $Origen = $pv->Origen;
                $CodAeropuertoDestino = $pv->CodAeropuertoDestino;
                $Destino = $pv->Destino;
                $HraSalida = $pv->HraSalida;
                $HraLlegada = $pv->HraLlegada;
            }
            $PlanVuelo_modelo = PlanVuelo::getTabla();
            $Vuelo_modelo = Vuelo::getTabla();
            $Aeropuerto_modelo = Aeropuerto::getTabla();
            require_once('../app/views/planv/index.php');
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

    public static function eliminar(){
        if (isset($_GET)) {
            $NumPlan = $_GET['id'];
            $okay = PlanVuelo::eliminar($NumPlan);
            if ($okay) {
                $PlanVuelo_modelo = PlanVuelo::getTabla();
                header("Location: ?controller=planVuelo&action=index");
            }else{
                require_once('../app/views/error500.php');
            }
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

}

?>