<?php
$db= new Conexion();
//$db2= new Conexion();

$id1 = $_POST['id1']; $id2 = $_POST['id2']; $id3 = $_POST['id3']; $id4 = $_POST['id4']; $id5 = $_POST['id5'];
$id6 = $_POST['id6']; $id7 = $_POST['id7']; $id8 = $_POST['id8']; $id9 = $_POST['id9']; $id10 = $_POST['id10'];
$id11 = $_POST['id11']; $id12 = $_POST['id12']; $id13 = $_POST['id13']; $id14 = $_POST['id14']; $id15 = $_POST['id15'];
$id16 = $_POST['id16'];

//Datos del Registro *********
$idAccidente=    $_POST['idAccidente'];
$idUbicacion = $_POST['idUbicacion'];
$numBoleta=    $_POST['numBoleta'];
$autJudicial=  $_POST['autJudicial'];
$codInspector= $_POST['codInspector'];
$fecAccidente= $_POST['fecAccidente'];
$horAccidente= $_POST['horAccidente'];
$diaAccidente= $_POST['diaAccidente'];
$provincia=    $_POST['provincia'];
$canton=       $_POST['canton'];
$distrito=     $_POST['distrito'];
/*$rutAccidente= $_POST['rutAccidente'];
$km=           $_POST['km'];
$senas=        $_POST['senas'];
$numImplicados= $_POST['numImplicados'];
$accCon=       $_POST['accCon'];
$velocidad=    $_POST['velocidad'];*/
$obsAccidente= $_POST['obsAccidente'];

//Captura de la delegación
//if(isset($_SESSION['app_id'])){
    $delegacion=40;  //$users[$_SESSION['app_id']]['idDelegacion'];
  // }

/*$query= mysqli_query($db,"call sp_editarAccidente('$idAccidente','$idUbicacion','$autJudicial','$numBoleta','$codInspector',
'$fecAccidente', '$horAccidente', '$diaAccidente', '$distrito' , '$canton' , '$provincia' , '$rutAccidente' , '$km' ,
'$senas','$velocidad','$numImplicados' , '$accCon','$obsAccidente')"); */

$idAmbiente= array($id1 ,$id2, $id3, $id4, $id5, $id6, $id7,
    $id8, $id9, $id10, $id11, $id12, $id13, $id14, $id15 ,$id16);

$totalAmbiente= count($idAmbiente);

$query= mysqli_query($db,"call sp_editarAccidente('$idAccidente','$idUbicacion','$autJudicial','$numBoleta','$codInspector',
'$fecAccidente', '$horAccidente', '$diaAccidente', '$distrito' , '$canton' , '$provincia' ,'$obsAccidente')"); 

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
    
    $db->close();
    $db2= new Conexion();
  for($i=0; $i < $totalAmbiente; $i++){
    $query2= mysqli_query($db2, "CALL sp_editarBoletaAmbiente ('$idAmbiente[$i]','$numBoleta')"); 
    
    if(!$query2){
       $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
       <p><strong>Algo salio mal.</strong></p>
       </div>';
     
}else{
      $HTML=1;
        
     }

   
} //FIN DEL CICLO
    $db2->close();
}


//$statement->close();

echo $HTML;

