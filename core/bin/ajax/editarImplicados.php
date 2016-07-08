<?php 
$db = new Conexion();

$numBoleta=    $_POST['numBoleta'];
$numImplicados= $_POST['numImplicados'];
$accCon=           $_POST['accCon'];

$query= mysqli_query($db,"call sp_editarImplicados('$numBoleta','$numImplicados','$accCon')"); 


if(!$query){
       $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
       <p><strong>Error en la petición.</strong></p>
       </div>';
     
}else{
      $HTML=1;
     }