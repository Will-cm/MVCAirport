<?php

class VueloController
{

    public function index()
    {
      $MensajeError = '';
        $vuelos_modelo = Vuelo::getTabla();
        require_once('../app/views/vuelo/index.php');
    }

    public function guardar()
    {
        if(isset($_POST)){
            if (empty($_POST['ide'])){
                $NumVuelo = $_POST['NumVuelo'];
                $DiasSemana = $_POST['DiasSemana'];               
                $MensajeError = '';
                // check codigo exist or not
                $existeNombre = Vuelo::verificarNombre($NumVuelo);//falta
                $count = count($existeNombre);
                if ($count == 0) {  // if name is not found add user                    
                  $okay = Vuelo::insertar($NumVuelo,$DiasSemana);
                  if ($okay){
                      $vuelos_modelo = Vuelo::getTabla();                      
                      header("Location: ?controller=vuelo&action=index");
                  }else{
                      require_once('../app/views/error500.php');
                  }
                    
                }else {
                    $vuelos_modelo = Vuelo::getTabla();                    
                    $MensajeError='Error en el campo: Numero Vuelo. ya esta registrado!!!!';
                    require_once('../app/views/vuelo/index.php');
                }

            }else{  ///actualizar
                $id = $_POST['ide'];
                $NumVuelo = $_POST['NumVuelo'];
                $diasSemana = $_POST['DiasSemana'];
                $okay = Vuelo::actualizar($id, $NumVuelo,$diasSemana);
                if($okay){
                    $vuelos_modelo = Vuelo::getTabla();                    
                    header("Location: ?controller=vuelo&action=index");
                }else{
                    require_once('../app/views/error500.php');
                }
                //$MensajeError = 'Ingrese todos los datos';
            }
        }else{
            require_once('../app/views/vuelo/index.php');
        }

    }

    public static function actualizar(){
      $MensajeError = '';
        echo "hasta aqui";
        if (isset($_GET)) {
            $id = $_GET['id'];
            $objeto_vuelo = Vuelo::getItem($id);
            foreach ($objeto_vuelo as $vuelo) {
                $NumVuelo = $vuelo->NumVuelo;
                $Aerolinea = $vuelo->Aerolinea;
                $DiasSemana = $vuelo->DiasSemana;
            }
            $vuelos_modelo = Vuelo::getTabla();
            require_once('../app/views/vuelo/index.php');
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

    public static function eliminar(){
        if (isset($_GET)) {
            $id = $_GET['id'];
            $okay = Vuelo::eliminar($id);
            if ($okay) {
                $vuelos_modelo = Vuelo::getTabla();
                header("Location: ?controller=vuelo&action=index");
            }else{
                require_once('../app/views/error500.php');
            }
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

}