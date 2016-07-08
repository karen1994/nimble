<?php
$db= new Conexion();
$Salida_id= $_GET['id'];

$sql = "select * from entradasalidaalcoholimetro where idnumPatrimonio = ".$Salida_id;

$query = $db->query($sql);
$Salida=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Salida=$r;
         break;
     }
}

?>

<?php if($Salida != null){?>

 <!-- Sección del formuario -->

<!--Inicia el div container-->
      <div class="container">
        <br>

    <form id="EditarSalidaAlcohol"class="form-horizontal">

         <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=verSalidaAlcohol" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
        </div>
  </div>

     <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
     <h2>Editar Salida de alcoholimetro</h2>
           </div>
     </div>

     <div class="form-group">
           <label for="NumeroPatrimonio" class="control-label col-md-4">Numero de Patrimonio</label>
           <div class="col-md-5">
           <input class="form-control" id="NumeroPatrimonio" value="<?php echo $Salida->idnumPatrimonio;?>" type="text" disabled maxlength="15" placeholder="">
           </div>
         </div>


       <div class="form-group" id="fecSalida">
          <label for="FechaSalidaAlcohol" class="control-label col-md-4">Fecha de salida del alcoholimetro:</label>
          <div class="col-md-5">
          <input class="form-control" id="FechaSalidaAlcohol" onfocus="return validaciones()" value="<?php echo $Salida->fecSalidaAlcoh;?>" type="date" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group" id="HoraSalida">
        <label for="HoraSalidaAlcohol" class="control-label col-md-4">Hora de salida del alcoholimetro:</label>
        <div class="col-md-5">
        <input class="form-control" id="HoraSalidaAlcohol" onfocus="return validaciones()" value="<?php echo $Salida->horaSalidaAlcoh;?>" type="time" placeholder="">
        </div>
   </div>


   <div class="form-group" id="entregaSalida">
        <label for="OfiEntregaSalida" class="control-label col-md-4">Oficial que entrega:</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiEntregaSalida" onfocus="return validaciones()" value="<?php echo $Salida->codOficEntregaAlcohSalida;?> "type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group"id="recibeSalida">
        <label for="OfiRecibeSalida" class="control-label col-md-4">Oficial que recive:</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiRecibeSalida" onfocus="return validaciones()" value="<?php echo $Salida->codOficRecibeAlcohSalida;?> "type="text" maxlength="15" placeholder="">
        </div>
  </div>


  <div class="form-group">
       <label for="ObservacionesSalida" class="control-label col-md-4">Observaciones</label>
         <div class="col-md-5">
       <textarea id="ObservacionesSalida"  rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Salida->observSalAlcoh;?></textarea>
         </div>
 </div>

         <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_EditarSalidaAlcoholimetro_"></p>
      </div>
 </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
   <a id="btnEditarSalidaAlcohol" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <a href="?view=VerSalidaAlcohol" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
