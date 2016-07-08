<?php 
$db = new Conexion();

$numBoleta=    $_POST['numBoleta'];
$rutAccidente= $_POST['rutAccidente'];
$km=           $_POST['km'];
$senas=        $_POST['senas'];
$velocidad=    $_POST['velocidad'];

$query= mysqli_query($db,"call sp_editarRuta('$numBoleta','$rutAccidente','$km','$senas','$velocidad')"); 


if(!$query){
       $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
       <p><strong>El número de boleta del accidente ya existe.</strong></p>
       </div>';
     
}else{
      $HTML=1;
     }
