
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>Policía de Tránsito</title>
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/app/css/index.css">


</head>
<body>

<?php include(HTML_DIR . '/menu/menu.html'); 

$db= new Conexion(); /*Incluye el documento conexion.php*/

$accidente_id= $_GET['id'];
/*Realiza la consulta por el id en la base de datos*/


$sql ="SELECT *FROM ambiente WHERE `numBoletaAccidente`= ".$accidente_id;


$query = mysqli_query($db, $sql);
$accidente = null;
//$sql1= "select * from person where id = ".$_GET["id"];
//$query = mysqli_query($db, $sql1);
$b=0;
     
while ($r= mysqli_fetch_array($query)){
    
  $accidente[]= $r['ambiente']; //Se carga en un arreglo los valores de la BD
    $id[] = $r['idAmbiente'];
 }
?>

<?php if($accidente !=null){?>
<br>
  <!-- Formuario accidente-->
<div class="container">

    <div class="form-horizontal">
<div class="form-group">
      <div class="col-md-4 col-md-offset-5">
<h2> Ambiente </h2>
       <br>
      </div>
    
      <div class="form-group">
      <div class="col-md-4 col-md-offset-2">
       <input class="form-control col-md-3 " id="numBoleta" disabled="true" value="<?php echo "Número de boleta : ".$accidente_id; ?>" type="text">
          </div>
         
      </div>
      
     

</div>
      </div>
    <hr>
<br>

  <form name="form2" action="" class="form-inline">
  
    <!-- ******************** VARIABLES QUE SE NECESITAN PARA EL SP ***************************** -->
    <div>
    <!--  Numero de boleta -->
      <input style="display:none;" id="id1" value="<?php echo  $id[0]; ?>" type="text">
        <input style="display:none;" id="id2" value="<?php echo  $id[1]; ?>" type="text">
          <input style="display:none;" id="id3" value="<?php echo  $id[2]; ?>" type="text">
            <input style="display:none;" id="id4" value="<?php echo  $id[3]; ?>" type="text">
              <input style="display:none;" id="id5" value="<?php echo  $id[4]; ?>" type="text">
                <input style="display:none;" id="id6" value="<?php echo  $id[5]; ?>" type="text">
                  <input style="display:none;" id="id7" value="<?php echo  $id[6]; ?>" type="text">
                    <input style="display:none;" id="id8" value="<?php echo  $id[7]; ?>" type="text">
                      <input style="display:none;" id="id9" value="<?php echo  $id[8]; ?>" type="text">
                        <input style="display:none;" id="id10" value="<?php echo  $id[9]; ?>" type="text">
                          <input style="display:none;" id="id11" value="<?php echo  $id[10]; ?>" type="text">
                            <input style="display:none;" id="id12" value="<?php echo  $id[11]; ?>" type="text">
                              <input style="display:none;" id="id13" value="<?php echo  $id[12]; ?>" type="text">
                                <input style="display:none;" id="id14" value="<?php echo  $id[13]; ?>" type="text">
                                  <input style="display:none;" id="id15" value="<?php echo  $id[14]; ?>" type="text">
                                   <input style="display:none;" id="id16" value="<?php echo  $id[15]; ?>" type="text">
      </div>
    
<!--  ************************************************************************************************************************* -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group" >
  <label for="ambiente1" class="control-label col-md-4">Estructura Especial:</label>
     <div class="col-md-5" >
         <select id="estEspecial" onchange="return combo1()" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 4):
             $b= $b+1;
              if($accidente[0] == $ambiente['1'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['1'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['1'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['1'.$b]['detalle']; ?>" ><?php echo $ambiente['1'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label  class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
             <p id="amb1"> <?php echo $accidente[0]?></p>
      <!--<p id="amb1"></p>-->
         </div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente2" class="control-label col-md-4">Clase de calzada:</label>
     <div class="col-md-5">
       <select id="claCalzada"  class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
           <?php
           $b=0;
         while($b < 6):
             $b= $b+1;
              if($accidente[1] == $ambiente['2'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['2'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['2'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['2'.$b]['detalle'];?>"><?php echo $ambiente['2'.$b]['detalle'];?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb2" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
         <p id="amb2"><?php echo $accidente[1]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente3" class="control-label col-md-4">Condición de calzada:</label>
     <div class="col-md-5">
       <select id="condCalzada" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 8):
             $b= $b+1;
              if($accidente[2] == $ambiente['3'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['3'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['3'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['3'.$b]['detalle']; ?>" ><?php echo $ambiente['3'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb3" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
        <p id="amb3"> <?php echo $accidente[2]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente4" class="control-label col-md-3">Estado de la calzada:</label>
     <div class="col-md-5">
       <select id="estCalzada" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 6):
             $b= $b+1;
              if($accidente[3] == $ambiente['4'.$b]['detalle']):
             ?>
    
         <option value="<?php echo $ambiente['4'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['4'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['4'.$b]['detalle']; ?>" ><?php echo $ambiente['4'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb4" class="control-label col-md-3">Selección:</label>
         <div class="col-md-5">
       <p id="amb4"> <?php echo $accidente[3]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente5" class="control-label col-md-4">Iluminación:</label>
     <div class="col-md-5">
       <select id="Iluminacion" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
        <?php
           $b=0;
         while($b < 5):
             $b= $b+1;
              if($accidente[4] == $ambiente['5'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['5'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['5'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['5'.$b]['detalle']; ?>" ><?php echo $ambiente['5'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb5" class="control-label col-md-4">Selección:</label>
         <div class="col-md-7">
       <p id="amb5"> <?php echo $accidente[4]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente6" class="control-label col-md-4" >Estado del ambiente:</label>
     <div class="col-md-5">
       <select id="estAmbiente" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
       <?php
           $b=0;
         while($b < 7):
             $b= $b+1;
              if($accidente[5] == $ambiente['6'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['6'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['6'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['6'.$b]['detalle']; ?>" ><?php echo $ambiente['6'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       
       <label for="amb6" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
       <p id="amb6"> <?php echo $accidente[5]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente7" class="control-label col-md-4">Alinea. vertical:</label>
     <div class="col-md-5">
       <select id="aliVertical" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 4):
             $b= $b+1;
              if($accidente[6] == $ambiente['7'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['7'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['7'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['7'.$b]['detalle']; ?>" ><?php echo $ambiente['7'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb7" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
       <p id="amb7"> <?php echo $accidente[6]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente8" class="control-label col-md-4">Alinea. Horizontal:</label>
     <div class="col-md-5">
       <select id="aliHorizontal" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 7):
             $b= $b+1;
              if($accidente[7] == $ambiente['8'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['8'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['8'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['8'.$b]['detalle']; ?>" ><?php echo $ambiente['8'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb8" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
        <p id="amb8"> <?php echo $accidente[7]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente9" class="control-label col-md-3">Señalamiento vial:</label>
     <div class="col-md-5">
       <select id="senVial" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 11):
             $b= $b+1;
              if($accidente[8] == $ambiente['9'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['9'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['9'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['9'.$b]['detalle']; ?>" ><?php echo $ambiente['9'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb9" class="control-label col-md-3">Selección:</label>
         <div class="col-md-5">
     <p id="amb9"> <?php echo $accidente[8]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente10" class="control-label col-md-4">Tipo de intersección:</label>
     <div class="col-md-5">
       <select id="tipInterseccion" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
        <?php
           $b=0;
         while($b < 11):
             $b= $b+1;
              if($accidente[9] == $ambiente['10'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['10'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['10'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['10'.$b]['detalle']; ?>" ><?php echo $ambiente['10'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb10" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
        <p id="amb10"> <?php echo $accidente[9]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente11" class="control-label col-md-6">Carriles:</label>
     <div class="col-md-5">
       <select id="carriles" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 8):
             $b= $b+1;
              if($accidente[10] == $ambiente['11'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['11'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['11'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['11'.$b]['detalle']; ?>" ><?php echo $ambiente['11'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb11" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
        <p id="amb11"> <?php echo $accidente[10]?></p>
         </div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente12" class="control-label col-md-6">Existencia de:</label>
     <div class="col-md-6">
       <select id="exiDe" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 6):
             $b= $b+1;
              if($accidente[11] == $ambiente['12'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['12'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['12'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['12'.$b]['detalle']; ?>" ><?php echo $ambiente['12'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb12" class="control-label col-md-6">Selección:</label>
         <div class="col-md-6">
    <p id="amb12"> <?php echo $accidente[11]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente13" class="control-label col-md-4">Sentido vía:</label>
     <div class="col-md-5">
       <select id="sentVia" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
          <?php
           $b=0;
         while($b < 4):
             $b= $b+1;
              if($accidente[12] == $ambiente['13'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['13'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['13'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['13'.$b]['detalle']; ?>" ><?php echo $ambiente['13'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb13" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
       <p id="amb13"> <?php echo $accidente[12]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente14" class="control-label col-md-4">Tipo de accidente:</label>
     <div class="col-md-5">
       <select id="tipAccidente" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
        <?php
           $b=0;
         while($b < 10):
             $b= $b+1;
              if($accidente[13] == $ambiente['14'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['14'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['14'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['14'.$b]['detalle']; ?>" ><?php echo $ambiente['14'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb14" class="control-label col-md-4">Selección:</label>
         <div class="col-md-5">
      <p id="amb14"> <?php echo $accidente[13]?></p>
         </div>
</div>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-group">
  <label for="ambiente15" class="control-label col-md-3">Vehículo en circulación:</label>
     <div class="col-md-5">
       <select id="vehCirculacion" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 8):
             $b= $b+1;
              if($accidente[14] == $ambiente['15'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['15'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['15'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['15'.$b]['detalle']; ?>" ><?php echo $ambiente['15'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb15" class="control-label col-md-3">Selección:</label>
         <div class="col-md-5">
      <p id="amb15"> <?php echo $accidente[14]?></p>
         </div>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<div class="form-group">
  <label for="ambiente16" class="control-label col-md-4">Obstaculos en la vía:</label>
     <div class="col-md-5">
       <select id="obsVia" class="form-control" disabled="true" name=""  >
         <option value="0">Seleccione </option>
         <?php
           $b=0;
         while($b < 18):
             $b= $b+1;
              if($accidente[15] == $ambiente['16'.$b]['detalle']):
             ?>
             <option value="<?php echo $ambiente['16'.$b]['detalle']; ?>" selected="selected" ><?php echo $ambiente['16'.$b]['detalle']; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $ambiente['16'.$b]['detalle']; ?>" ><?php echo $ambiente['16'.$b]['detalle']; ?> </option>
         <?php
         endif;
         endwhile;
         ?>
       </select>
       </div>
       <br>
       <br>
       <br>
       <label for="amb16" class="control-label col-md-6" >Selección:</label>
         <div class="col-md-5">
   <p id="amb16"> <?php echo $accidente[15]?></p>
         </div>
</div>

<br>
<br>
<br>


   <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
              <div id="_AJAX_ACCIDENTE_"></div>
                  </div>
                    </div>  

<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 
<?php 
if(isset($_SESSION['app_id'])){
   // echo $users[$_SESSION['app_id']]['id'];
    $usuario= $users[$_SESSION['app_id']]['tipoUsuario'];
    if($usuario == 0 || $usuario == 1 ){ ?>
        <!-- Boton Terminar -->
 <div class="form-group" id="btnTerminarDIV">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnEditar' type="button" class="btn btn-warning" value="Editar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
	<?php 
                                         }
}
?>
	


 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<!-- Boton Terminar -->
 <div class="form-group" id="btnGuadarDIV" style="display:none;">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnGuardarAmbiente' type="button" class="btn btn-primary" value="Guardar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>

<!-- Boton Terminar -->
 <div class="form-group" id="btnCancelarDIV" style="display:none;">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnCancelarAmbiente' type="button" class="btn btn-danger" value="Cancelar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
<br>
<br>
<br>

</form>

</div> <!--Fin del div container-->

<?php } else{ echo $accidente[2];

?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php }?>



<!--Sección del footer-->
<footer>
</footer>

<script src="views/bootstrap/jquery/jquery.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/app/js/generales.js"></script>
<script src="views/app/js/accidente/editarAmbiente.js"></script>




</body>
</html>
   
