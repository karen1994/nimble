<?php 
$db = new Conexion ();

$id1 = $_POST['id1']; $id2 = $_POST['id2']; $id3 = $_POST['id3']; $id4 = $_POST['id4']; $id5 = $_POST['id5'];
$id6 = $_POST['id6']; $id7 = $_POST['id7']; $id8 = $_POST['id8']; $id9 = $_POST['id9']; $id10 = $_POST['id10'];
$id11 = $_POST['id11']; $id12 = $_POST['id12']; $id13 = $_POST['id13']; $id14 = $_POST['id14']; $id15 = $_POST['id15'];
$id16 = $_POST['id16'];

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

$idAmbiente= array($id1 ,$id2, $id3, $id4, $id5, $id6, $id7,
    $id8, $id9, $id10, $id11, $id12, $id13, $id14, $id15 ,$id16);

$totalAmbiente= count($ambiente);
for($i=0; $i < $totalAmbiente; $i++){
    $query= mysqli_query($db,"CALL sp_editarAmbiente ( '$idAmbiente[$i]','$numBoleta', '$ambiente[$i]')"); 
    
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
