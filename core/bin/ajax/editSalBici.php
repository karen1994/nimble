<?php
$db= new Conexion();

//Datos de la salida *********
 $numConsecutivo= $_POST['numConsecutivo'];
 $autSalMoto= $_POST['autSalMoto'];
 $oficialSalMoto= $_POST['oficialSalMoto'];
 $fecSalMoto= $_POST['fecSalMoto'];
 $oficioSalMoto= $_POST['oficioSalMoto'];
 $tomoSalMoto= $_POST['tomoSalMoto'];
 $folioSalMoto= $_POST['folioSalMoto'];



//************************************
$query= mysqli_query($db," CALL sp_Editar_SalidaDetencion_Automovil('$autSalMoto',
'$oficialSalMoto', '$fecSalMoto','$oficioSalMoto', '$tomoSalMoto', '$folioSalMoto',
'$numConsecutivo')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega la bicicleta no existe.</strong></p>
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
