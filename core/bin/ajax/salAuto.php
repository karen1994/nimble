<?php
$db= new Conexion();

//Datos de la salida *********
 $numConsecutivo= $_POST['numConsecutivo'];
 $numConsecutivoDet= $_POST['numConsecutivoDet'];
 $identAuto= $_POST['identAuto'];
 $autoridadSalAuto= $_POST['autoridadSalAuto'];
 $oficEntSalAuto= $_POST['oficEntSalAuto'];
 $fecSalAuto= $_POST['fecSalAuto'];
 $oficioSalAuto= $_POST['oficioSalAuto'];
 $tomoSalAuto= $_POST['tomoSalAuto'];
 $folioSalAuto= $_POST['folioSalAuto'];
 $cedPersona= $_POST['cedPersona'];
 $nomPersona= $_POST['nomPersona'];
 $ape1Persona= $_POST['ape1Persona'];
 $ape2Persona= $_POST['ape2Persona'];
 $estado=0;

//************************************
$query= mysqli_query($db," CALL sp_Salida_Detencion_Automovil('$cedPersona','$nomPersona','$ape1Persona', '$ape2Persona',
'$autoridadSalAuto','$oficEntSalAuto', '$fecSalAuto', '$oficioSalAuto', '$tomoSalAuto',
 '$folioSalAuto', '$identAuto', '$estado', '$numConsecutivo', '$numConsecutivoDet')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya se hizo la salida del automóvil.</strong></p>
        </div>';


}else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega el automóvil no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==3){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de oficio ya existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}

$db->close();
echo $HTML;
?>
