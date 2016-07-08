<?php
$db= new Conexion();
$Vehiculo_id= $_GET['id'];

$sql = "select * from VehiculoOficial where VehiculoOficial.idVehiculoOficial = ".$Vehiculo_id;

$query = $db->query($sql);
$Vehiculo=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Vehiculo=$r;
         break;
     }
}

?>

<?php if($Vehiculo != null){?>



<!--Inicia el div container-->
  <div class="container">
  <br>

   <form id="RegVehiculoOficial"class="form-horizontal" onkeypress="return runScriptRegVehiculoOficial(event)">

     <div class="form-group">
          <label  class="control-label col-md-4"></label>
        <div class="col-md-8">
           <div id="_AJAX_VehiculoOficial_"></div>
        </div>
    </div>


     <div class="form-group">
           <div class="col-md-9 col-md-offset-3">
     <h1>Formulario editar vehiculos oficiales</h1>
           </div>
     </div>

     <br><br>

     <div class="form-group">
       <label for="consecutivo" class="control-label col-md-4">Consecutivo:</label>
       <div class="col-md-5">
       <input class="form-control" id="consecutivo" value="<?php echo $Vehiculo->idVehiculoOficial;?> "type="text"  disabled="">
       </div>
     </div>

        <div class="form-group">
          <label for="numPlaca" class="control-label col-md-4">Numero de placa:</label>
          <div class="col-md-5">
          <input class="form-control" id="numPlaca" value="<?php echo $Vehiculo->numPlacaVehiculoOfic;?> "type="text" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group ">
        <label for="TipoVehiculo" class="control-label col-md-4">Tipo de vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="TipoVehiculo"  value="<?php echo $Vehiculo->tipoVehiculoOfic;?> "type="text" placeholder="">
        </div>
   </div>


  <div class="form-group ">
        <label for="MarcaVehiculo " class="control-label col-md-4">Marca del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="MarcaVehiculo"  value="<?php echo $Vehiculo->marcaVehiculoOfic;?> "type="text" placeholder="">
        </div>
   </div>


   <div class="form-group">
        <label for="KmInicial" class="control-label col-md-4">Kilometraje Inicial:</label>
        <div class="col-md-5">
        <input class="form-control" id="KmInicial"  value="<?php echo $Vehiculo->kmInicial;?> "type="text" maxlength="15" placeholder="">
        </div>
   </div>

    <div class="form-group">
        <label for="Observaciones" class="control-label col-md-4">Observaciones:</label>
        <div class="col-md-5">
        <input class="form-control" id="Observaciones"  value="<?php echo $Vehiculo->observ;?> "type="text" maxlength="15" placeholder="">
        </div>
  </div>

    <div class="form-group">
        <label for="estadoServicioVehiculo" class="control-label col-md-4">Estado del servicio del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="estadoServicioVehiculo"  value="<?php echo $Vehiculo->estadoVehO;?> "type="text" maxlength="15" placeholder="">
        </div>
  </div>


 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_VehiculoOficial_"></p>
      </div>
 </div>


 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <input type="button" id="btnReg" onclick="return registroVehiculoOficial()" class="btn btn-primary" value ="Registrar"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <a href="?view=VerVehiculoOfic" class="btn btn-danger">Cancelar</a>
      </div>
 </div>
      </form>

    </div>
    <!--Fin el div container-->

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
