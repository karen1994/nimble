<?php
$db= new Conexion();

//Datos de la salida *********
 $numConsecutivo= $_POST['numConsecutivo'];
 $autSalAuto= $_POST['autSalAuto'];
 $oficialSalAuto= $_POST['oficialSalAuto'];
 $fecSalAuto= $_POST['fecSalAuto'];
 $oficioSalAuto= $_POST['oficioSalAuto'];
 $tomoSalAuto= $_POST['tomoSalAuto'];
 $folioSalAuto= $_POST['folioSalAuto'];



//************************************
$query= mysqli_query($db," CALL sp_Editar_Salida_Detencion('$autSalAuto','$oficialSalAuto',
'$fecSalAuto','$oficioSalAuto', '$tomoSalAuto', '$folioSalAuto', '$numConsecutivo')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega el automóvil no existe.</strong></p>
        </div>';


}else if($resultado['errno'] ==2){
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
