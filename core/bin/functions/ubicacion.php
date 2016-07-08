<?php
 
function provincia(){
   $db  = new Conexion();
    $sql = $db->query("SELECT *FROM provincia");

    if($db->rows($sql)> 0){
        while($d = $db->recorrer($sql)){
            $provincia[$d['idProvincia']] = array(
              'id' => $d['idProvincia'],
                 'nombre' => $d['nomProvincia']
                

                                              );
        }
    }else{
        $provincia= false;
    }

    $db->liberar($sql);
    $db->close();

    return $provincia;
}


/*function canton(){
 
          $provincia= $_POST['provincia'];
        
          $db  = new Conexion();
    $sql = $db->query("SELECT *FROM canton ");

    if($db->rows($sql)> 0){
        while($d = $db->recorrer($sql)){
            $canton[$d['idCanton']] = array(
              'id' => $d['idCanton'],
                 'nombre' => $d['nomCanton']
                

                                              );
        }
    }else{
        $canton= false;
    }

    $db->liberar($sql);
    $db->close();

    return $canton;
         
     }
        
  
    */
 

  


