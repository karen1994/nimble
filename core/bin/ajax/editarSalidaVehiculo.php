<?php
$db= new Conexion();


  $FechaSalida = $_POST['FechaSalida'];
  $HoraSalida = $_POST['HoraSalida'];
  $OficEntregaSalida = $_POST['OficEntregaSalida'];
  $OficRecibeSalida = $_POST['OficRecibeSalida'];
  $observSalida = $_POST['observSalida'];
  $NumeroPlaca = $_POST['NumeroPlaca'];



$query= mysqli_query($db,"call ModificarSalidaVehiculoOfic('$FechaSalida','$HoraSalida','$OficEntregaSalida',
  '$OficRecibeSalida','$observSalida','$NumeroPlaca')");


  $resultado= mysqli_fetch_assoc($query);


if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega no existe.</strong></p>
        </div>';
}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que recibe no existe.</strong></p>
        </div>';
}else if($resultado['errno'] == 0){

   $HTML=1;
}




//$statement->close();
$db->close();

echo $HTML;

?>
