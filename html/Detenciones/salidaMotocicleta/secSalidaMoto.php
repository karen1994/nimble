<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "
 SELECT * FROM motocicleta INNER JOIN detenciones ON motocicleta.idTipoVehiculo = detenciones.idTipoVehiculo WHERE motocicleta.idMotocicleta = ".$Consecutivo_id;

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
<a href="?view=verMotocicleta" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
      <h1>Formulario salida de detención de motocicleta</h1>
    </div>
</div>

  <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
  <h3>Registrar datos de la salida de la motocicleta</h3>
        </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idMotocicleta;?>">
         </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivoDet" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivoDet" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="bolSalMoto" class="control-label col-md-4">Número de boleta</label>
       <div class="col-md-5">
     <input class="form-control" id="bolSalMoto" type="text" maxlength="12" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
       </div>
  </div>

  <div class="form-group" id="IdMoto">
   <label for="identMoto" class="control-label col-md-4">Placa, motor, marco u otro</label>
     <div class="col-md-5">
   <input class="form-control" onfocus="return datosCorrectos()" id="identMoto" type="text" maxlength="25" disabled="" value="<?php echo $Consecutivo->identMoto;?>">
     </div>
  </div>

  <div class="form-group" id="autEnt">
     <label for="autoridadSalMoto" class="control-label col-md-4">Autoridad que entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="autoridadSalMoto" type="text" maxlength="50" placeholder=""  value="">
       </div>
  </div>

  <div class="form-group" id="ofiEnt">
     <label for="oficEntSalMoto" class="control-label col-md-4">Código del oficial que entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficEntSalMoto" type="text" maxlength="5" placeholder=""  value="">
       </div>
  </div>

  <div class="form-group" id="fecEntr">
     <label for="fecSalMoto" class="control-label col-md-4">Fecha de entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="fecSalMoto" type="date" value="">
       </div>
  </div>

  <div class="form-group" id="oficio">
     <label for="oficioSalMoto" class="control-label col-md-4">Número de oficio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficioSalMoto" type="text" maxlength="18" placeholder=""  value="">
       </div>
  </div>

<div class="form-group" id="tomo">
     <label for="tomoSalMoto" class="control-label col-md-4">Número de tomo</label>
     <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomoSalMoto" type="text" maxlength="4" placeholder="" value="">
     </div>
</div>

<div class="form-group" id="folio">
     <label for="folioSalMoto" class="control-label col-md-4">Número de folio</label>
     <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folioSalMoto" type="text" maxlength="4" placeholder="" value="">
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
