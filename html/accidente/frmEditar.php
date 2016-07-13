
<?php
$db= new Conexion(); /*Incluye el documento conexion.php*/

$accidente_id= $_GET['id'];
/*Realiza la consulta por el id en la base de datos*/


$sql = "SELECT *FROM accidente INNER JOIN `ubicacion` ON accidente.`idUbicación` = `ubicacion`.`idUbicacion` 
INNER JOIN `inspector` ON accidente.`numBoletaAccidente` = inspector.`numBoletaAccidente`
INNER JOIN `autoridadjudicial` ON inspector.`numBoletaAccidente` = autoridadjudicial.`numBoletaAccidente`
INNER JOIN implicados ON autoridadjudicial.`numBoletaAccidente` = implicados.`numBoletaAccidente`
INNER JOIN `ruta` ON implicados.`numBoletaAccidente` = ruta.`numBoletaAccidente` INNER JOIN `delegacion` ON accidente.`idDelegacion` = delegacion.`IDdelegacion`
INNER JOIN `provincia` ON ubicacion.`idProvincia` = provincia.`idProvincia`
INNER JOIN `canton` ON ubicacion.`idCanton` = canton.`idCanton` INNER JOIN `distrito` ON 
ubicacion.`idDistrito` = distrito.`idDistrito`   WHERE accidente.numBoletaAccidente = ".$accidente_id;


$query = $db->query($sql);
$accidente = null;
//$sql1= "select * from person where id = ".$_GET["id"];
//$query = mysqli_query($db, $sql1);
 if($query->num_rows >0){
     
while ($r=$query->fetch_object()){
  $accidente=$r;
  break;
}

  }
     


$db2= new Conexion();

$sql2 ="SELECT *FROM ambiente WHERE `numBoletaAccidente`= ".$accidente->numBoletaAccidente;

$query2 = mysqli_query($db2, $sql2);

//$sql1= "select * from person where id = ".$_GET["id"];
//$query = mysqli_query($db, $sql1);
$b=0;
     
while ($i= mysqli_fetch_array($query2)){
    
   //Se carga en un arreglo los valores de la BD
    $id[] = $i['idAmbiente'];
 }

$db->close();
$db2->close();

?>


<?php if($accidente!=null){?>


<div class="container">
<br>
      <form name="form1" action="" class="form-horizontal">

    <br>
    
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
    

        <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
        <h1> Editar accidente </h1>
              </div>
        </div>
          <hr>
                <div class="form-group">
                      <div class="col-md-4 col-md-offset-4">
                <h3> Datos del Accidente </h3>
               
                      </div>
                </div>

 <input id="idAccidente" style="display:none;"  value="<?php echo $accidente_id; ?>" type="text" >
         
    <input id="idUbicacion" style="display: none;" disabled="true" value="<?php echo $accidente->idUbicación; ?>" type="text" maxlength="15" placeholder="" >
      
      
       <div class="form-group">
         <label for="numBoleta" class="control-label col-md-4">Número de boleta</label>
            <div class="col-md-5">
        <input class="form-control" id="numBoleta"  value="<?php echo $accidente->numBoletaAccidente; ?>" type= "text" maxlength="15" placeholder="" >
            </div>
       </div>


   <div class="form-group">
        <label for="fecAccidente" class="control-label col-md-4">Fecha del accidente</label>
          <div class="col-md-5">
        <input class="form-control" value="<?php echo $accidente->fecAccidente; ?>" id="fecAccidente" type="date"  >
          </div>
   </div>

   <div class="form-group">
        <label for="horAccidente" class="control-label col-md-4">Hora del accidente</label>
          <div class="col-md-5">
        <input class="form-control" value="<?php echo $accidente->HoraAccidente; ?>" id="horAccidente" type="time"  >
          </div>
          </div>

  <div class="form-group">
      <label for="option" class="control-label col-md-4">Dia del accidente</label>
         <div class="col-md-5">
      <select class="form-control" name="" id="diaAccidente">
        <option value="">Seleccione</option>
         <?php
           $op1="Lunes"; $op2="Martes";  $op3="Miércoles";  $op4="Jueves"; $op5="Viernes"; $op6="Sábado"; $op7="Domingo"; 
          $op= array($op1,$op2,$op3,$op4,$op5,$op6,$op7);
           $b=0;
         while($b < count($op)):
            
              if($op[$b] == $accidente->DiaAccidente):
             ?>
             <option value="<?php echo $accidente->DiaAccidente; ?>" selected="selected" ><?php echo $accidente->DiaAccidente; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $op[$b]; ?>" > <?php echo $op[$b]; ?> </option>
         <?php
      
         endif;
         $b= $b+1;
         endwhile;
         ?>
    
      </select>
           </div>
 </div>

 <div class="form-group">
      <label for="provincia" class="control-label col-md-4">Provincia</label>
        <div class="col-md-5">
      <input class="form-control" id="provincia" value="<?php echo $accidente->idProvincia; ?>" type="text"  placeholder="">
        </div>
</div>

<div class="form-group">
     <label for="canton" class="control-label col-md-4">Cantón</label>
       <div class="col-md-5">
     <input class="form-control" id="canton" type="text" value="<?php echo $accidente->idCanton; ?>" placeholder="">
       </div>
</div>

<div class="form-group">
     <label for="distrito" class="control-label col-md-4">Distrito</label>
       <div class="col-md-5">
     <input class="form-control" id="distrito" type="text"  value="<?php echo $accidente->idDistrito; ?>" placeholder="">
       </div>
</div>



<div class="form-group">
  <label for="obsv"  class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea name="obsv" id="obsAccidente" rows="8" cols="40" placeholder="Escribe las observaciones del accidente"><?php     echo $accidente->observ; ?></textarea>
       </div>
</div>
        
                    
                    
                    
                <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                <h3> Autoridad Judicial </h3>
                </div>
                </div>
  <hr>
  

 <div class="form-group">
          <label for="autJudicial" class="control-label col-md-4">Autoridad Judicial</label>
            <div class="col-md-5">
          <input class="form-control" id="autJudicial" value="<?php echo $accidente->nomAutoridadJudicial; ?>" type="text" value="COSEVI" maxlength="50" placeholder="">
            </div>
        </div> 

  
  <div class="form-group">
                      <div class="col-md-4 col-md-offset-4">
                <h3> Inspector </h3>
               
                      </div>
                </div>
  <hr>

  <div class="form-group ">
        <label for="codInspector" class="control-label col-md-4">Código del inspector</label>
          <div class="col-md-5">
        <input class="form-control" id="codInspector" value="<?php echo $accidente->codigoInspector; ?>" type="text" value="20" maxlength="5" placeholder="">
          </div>
   </div>
   

         
          <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
              <div id="_AJAX_ACCIDENTE_"></div>
                  </div>
                    </div>    
                    

                    
          
<!-- Boton Terminar -->
 <div class="form-group">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnEditar' type="button" class="btn btn-warning" value="Editar"> 
    <!--  <a href="?view=frmAmbiente" id='btnTerminar1' class="btn btn-primary">Terminar</a> -->
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
     
    

     
      <div class="form-group" id="btnGuardarDIV" style="display: none;">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnGuardar' type="button" class="btn btn-primary" value="Guardar"> 
    <!--  <a href="?view=frmAmbiente" id='btnTerminar1' class="btn btn-primary">Terminar</a> -->
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
     
      <div class="form-group"  id="btnCancelarDIV" style="display: none;" >
    <div class="col-md-4 col-md-offset-4">
     <input id='btnCancelar' type="button" class="btn btn-danger" value="Cancelar"> 
    <!--  <a href="?view=frmAmbiente" id='btnTerminar1' class="btn btn-primary">Terminar</a> -->
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>


</form>
</div> <!--Fin del div container-->

 <?php } else{?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php }?>

