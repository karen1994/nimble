<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM automóvil INNER JOIN detenciones ON automóvil.idTipoVehiculo = detenciones.idTipoVehiculo WHERE automóvil.idAutomovil = ".$Consecutivo_id;

$query = $db->query($sql);
$Consecutivo=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
        $Consecutivo=$r;
         break;
     }
}

?>

<?php if($Consecutivo != null){?>

<br>
<div class="form-group">
      <div class="col-md-4 col-md-offset-10">
<a href="?view=verAutomovil" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
      <h1>Formulario salida de detención de automóvil</h1>
    </div>
</div>

  <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
  <h3>Registrar datos de la salida del automóvil</h3>
        </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idAutomovil;?>">
         </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivoDet" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivoDet" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="bolSalAuto" class="control-label col-md-4">Número de boleta</label>
       <div class="col-md-5">
     <input class="form-control" id="bolSalAuto" type="text" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
       </div>
  </div>

  <div class="form-group" id="IdAuto">
   <label for="identAuto" class="control-label col-md-4">Placa, vin, motor u otro</label>
     <div class="col-md-5">
   <input class="form-control" onfocus="return datosCorrectos()" id="identAuto" type="text" maxlength="25" disabled="" value="<?php echo $Consecutivo->identAuto;?>">
     </div>
  </div>

  <div class="form-group" id="autEnt">
     <label for="autoridadSalAuto" class="control-label col-md-4">Autoridad que entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="autoridadSalAuto" type="text" maxlength="50" placeholder=""  value="">
       </div>
  </div>

  <div class="form-group" id="ofiEnt">
     <label for="oficEntSalAuto" class="control-label col-md-4">Código del oficial que entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficEntSalAuto" type="text" maxlength="5" placeholder=""  value="">
       </div>
  </div>

  <div class="form-group" id="fecEntr">
     <label for="fecSalAuto" class="control-label col-md-4">Fecha de entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="fecSalAuto" type="date" value="">
       </div>
  </div>

  <div class="form-group" id="oficio">
     <label for="oficioSalAuto" class="control-label col-md-4">Número de oficio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficioSalAuto" type="text" maxlength="18" placeholder=""  value="">
       </div>
  </div>

<div class="form-group" id="tomo">
     <label for="tomoSalAuto" class="control-label col-md-4">Número de tomo</label>
     <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomoSalAuto" type="text" maxlength="4" placeholder="" value="">
     </div>
</div>

<div class="form-group" id="folio">
     <label for="folioSalAuto" class="control-label col-md-4">Número de folio</label>
     <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folioSalAuto" type="text" maxlength="4" placeholder="" value="">
     </div>
</div>


  <!-- Boton Terminar -->
 <div class="form-group">
    <div class="col-md-4 col-md-offset-4">
      <a id="Terminar1" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Terminar</a>
    </div>
</div>

</form>

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
