<?php
$db= new Conexion();

$numBoleta= $_POST['numBoleta'];
$estEspecial= $_POST['estEspecial'];
$claCalzada= $_POST['claCalzada'];
$condCalzada= $_POST['condCalzada'];
 $estCalzada= $_POST['estCalzada'];
 $Iluminacion= $_POST['Iluminacion'];
 $estAmbiente= $_POST['estAmbiente'];
 $aliVertical= $_POST['aliVertical'];
 $aliHorizontal= $_POST['aliHorizontal'];
 $senVial= $_POST['senVial'];
 $tipInterseccion= $_POST['tipInterseccion'];
 $carriles= $_POST['carriles'];
 $exiDe= $_POST['exiDe'];
 $sentVia= $_POST['sentVia'];
 $tipAccidente= $_POST['tipAccidente'];
 $vehCirculacion= $_POST['vehCirculacion'];
 $obstVia= $_POST['obsVia']; 

//$ambiente[$i]
$ambiente= array($estEspecial,$claCalzada,$condCalzada,$estCalzada,$Iluminacion,$estAmbiente,$aliVertical,
    $aliHorizontal,$senVial,$tipInterseccion,$carriles,$exiDe, $sentVia,$tipAccidente,$vehCirculacion,$obstVia);
$totalAmbiente= count($ambiente);
for($i=0; $i < $totalAmbiente; $i++){
    $query= mysqli_query($db,"CALL sp_registrarAmbiente ( '$numBoleta', '$ambiente[$i]')"); 
    
    if(!$query){
       $HTML=  '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <h4>ERROR</h4>
       <p><strong>El número de boleta del accidente ya existe.</strong></p>
       </div>';
     
}else{
      $HTML=1;
     }

   
} //FIN DEL CICLO
//$sql = $db->query("INSERT INTO `nimble`.`ambiente`('',numBoletaAccidente,ambiente) VALUES ('', '$numBoleta','$estEspecial')"); 

//$resultado= mysqli_fetch_assoc($query);


$db->close();
echo $HTML;

 
 
