<?php
$db= new Conexion();


$FechaSalidaAlcohol= $_POST['FechaSalidaAlcohol'];
$HoraSalidaAlcohol= $_POST['HoraSalidaAlcohol'];
$OfiEntregaSalida= $_POST['OfiEntregaSalida'];
$OfiRecibeSalida= $_POST['OfiRecibeSalida'];
$ObservacionesSalida= $_POST['ObservacionesSalida'];
$NumeroPatrimonio= $_POST['NumeroPatrimonio'];

$query= mysqli_query($db,"call ModificarSalidaAlcohol('$FechaSalidaAlcohol','$HoraSalidaAlcohol','$OfiEntregaSalida',
'$OfiRecibeSalida','$ObservacionesSalida','$NumeroPatrimonio')");

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
