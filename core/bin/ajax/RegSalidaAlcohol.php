<?php
$db= new Conexion();


$FechaSalidaAlcohol = $_POST['FechaSalidaAlcohol'];
$HoraSalidaAlcohol= $_POST['HoraSalidaAlcohol'];
$OfiEntregaSalida= $_POST['OfiEntregaSalida'];
$OfiRecibeSalida= $_POST['OfiRecibeSalida'];
$ObservacionesSalida= $_POST['ObservacionesSalida'];
$NumeroPatrimonio=     $_POST['NumeroPatrimonio'];
$EstaServicioAlcoholimetro= 'Ocupado';
$tipoActivo= $_POST['tipoActivo'];



$query= mysqli_query($db,"call registrarSalidaAlcohol('$FechaSalidaAlcohol','$HoraSalidaAlcohol',
'$OfiEntregaSalida','$OfiRecibeSalida','$ObservacionesSalida','$NumeroPatrimonio',
'$EstaServicioAlcoholimetro','$tipoActivo')");


$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El alcoholimetro esta en uso.</strong></p>
        </div>';
}else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que entrega no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==3){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que recibe no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}

$db->close();

echo $HTML;
