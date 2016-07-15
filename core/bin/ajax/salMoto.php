<?php
$db= new Conexion();

//Datos de la salida *********
 $numConsecutivo= $_POST['numConsecutivo'];
 $numConsecutivoDet= $_POST['numConsecutivoDet'];
 $identMoto= $_POST['identMoto'];
 $autoridadSalMoto= $_POST['autoridadSalMoto'];
 $oficEntSalMoto= $_POST['oficEntSalMoto'];
 $fecSalMoto= $_POST['fecSalMoto'];
 $oficioSalMoto= $_POST['oficioSalMoto'];
 $tomoSalMoto= $_POST['tomoSalMoto'];
 $folioSalMoto= $_POST['folioSalMoto'];
 $cedPersona= $_POST['cedPersona'];
 $nomPersona= $_POST['nomPersona'];
 $ape1Persona= $_POST['ape1Persona'];
 $ape2Persona= $_POST['ape2Persona'];
 $estado=0;

//************************************
$query= mysqli_query($db," CALL sp_Salida_Detencion_Motocicleta('$cedPersona', '$nomPersona',
'$ape1Persona', '$ape2Persona','$autoridadSalMoto','$oficEntSalMoto', '$fecSalMoto',
'$oficioSalMoto', '$tomoSalMoto', '$folioSalMoto', '$identMoto', '$estado',
'$numConsecutivo', '$numConsecutivoDet')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya se hizo la salida de la motocicleta.</strong></p>
        </div>';


}else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega la motocicleta no existe.</strong></p>
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
