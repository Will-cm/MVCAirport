<?php


class aeropuerto
{
  public $CodAeropuerto;
  public $nombre;
  public $ciudad;
  public $provincia;

      /**
     * aeropuerto constructor.
     * @param $id
     * @param $nombre
     * @param $ciudad
     */
    public function __construct($CodAeropuerto, $nombre, $ciudad, $provincia)
    {
        $this->CodAeropuerto = $CodAeropuerto;  
        $this->nombre = $nombre; 
        $this->ciudad = $ciudad;   
        $this->provincia = $provincia;  
    }


    public static function getTabla()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM aeropuerto');
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new aeropuerto($tabla['CodAeropuerto'], $tabla['nombre'], $tabla['ciudad'], $tabla['provincia']);
        }
        return $list;
    }

    public static function insertar($nombre,$ciudad,$provincia){
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO aeropuerto (nombre, ciudad, provincia) VALUES (?,?,?)");
        $sql->bindParam(1, $nombre, PDO::PARAM_STR, 50);
        $sql->bindParam(2, $ciudad, PDO::PARAM_STR, 255);
        $sql->bindParam(3, $provincia, PDO::PARAM_STR, 50);
        $req = $sql->execute();
        return $req;
    }

    public static function actualizar($CodAeropuerto, $nombre, $ciudad, $provincia)
    {
        $db = Db::getInstance();
        $sql = "UPDATE aeropuerto SET nombre=?, ciudad=?, provincia=? WHERE CodAeropuerto=?";
        $req = $db->prepare($sql)->execute([$nombre, $ciudad, $provincia, $CodAeropuerto]);
        return $req;
    }

    public static function eliminar($CodAeropuerto)
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM aeropuerto WHERE CodAeropuerto=?';/*"UPDATE item SET estado=? WHERE cod_item=?";*/
        $req = $db->prepare($sql)->execute([$CodAeropuerto]);/*([0,$cod_item]);*/
        return $req;
    }

    //////////////////buscar//////////////
    public static function verificarNombre($nombre)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM aeropuerto WHERE nombre="'.$nombre.'"');
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new aeropuerto($tabla['CodAeropuerto'], $tabla['nombre'], $tabla['ciudad'], $tabla['provincia']);
        }
        return $list;
    }

    public static function getTablaNom($PlanVuelo_modelo)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM aeropuerto');
        // se recorre la lista de la BD
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new Vuelo($tabla['NumVuelo'], $tabla['Aerolinea'], $tabla['DiasSemana']);
        }
        return $list;
    }

    
    public static function getItem($CodAeropuerto)
    {
        $list = [];
        $db = Db::getInstance();
        $sql='SELECT * FROM aeropuerto WHERE CodAeropuerto='.$CodAeropuerto;  /*WHERE estado = 1 AND id='.$cod_item;*/
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new aeropuerto($tabla['CodAeropuerto'], $tabla['nombre'], $tabla['ciudad'], $tabla['provincia']);
        }
        return $list;
    }


}