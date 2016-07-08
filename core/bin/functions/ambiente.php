<?php

function Ambiente(){
    $db  = new Conexion();
    $sql = $db->query("SELECT *FROM detalletipoambiente ");

    if($db->rows($sql)> 0){
        while($d = $db->recorrer($sql)){
            $ambiente[$d['idDetalleTipoAmbiente']] = array(
              'idDetalle' => $d['idDetalleTipoAmbiente'],
               'detalle' =>  $d['detalle'],
                'idTipo' =>  $d['idTipoAmbiente']
);
        }
    }else{
        $ambiente= false;
    }

    $db->liberar($sql);
    $db->close();

    return $ambiente;
}

/*function Ambiente2(){
    $db  = new Conexion();
    $sql = $db->query("SELECT *FROM detalletipoambiente where idTipoAmbiente=2");

    if($db->rows($sql)> 0){
        while($d = $db->recorrer($sql)){
            $ambiente[$d['idDetalleTipoAmbiente']] = array(
              'idDetalle' => $d['idDetalleTipoAmbiente'],
                'detalle' => $d['detalle'],
                  'idTipo' => $d['idTipoAmbiente']

                                              );
        }
    }else{
        $ambiente= false;
    }

    $db->liberar($sql);
    $db->close();

    return $ambiente;
}*/



