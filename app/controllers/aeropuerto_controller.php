<?php


Class AeropuertoController{

    public function index()
    {
      $MensajeError = '';
        ////primero el modelo
        $items_modelo = Aeropuerto::getTabla();
        //$combo2 = Persona::combo();
        require_once('../app/views/aeropuerto/index.php');

        ///ultimo la vista
        //require_once('../app/views/telefonos/index.php');
    }

    public function guardar()
    {
        if(isset($_POST)){
            if (empty($_POST['ide'])){//isset($_POST['nombre_item']) && isset($_POST['unidad_med'])&& isset($_POST['cod_tipo_item'])&& isset($_POST['cod_inv_item'])) {
                $nombre = $_POST['nombre'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];                
                $MensajeError = '';
                // check codigo exist or not
                $existeNombre = Aeropuerto::verificarNombre($nombre);//falta
                $count = count($existeNombre);
                if ($count == 0) {  // if name is not found add user                    
                  $okay = Aeropuerto::insertar($nombre,$ciudad,$provincia);
                  if ($okay){
                      $items_modelo = Aeropuerto::getTabla();                      
                      header("Location: ?controller=aeropuerto&action=index");
                  }else{
                      require_once('../app/views/error500.php');
                  }
                    
                }else {
                    $items_modelo = Aeropuerto::getTabla();                    
                    $MensajeError='Error en el campo: Nombre ya existe!!!!';
                    require_once('../app/views/aeropuerto/index.php');
                }

            }else{  ///actualizar
                $CodAeropuerto = $_POST['ide'];
                $nombre = $_POST['nombre'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $okay = Aeropuerto::actualizar($CodAeropuerto, $nombre,$ciudad,$provincia);
                if($okay){
                    $items_modelo = Aeropuerto::getTabla();                    
                    header("Location: ?controller=aeropuerto&action=index");
                }else{
                    require_once('../app/views/error500.php');
                }
                //$MensajeError = 'Ingrese todos los datos';
            }
        }else{
            require_once('../app/views/aeropuerto/index.php');
        }

    }

    ////////////////////////////////
    public static function actualizar(){

      $MensajeError = '';
        echo "hasta aqui";
        if (isset($_GET)) {
            $id = $_GET['id'];
            $objeto_item = Aeropuerto::getItem($id);
            foreach ($objeto_item as $item) {
                $CodAeropuerto = $item->CodAeropuerto;
                $nombre = $item->nombre;
                $ciudad = $item->ciudad;
                $provincia = $item->provincia;
            }
            $items_modelo = Aeropuerto::getTabla();
            require_once('../app/views/aeropuerto/index.php');
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

    public static function eliminar(){
        if (isset($_GET)) {
            $id = $_GET['id'];
            $okay = aeropuerto::eliminar($id);
            if ($okay) {
                $items_modelo = Aeropuerto::getTabla();
                header("Location: ?controller=aeropuerto&action=index");
            }else{
                require_once('../app/views/error500.php');
            }
        } else {
            // require_once('../app/views/inventario/index.php');
        }
    }

    public function guardar2()
    {
        if (isset($_POST)) {
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $okay = item::insertar($nombre,$ciudad,$provincia);
            if ($okay){
                $items_modelo = aeropuerto::getTabla();
                require_once('../app/views/aeropuerto/index.php');
            }
        }else{
            require_once('../app/views/aeropuerto/index.php');
        }
    }

}

?>