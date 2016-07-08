<?php
$db= new Conexion();

//Datos del Registro *********
$FechaEntradaAlcohol=$_POST['FechaEntradaAlcohol'];
$HoraEntradaAlcohol=$_POST['HoraEntradaAlcohol'];
$UltimaPrueba=$_POST['UltimaPrueba'];
$OfiEntregaEntrada=$_POST['OfiEntregaEntrada'];
$OfiRecibeEntrada=$_POST['OfiRecibeEntrada'];
$observacionesEntrada= $_POST['observacionesEntrada'];
$NumeroPatrimonio= $_POST['NumeroPatrimonio'];
$estadoServicioAlcoholimetro= 'Libre';
$TipoActivo=$_POST['TipoActivo'];



$query= mysqli_query($db,"call registrarEntradaAlcoholimetro('$FechaEntradaAlcohol','$HoraEntradaAlcohol','$UltimaPrueba',
'$OfiEntregaEntrada','$OfiRecibeEntrada','$observacionesEntrada','$NumeroPatrimonio','$estadoServicioAlcoholimetro',
'$TipoActivo')");

$resultado= mysqli_fetch_assoc($query);




if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>el alcoholimetro ya tiene una entrada.</strong></p>
        </div>';
}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que entrega no existe.</strong></p>
        </div>';
}else if($resultado['errno'] == 3){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>el oficial que recibe no existe.</strong></p>
        </div>';
}else if($resultado['errno'] == 0){

   $HTML=1;
}

//$statement->close();
$db->close();
echo $HTML;
?>
