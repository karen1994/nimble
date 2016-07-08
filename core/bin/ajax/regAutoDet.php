<?php
$db= new Conexion();

 $cedPersona= $_POST['cedPersona'];
 $nomPersona= $_POST['nomPersona'];
 $ape1Persona= $_POST['ape1Persona'];
 $ape2Persona= $_POST['ape2Persona'];
 $numBoletaDetencion= $_POST['numBoletaDetencion'];
 $fecBoletaDetencion= $_POST['fecBoletaDetencion'];
 $numLlave= $_POST['numLlave'];
 $tomoDetencion= $_POST['tomoDetencion'];
 $folioDetenciones= $_POST['folioDetenciones'];
 $codOficialDetiene= $_POST['codOficialDetiene'];
 $codOficialRecibe= $_POST['codOficialRecibe'];
 $identAuto= $_POST['identAuto'];
 $marcaAuto= $_POST['marcaAuto'];
 $colorAuto= $_POST['colorAuto'];
 $marcaAuto= $_POST['marcaAuto'];
 $colorAuto= $_POST['colorAuto'];
 $observAuto= $_POST['observAuto'];
 $numArticulo= $_POST['numArticulo'];
 $decripMot= $_POST['decripMot'];
 $delegacion= 40;
 $estado=1;


  $query= mysqli_query($db,  "CALL sp_Registro_Detencion_Automovil('$numBoletaDetencion','$fecBoletaDetencion',
  '$numLlave', '$tomoDetencion','$folioDetenciones', '$codOficialDetiene', '$codOficialRecibe', '$delegacion' ,
  '$numArticulo', '$decripMot', '$identAuto' , '$marcaAuto', '$estado','$observAuto', '$cedPersona', '$nomPersona',
  '$ape1Persona', '$ape2Persona', '$colorAuto')");

  $resultado= mysqli_fetch_assoc($query);

  if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que detuvo el autómivil no existe...!</strong></p>
        </div>';


}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que recibe el autómivil no existe...!</strong></p>
        </div>';


}else if($resultado['errno'] == 3){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El número de boleta ya existe...!</strong></p>
        </div>';


}else if($resultado['errno'] == 4){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>Ya existe un automóvil con el mismo numero de placa, vin motor u otro en estado activo ...!</strong></p>
        </div>';


}else if($resultado['errno'] == 0){

   $HTML=1;
}

$db->close();
echo $HTML;
