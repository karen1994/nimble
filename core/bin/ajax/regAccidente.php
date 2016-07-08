<?php
$db= new Conexion();

//Datos del Registro *********

$numBoleta=    $_POST['numBoleta'];
$autJudicial=  $_POST['autJudicial'];
$codInspector= $_POST['codInspector'];
$fecAccidente= $_POST['fecAccidente'];
$horAccidente= $_POST['horAccidente'];
$diaAccidente= $_POST['diaAccidente'];
$provincia=    $_POST['provincia'];
$canton=       $_POST['canton'];
$distrito=     $_POST['distrito'];
$rutAccidente= $_POST['rutAccidente'];
$km=           $_POST['km'];
$senas=        $_POST['senas'];
$numImplicados= $_POST['numImplicados'];
$accCon=       $_POST['accCon'];
$velocidad=    $_POST['velocidad'];
$obsAccidente= $_POST['obsAccidente'];

//Captura de la delegación
//if(isset($_SESSION['app_id'])){
    $delegacion=40;  //$users[$_SESSION['app_id']]['idDelegacion'];
  // }



$query= mysqli_query($db,"call sp_registrarAccidente('$delegacion','$autJudicial','$numBoleta','$codInspector',
'$fecAccidente', '$horAccidente', '$diaAccidente', '$distrito' , '$canton' , '$provincia' , '$rutAccidente' , '$km' ,
'$senas','$velocidad','$numImplicados' , '$accCon','$obsAccidente')"); 

$resultado= mysqli_fetch_assoc($query);
if($resultado['errno'] == 1){
    
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
       <p><strong>El número de boleta del accidente ya existe.</strong></p>
       </div>';


} else if($resultado['errno'] == 2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del inspector no existe.</strong></p>
        </div>';
     
}else if($resultado['errno'] == 0){
    $HTML= 1;
}


//$statement->close();
$db->close();
echo $HTML;

