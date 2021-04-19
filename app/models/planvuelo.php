<?php


class PlanVuelo
{
    public $NumPlan;
    public $idVuelo;
    public $NumVuelo;

    public $CodAeropuertoOrigen;
    public $Origen;
    public $CodAeropuertoDestino;
    public $Destino;

    public $HraSalida;
    public $HraLlegada;

    /**
     * Vuelo constructor.
     * @param $ci
     * @param $nombre
     */
    public function __construct($NumPlan, $idVuelo, $NumVuelo, $CodAeropuertoOrigen, $Origen, $CodAeropuertoDestino, $Destino, $HraSalida, $HraLlegada)
    {
        $this->NumPlan = $NumPlan;

        $this->idVuelo = $idVuelo;
        $this->NumVuelo = $NumVuelo;

        $this->$CodAeropuertoOrigen = $CodAeropuertoOrigen;
        $this->Origen = $Origen;
        $this->CodAeropuertoDestino = $CodAeropuertoDestino;
        $this->Destino = $Destino;

        $this->HraSalida = $HraSalida;
        $this->HraLlegada = $HraLlegada;
    }


    public static function getTabla()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT NumPlan, idVuelo, (select NumVuelo from vuelo as v where v.id=pv.idVuelo) as NumVuelo, 
                                  CodAeropuertoOrigen, (select nombre from aeropuerto as a where a.CodAeropuerto=pv.CodAeropuertoOrigen) as Origen, 
                                  CodAeropuertoDestino, (select nombre from aeropuerto as a where a.CodAeropuerto=pv.CodAeropuertoDestino) as Destino, 
                                  HraSalida, HraLlegada 
                            FROM Plan_vuelo as pv');
        
        // se recorre la lista de la BD
        $list = $req->fetchAll(PDO::FETCH_OBJ);
        
        //foreach ($req->fetchAll(PDO::FETCH_OBJ) as $tabla) {
        //    $list[] = new PlanVuelo($tabla['NumPlan'], $tabla['idVuelo'], $tabla['NumVuelo'], 
        //                           $tabla['CodAeropuertoOrigen'], $tabla['Origen'], 
         //                           $tabla['CodAeropuertoDestino'],$tabla['Destino'], $tabla['HraSalida'], $tabla['HraLlegada']);
       // }
        
        return $list;
    }

    public static function insertar($idVuelo,$CodAeropuertoOrigen,$CodAeropuertoDestino,$HraSalida,$HraLlegada){
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO Plan_vuelo (idVuelo, CodAeropuertoOrigen, CodAeropuertoDestino, HraSalida, HraLlegada) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $idVuelo, PDO::PARAM_INT, 10);
        $sql->bindParam(2, $CodAeropuertoOrigen, PDO::PARAM_INT, 11);
        $sql->bindParam(3, $CodAeropuertoDestino, PDO::PARAM_INT, 11);
        $sql->bindParam(4, $HraSalida, PDO::PARAM_STR, 10);
        $sql->bindParam(5, $HraLlegada, PDO::PARAM_STR, 10);
        $req = $sql->execute();
        return $req;
    }

    public static function actualizar($NumPlan, $idVuelo, $CodAeropuertoOrigen, $CodAeropuertoDestino,$HraSalida,$HraLlegada)
    {
        $db = Db::getInstance();
        $sql = "UPDATE Plan_vuelo SET idVuelo=?, CodAeropuertoOrigen=?, CodAeropuertoDestino=?, HraSalida=?, HraLlegada=? WHERE NumPlan=?";
        $req = $db->prepare($sql)->execute([$idVuelo,$CodAeropuertoOrigen,$CodAeropuertoDestino,$HraSalida,$HraLlegada, $NumPlan]);
        return $req;
    }

    public static function eliminar($NumPlan)
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM Plan_vuelo WHERE NumPlan=?';/*"UPDATE item SET estado=? WHERE cod_item=?";*/
        $req = $db->prepare($sql)->execute([$NumPlan]);/*([0,$cod_item]);*/
        return $req;
    }

    //////////////////buscar//////////////
    public static function verificarNombre($Aerolinea)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM vuelo WHERE Aerolinea="'.$Aerolinea.'"');
        foreach ($req->fetchAll() as $tabla) {
            $list[] = new Vuelo($tabla['NumVuelo'], $tabla['Aerolinea'], $tabla['DiasSemana']);
        }
        return $list;
    }

    public static function getpv($NumPlan)
    {
        $list = [];
        $db = Db::getInstance();
        $sql='SELECT NumPlan, idVuelo, (select NumVuelo from vuelo as v where v.id=pv.idVuelo) as NumVuelo, 
                                  pv.CodAeropuertoOrigen, (select nombre from aeropuerto as a where a.CodAeropuerto=pv.CodAeropuertoOrigen) as Origen, 
                                  pv.CodAeropuertoDestino, (select nombre from aeropuerto as a where a.CodAeropuerto=pv.CodAeropuertoDestino) as Destino, 
                                  HraSalida, HraLlegada 
              FROM Plan_vuelo as pv WHERE pv.NumPlan='.$NumPlan;  /*WHERE estado = 1 AND id='.$cod_item;*/
        $req = $db->query($sql);
        $list = $req->fetchAll(PDO::FETCH_OBJ);
        return $list;
    }


}