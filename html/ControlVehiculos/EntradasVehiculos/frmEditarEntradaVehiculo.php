<?php
$db= new Conexion();
$Entrada_id= $_GET['id'];

$sql = "select * from entradasalidavehiculooficial where entradasalidavehiculooficial.numPlacaVehiculoOfic=".$Entrada_id;

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


<!--Inicia el div container-->
      <div class="container">
        <br>




    <form id="editarEntradaVehiculo"class="form-horizontal">

                  <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=VerEntradaVehiculo" class="btn btn-success">Ver Entrada</a>
        </div>
  </div>


   <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
     <h4>Entrada de Vehiculos Oficiales</h4>
           </div>
     </div>

      <div class="form-group">
          <label for="NumeroPlaca" class="control-label col-md-4">Numero de placa:</label>
          <div class="col-md-5">
          <input class="form-control" id="NumeroPlaca" value="<?php echo $Entrada->numPlacaVehiculoOfic;?>" type="text" maxlength="15" disabled placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="fechaEntrada" class="control-label col-md-4">Fecha de Entrada del Vehiculo:</label>
          <div class="col-md-5">
          <input class="form-control" id="fechaEntrada" value="<?php echo $Entrada->fecEntradaVehi;?>" type="date" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group ">
        <label for="horaEntrada" class="control-label col-md-4">Hora de entrada del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="horaEntrada" value="<?php echo $Entrada->horaEntradaVehi;?>" type="time" placeholder="">
        </div>
   </div>

   <div class="form-group">
        <label for="kmFinal" class="control-label col-md-4">Kilometraje Final:</label>
        <div class="col-md-5">
        <input class="form-control" id="kmFinal" value="<?php echo $Entrada->kmFinal;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="recorrido" class="control-label col-md-4">Recorrido del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="recorrido" value="<?php echo $Entrada->recorridoVehi;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="numeroFactura" class="control-label col-md-4">Numero de Factura:</label>
        <div class="col-md-5">
        <input class="form-control" id="numeroFactura" value="<?php echo $Entrada->numFactura;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="autorizacion" class="control-label col-md-4">Autorizacion:</label>
        <div class="col-md-5">
        <input class="form-control" id="autorizacion" value="<?php echo $Entrada->autorizacion;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

   <div class="form-group">
        <label for="horaFactura" class="control-label col-md-4">Hora de Factura:</label>
        <div class="col-md-5">
        <input class="form-control" id="horaFactura" value="<?php echo $Entrada->horaFactura;?>" type="time" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="litrosFacturados" class="control-label col-md-4">Litros Facturados:</label>
        <div class="col-md-5">
        <input class="form-control" id="litrosFacturados" value="<?php echo $Entrada->litrosFacturados;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="km" class="control-label col-md-4">Kilometros:</label>
        <div class="col-md-5">
        <input class="form-control" id="km" value="<?php echo $Entrada->km;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="montoFactura" class="control-label col-md-4">Monto de Factura:</label>
        <div class="col-md-5">
        <input class="form-control" id="montoFactura" value="<?php echo $Entrada->montoFactura;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

      <div class="form-group">
        <label for="pernote" class="control-label col-md-4">Pernote:</label>
        <div class="col-md-5">
        <input class="form-control" id="pernote" value="<?php echo $Entrada->pernote;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

   <div class="form-group">
        <label for="OficEntregaEntrada" class="control-label col-md-4">Oficial que entrega Entrada:</label>
        <div class="col-md-5">
        <input class="form-control" id="OficEntregaEntrada" value="<?php echo $Entrada->codOficEntregaVehiEntrada;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group">
        <label for="OficRecibeEntrada" class="control-label col-md-4">Oficial que recive Entrada:</label>
        <div class="col-md-5">
        <input class="form-control" id="OficRecibeEntrada" value="<?php echo $Entrada->codOficRecibeVehiEntrada;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group">
        <label for="observEntrada" class="control-label col-md-4">Observaciones:</label>
        <div class="col-md-5">
        <input class="form-control" id="observEntrada" value="<?php echo $Entrada->observEntVehi;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>



 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_EntradaVehiculo_"></p>
      </div>
 </div>


 </div>
 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <input type="button" id="btnEditarEntradaVehiculo" class="btn btn-primary" value ="Registrar"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="?view=VerVehiculoOfic" class="btn btn-danger">Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->
  </section>


  </div>
  <!--Fin row-->
</section>
<!--Fin Main container -->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
