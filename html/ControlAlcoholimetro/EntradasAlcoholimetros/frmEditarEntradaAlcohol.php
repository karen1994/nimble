<?php
$db= new Conexion();
$Entrada_id= $_GET['id'];

$sql = "select * from entradasalidaalcoholimetro where entradasalidaalcoholimetro.idnumPatrimonio=".$Entrada_id;

$query = $db->query($sql);
$Entrada=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Entrada=$r;
         break;
     }
}

?>

<?php if($Entrada != null){?>

 <!-- Sección del formuario -->

<!--Inicia el div container-->
      <div class="container">
        <br>

    <form name="form1" class="form-horizontal" >

    <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=verEntradaAlcohol" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
        </div>
   </div>


     <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
     <h2>Editar Entrada de Alcoholimetro</h2>
           </div>
     </div>


       <div class="form-group">
          <label for="NumeroPatrimonio" class="control-label col-md-4">Numero de patrimonio</label>
          <div class="col-md-5">
          <input class="form-control" id="NumeroPatrimonio" value="<?php echo $Entrada->idnumPatrimonio;?>" type="text" maxlength="15" disabled placeholder="">
          </div>
        </div>


        <div class="form-group" id="FecEntrada">
          <label for="FechaEntradaAlcohol" class="control-label col-md-4">Fecha de Entrada del alcoholimetro:</label>
          <div class="col-md-5">
          <input class="form-control" id="FechaEntradaAlcohol" onfocus="return validaciones()" value="<?php echo $Entrada->fecEntradaAlcoh;?>" type="date" maxlength="15" placeholder="">
          </div>
        </div>


   <div class="form-group" id="HoraEntrada">
        <label for="HoraEntradaAlcohol" class="control-label col-md-4">Hora de entrada del alcoholimetro:</label>
        <div class="col-md-5">
        <input class="form-control" id="HoraEntradaAlcohol" onfocus="return validaciones()" value="<?php echo $Entrada->horaEntradaAlcoh;?>" type="time" placeholder="">
        </div>
   </div>

   <div class="form-group" id="ultimaPrueba" id="EntregaEntrada">
        <label for="UltimaPrueba" class="control-label col-md-4">Numero de la ultima Prueba:</label>
        <div class="col-md-5">
        <input class="form-control" id="UltimaPrueba" onfocus="return validaciones()" value="<?php echo $Entrada->numUltimaPrueba; ?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

   <div class="form-group" id="EntregaEntrada">
        <label for="OfiEntregaEntrada" class="control-label col-md-4">Oficial que entrega:</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiEntregaEntrada" onfocus="return validaciones()" value="<?php echo $Entrada->codOficEntregaAlcohEntrada;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group" id="RecibeEntrada">
        <label for="OfiRecibeEntrada" class="control-label col-md-4">Oficial que recive:</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiRecibeEntrada" onfocus="return validaciones()" value="<?php echo $Entrada->codOficRecibeAlcohEntrada;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


  <div class="form-group">
       <label for="observacionesEntrada" class="control-label col-md-4">Observaciones</label>
         <div class="col-md-5">
       <textarea id="observacionesEntrada"  rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Entrada->observEntAlcoh;?></textarea>
         </div>
 </div>

         <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_EditarEntradaAlcoholimetro_"></p>
      </div>
 </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarEntradaAlcohol" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="?view=VerEntradaAlcohol" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->



<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
