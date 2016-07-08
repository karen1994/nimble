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
 $tipoBici= $_POST['tipoBici'];
 $marcaBici= $_POST['marcaBici'];
 $colorBici= $_POST['colorBici'];
 $numMarcoBici= $_POST['numMarcoBici'];
 $observBici= $_POST['observBici'];
 $numArticulo= $_POST['numArticulo'];
 $decripMot= $_POST['decripMot'];
 $delegacion= 40;
 $estado=1;


  $query= mysqli_query($db,  "CALL sp_Registro_Detencion_Bicicleta('$numBoletaDetencion',
  '$fecBoletaDetencion','$numLlave', '$tomoDetencion','$folioDetenciones',
  '$codOficialDetiene', '$codOficialRecibe', '$delegacion' , '$numArticulo', '$decripMot',
  '$tipoBici' , '$marcaBici', '$colorBici', '$numMarcoBici', '$estado', '$observBici',
  '$cedPersona', '$nomPersona', '$ape1Persona', '$ape2Persona')");

  $resultado= mysqli_fetch_assoc($query);

  if($resultado['errno'] == 1){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que detuvo la bicicleta no existe...!</strong></p>
        </div>';


}else if($resultado['errno'] == 2){
      $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
        <p><strong>El oficial que recibe la bicicleta no existe...!</strong></p>
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
        <p><strong>Ya existe una bicicleta con el número de marco ingresado...!</strong></p>
        </div>';


}else if($resultado['errno'] == 0){

   $HTML=1;
}

$db->close();
echo $HTML;
