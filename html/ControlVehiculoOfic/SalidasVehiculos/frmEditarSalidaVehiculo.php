<?php
$db= new Conexion();
$Salida_id= $_GET['id'];

$sql = "select * from entradasalidavehiculooficial where numPlacaVehiculoOfic = '$Salida_id'";

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


  <div class="container">
    <br>
  <form action="" class="form-horizontal">

          <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=VerSalidaVehiculo" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
        </div>
  </div>

  <div class="form-group">
       <div class="col-md-6 col-md-offset-4">
  <h2>Editar Salida de Vehiculo Oficial</h2>
       </div>
  </div>

  <div class="form-group">
    <label for="NumeroPlaca" class="control-label col-md-4">Numero de Placa:</label>
    <div class="col-md-5">
    <input class="form-control" id="NumeroPlaca" value="<?php echo $Salida->numPlacaVehiculoOfic;?>" type="text" disabled maxlength="15" placeholder="">
    </div>
  </div>

    <div class="form-group" id="FecSalida">
      <label for="FechaSalida" class="control-label col-md-4">Fecha de salida del Vehiculo:</label>
      <div class="col-md-5">
      <input class="form-control" id="FechaSalida" onfocus="return validaciones()" value="<?php echo $Salida->fecSalidaVehi;?>" type="date" maxlength="15" placeholder="">
      </div>
    </div>

  <div class="form-group" id="horaSalida">
    <label for="HoraSalida" class="control-label col-md-4">Hora de salida del Vehiculo:</label>
    <div class="col-md-5">
    <input class="form-control" id="HoraSalida" onfocus="return validaciones()" value="<?php echo $Salida->horaSalidaVehi;?>" type="time" placeholder="">
    </div>
  </div>


  <div class="form-group" id="EntregaSalida">
    <label for="OficEntregaSalida" class="control-label col-md-4">Codigo del oficial que entrega:</label>
    <div class="col-md-5">
    <input class="form-control" id="OficEntregaSalida" onfocus="return validaciones()" value="<?php echo $Salida->codOficEntregaVehiSalida;?>" type="text" maxlength="15" placeholder="">
    </div>
  </div>


  <div class="form-group" id="RecibeSalida">
    <label for="OficRecibeSalida" class="control-label col-md-4">Codigo del oficial que recive:</label>
    <div class="col-md-5">
    <input class="form-control" id="OficRecibeSalida" onfocus="return validaciones()" value="<?php echo $Salida->codOficRecibeVehiSalida;?>" type="text" maxlength="15" placeholder="">
    </div>
  </div>


    <div class="form-group" >
         <label for="observSalida" class="control-label col-md-4">Observaciones</label>
           <div class="col-md-5">
         <textarea id="observSalida"  rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Salida->observSalVehi;?></textarea>
           </div>
    </div>



    <div class="form-group">
            <label  class="control-label col-md-4"></label>
            <div class="col-md-8">
             <div id="_AJAX_EditarSalidaVehiculo_" ></div>
            </div>
    </div>
    <br>

  </div>
  <div class="form-group">
  <div class="col-md-8 col-md-offset-4">
  <a id="btnEditarSalidaVehiculo" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <a href="?view=VerVehiculoOfic" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
  </div>
  </div>

  </form>

  </div>

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
