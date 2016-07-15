<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM salidadetencion INNER JOIN detenciones ON salidadetencion.idDetenciones = detenciones.idDetenciones
INNER JOIN `automóvil` ON `automóvil`.`idTipoVehiculo` = `detenciones`.`idTipoVehiculo` WHERE `idSalidaDetencion`=".$Consecutivo_id;

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

  <!-- Formulario salida matricula-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verSalidasAuto" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-3">
        <h1>Editar salida de detención del automóvil</h1>
              </div>
        </div>


  <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
  <h3> Datos de salida del automóvil</h3>
        </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idSalidaDetencion;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="bolSalMatricula" class="control-label col-md-4">Número de boleta</label>
       <div class="col-md-5">
     <input class="form-control" id="bolSalAuto" type="text" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
       </div>
  </div>

  <div class="form-group">
   <label for="identAuto" class="control-label col-md-4">Placa, vin, motor u otro</label>
     <div class="col-md-5">
   <input class="form-control" id="identAuto" type="text" disabled="" value="<?php echo $Consecutivo->identAuto;?>">
     </div>
  </div>

  <div class="form-group" id="autEnt">
     <label for="autSalAuto" class="control-label col-md-4">Autoridad que entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="autSalAuto" type="text" maxlength="50" disabled="" placeholder="" value="<?php echo $Consecutivo->autoridadEntrega;?>">
       </div>
  </div>

  <div class="form-group" id="ofiEnt">
    <label for="oficialSalAuto" class="control-label col-md-4">Oficial que entrega</label>
      <div class="col-md-5">
    <input class="form-control" onfocus="return datosCorrectos()" id="oficialSalAuto" type="text" maxlength="5" disabled="" placeholder="" value="<?php echo $Consecutivo->codOficialEntrega;?>">
      </div>
  </div>

  <div class="form-group" id="fecEntr">
     <label for="fecSalAuto" class="control-label col-md-4">Fecha de entrega</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="fecSalAuto" type="date" disabled="" value="<?php echo $Consecutivo->fecEntregaVehiculo;?>">
       </div>
  </div>

  <div class="form-group" id="oficio">
     <label for="oficioSalAuto" class="control-label col-md-4">Número de oficio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficioSalAuto" type="text" maxlength="18" disabled="" placeholder="" value="<?php echo $Consecutivo->numOficioSalida;?>">
       </div>
  </div>

  <div class="form-group" id="tomo">
     <label for="tomoSalAuto" class="control-label col-md-4">Número de tomo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomoSalAuto" type="text" maxlength="4" disabled="" placeholder="" value="<?php echo $Consecutivo->tomSalDetencion;?>">
       </div>
  </div>

  <div class="form-group" id="folio">
     <label for="folioSalAuto" class="control-label col-md-4">Número de folio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folioSalAuto" type="text" maxlength="4" disabled="" placeholder="" value="<?php echo $Consecutivo->folSalDetencion;?>">
       </div>
  </div>


  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_EditSalAuto_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
      <a id="btnEditarSalAuto" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarEditSalAuto" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verSalidasAuto" id="btnCancelareditSMatricula" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
