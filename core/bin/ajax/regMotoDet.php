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
 $identMoto= $_POST['identMoto'];
 $marcaMoto= $_POST['marcaMoto'];
 $colorMoto= $_POST['colorMoto'];
 $observMoto= $_POST['observMoto'];
 $numArticulo= $_POST['numArticulo'];
 $decripMot= $_POST['decripMot'];
 $delegacion= 40;
 $estado=1;


  $query= mysqli_query($db,  "CALL sp_Registro_Detencion_Motocicleta('$numBoletaDetencion','$fecBoletaDetencion',
  '$numLlave', '$tomoDetencion','$folioDetenciones', '$codOficialDetiene', '$codOficialRecibe', '$delegacion' ,
  '$numArticulo', '$decripMot', '$identMoto' , '$marcaMoto', '$estado',
   '$observMoto', '$cedPersona', '$nomPersona', '$ape1Persona', '$ape2Persona', '$colorMoto')");

  $resultado= mysqli_fetch_assoc($query);

  if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que detuvo la motocicleta no existe...!</strong></p>
        </div>';


}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que recibe la motocicleta no existe...!</strong></p>
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
