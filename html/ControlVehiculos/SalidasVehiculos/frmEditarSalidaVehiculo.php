<?php
$db= new Conexion();
$Salida_id= $_GET['id'];

$sql = "select * from entradasalidavehiculooficial where numPlacaVehiculoOfic = ".$Salida_id;

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


<!--Inicia el div container-->
      <div class="container">
        <br>




    <form id="editarSalidaVehiculo"class="form-horizontal" onkeypress="return runScriptSalidaVehiculo(event)">
        
               <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=verSalidaVehiculo" class="btn btn-success">Ver Salidas</a>
        </div>
  </div>
        
               <div class="form-group">
          <label  class="control-label col-md-4"></label>
          <div class="col-md-8">
           <div id="_AJAX_SalidaVehiculo"></div>
          </div>
        </div>

    <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
     <h4>Salida de Vehiculos Oficiales</h4>
           </div>
     </div>

        <div class="form-group">
          <label for="FechaSalida" class="control-label col-md-4">Fecha de salida del Vehiculo:</label>
          <div class="col-md-5">
          <input class="form-control" id="FechaSalida" value="<?php echo $Salida->fecSalidaVehi;?>" type="date" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group ">
        <label for="HoraSalida" class="control-label col-md-4">Hora de salida del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="HoraSalida" value="<?php echo $Salida->horaSalidaVehi;?>" type="time" placeholder="">
        </div>
   </div>


   <div class="form-group">
        <label for="OficEntregaSalida" class="control-label col-md-4">Oficial que entrega Salida:</label>
        <div class="col-md-5">
        <input class="form-control" id="OficEntregaSalida" value="<?php echo $Salida->codOficEntregaVehiSalida;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group">
        <label for="OficRecibeSalida" class="control-label col-md-4">Oficial que recive Salida:</label>
        <div class="col-md-5">
        <input class="form-control" id="OficRecibeSalida" value="<?php echo $Salida->codOficRecibeVehiSalida;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group">
        <label for="estadoAlcoholimetro" class="control-label col-md-4">Numero de Placa:</label>
        <div class="col-md-5">
        <input class="form-control" id="numPlaca" value="<?php echo $Salida->numPlacaVehiculoOfic;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

   <div class="form-group">
        <label for="observSalida" class="control-label col-md-4">Observaciones:</label>
        <div class="col-md-5">
        <input class="form-control" id="observSalida" value="<?php echo $Salida->observSalVehi;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

 

 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_SalidaVehiculo_"></p>
      </div>
 </div>


 </div>
 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <input type="button" id="btnSalidaVehiculo" class="btn btn-primary" value ="Registrar"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
