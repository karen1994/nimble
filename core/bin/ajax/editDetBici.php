<?php
$db= new Conexion();

//Datos del Registro ********
$numConsecutivo= $_POST['numConsecutivo'];
$numConsecutivoM= $_POST['numConsecutivoM'];
$numBoletaDetencion= $_POST['numBoletaDetencion'];
$fecBoletaDetencion= $_POST['fecBoletaDetencion'];
$numMarcoBici= $_POST['numMarcoBici'];
$tomEntDetencion= $_POST['tomEntDetencion'];
$folEntDetencion= $_POST['folEntDetencion'];
$ofiDetMoto= $_POST['ofiDetMoto'];
$ofiRecMoto= $_POST['ofiRecMoto'];
$estado=1;



//************************************
$query= mysqli_query($db,"call sp_Editar_Detencion_Bicicleta('$numConsecutivo',
'$numConsecutivoM', '$numMarcoBici','$numBoletaDetencion','$fecBoletaDetencion','$tomEntDetencion',
'$folEntDetencion','$ofiDetMoto','$ofiRecMoto', '$estado')");

$resultado= mysqli_fetch_assoc($query);

if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de marco esta activo.</strong></p>
        </div>';
}else if($resultado['errno'] ==2){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Existe un registro con ese número de boleta.</strong></p>
        </div>';
}else if($resultado['errno'] ==3){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que detiene no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==4){
     $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El código del oficial que recibe la detención no existe.</strong></p>
        </div>';
}else if($resultado['errno'] ==0){

 $HTML=1;
}


//$statement->close();
$db->close();

echo $HTML;
?>
