<?php
function Users(){
    $db  = new Conexion();
    $sql = $db->query("SELECT *FROM usuario");

    if($db->rows($sql)> 0){
        while($d = $db->recorrer($sql)){
            $users[$d['codigoOficial']] = array(
              'id' => $d['codigoOficial'],
                'idDelegacion' => $d['IDdelegacion'],
                  'pass' => $d['claveUsuario'],
                    'tipoUsuario' => $d['idTipoUsuario'],
                    'estado' => $d['estadoUsuario'],
                     'correo' => $d['correoUsuario']
                                              );
        }
    }else{
        $users= false;
    }

    $db->liberar($sql);
    $db->close();

    return $users;
}


function Oficial(){
  $db2  = new Conexion();
  $sql = $db2->query("SELECT *FROM oficiales");

  if($db2->rows($sql)> 0){
      while($d = $db2->recorrer($sql)){
          $oficial[$d['codOficial']] = array(
            'id' => $d['cedOficial'],
              'nombre' => $d['nomOficial'],
                'puesto' => $d['nomPuesto']
                                            );
      }
  }else{
      $oficial= false;
  }

  $db2->liberar($sql);
  $db2->close();

  return $oficial;
}


?>
