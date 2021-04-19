<?php


class Vuelo
{
    public $NumVuelo;
    public $Aerolinea;
    public $DiasSemana;

    /**
     * Vuelo constructor.
     * @param $ci
     * @param $nombre
     */
    public function __construct($id, $NumVuelo, $DiasSemana)
    {
        $this->id = $id;
        $this->NumVuelo = $NumVuelo;
        $this->DiasSemana = $DiasSemana;
    }


    public static function getTabla()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM vuelo');
        // se recorre la lista de la BD
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new Vuelo($tabla['id'], $tabla['NumVuelo'], $tabla['DiasSemana']);
        }
        return $list;
    }

    public static function insertar($NumVuelo,$DiasSemana){
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO vuelo (NumVuelo, DiasSemana) VALUES (?,?)");
        $sql->bindParam(1, $NumVuelo, PDO::PARAM_INT, 10);
        $sql->bindParam(2, $DiasSemana, PDO::PARAM_STR, 55);
        $req = $sql->execute();
        return $req;
    }

    public static function actualizar($id, $NumVuelo, $DiasSemana)
    {
        $db = Db::getInstance();
        $sql = "UPDATE vuelo SET NumVuelo=?, DiasSemana=? WHERE id=?";
        $req = $db->prepare($sql)->execute([$NumVuelo, $DiasSemana, $id]);
        return $req;
    }

    public static function eliminar($id)
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM vuelo WHERE id=?';/*"UPDATE item SET estado=? WHERE cod_item=?";*/
        $req = $db->prepare($sql)->execute([$id]);/*([0,$cod_item]);*/
        return $req;
    }

    //////////////////buscar//////////////
    public static function verificarNombre($NumVuelo)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM vuelo WHERE NumVuelo="'.$NumVuelo.'"');
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new Vuelo($tabla['id'], $tabla['NumVuelo'], $tabla['DiasSemana']);
        }
        return $list;
    }

    public static function getItem($id)
    {
        $list = [];
        $db = Db::getInstance();
        $sql='SELECT * FROM vuelo WHERE id='.$id;  /*WHERE estado = 1 AND id='.$cod_item;*/
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new Vuelo($tabla['id'], $tabla['NumVuelo'], $tabla['DiasSemana']);
        }
        return $list;
    }



}