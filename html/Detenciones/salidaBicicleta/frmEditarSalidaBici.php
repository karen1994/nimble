<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "
  SELECT * FROM salidadetencion INNER JOIN detenciones ON salidadetencion.idDetenciones = detenciones.idDetenciones
INNER JOIN bicicleta ON bicicleta.idTipoVehiculo = detenciones.idTipoVehiculo WHERE idSalidaDetencion = ".$Consecutivo_id;

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

  <!-- Formulario editar salida de motocicleta-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verSalidasBici" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-3">
        <h1>Editar salida de detención de la bicicleta</h1>
              </div>
        </div>


  <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
  <h3> Datos de salida de la bicicleta</h3>
        </div>
  </div>

  <div class="form-group" style="display:none;">
       <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
         <div class="col-md-5">
       <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idSalidaDetencion;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="bolSalMoto" class="control-label col-md-4">Número de boleta</label>
       <div class="col-md-5">
     <input class="form-control" id="bolSalMoto" type="text" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
       </div>
  </div>

  <div class="form-group">
   <label for="placaSalMoto" class="control-label col-md-4">Número de marco</label>
     <div class="col-md-5">
   <input class="form-control" id="placaSalMoto" type="text" maxlength="12" disabled="" value="<?php echo $Consecutivo->numMarcoBici;?>">
     </div>
  </div>

  <div class="form-group">
     <label for="autSalMoto" class="control-label col-md-4">Autoridad que entrega</label>
       <div class="col-md-5">
     <input class="form-control" id="autSalMoto" type="text" maxlength="50" disabled="" placeholder="" value="<?php echo $Consecutivo->autoridadEntrega;?>">
       </div>
  </div>

  <div class="form-group">
    <label for="oficialSalMoto" class="control-label col-md-4">Oficial que entrega</label>
      <div class="col-md-5">
    <input class="form-control" id="oficialSalMoto" type="text" maxlength="5" disabled="" placeholder="" value="<?php echo $Consecutivo->codOficialEntrega;?>">
      </div>
  </div>

  <div class="form-group">
     <label for="fecSalMoto" class="control-label col-md-4">Fecha de entrega</label>
       <div class="col-md-5">
     <input class="form-control" id="fecSalMoto" type="date" disabled="" value="<?php echo $Consecutivo->fecEntregaVehiculo;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="oficioSalMoto" class="control-label col-md-4">Número de oficio</label>
       <div class="col-md-5">
     <input class="form-control" id="oficioSalMoto" type="text" maxlength="18" disabled="" placeholder="" value="<?php echo $Consecutivo->numOficioSalida;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="tomoSalMoto" class="control-label col-md-4">Número de tomo</label>
       <div class="col-md-5">
     <input class="form-control" id="tomoSalMoto" type="text" maxlength="4" disabled="" placeholder="" value="<?php echo $Consecutivo->tomSalDetencion;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="folioSalMoto" class="control-label col-md-4">Número de folio</label>
       <div class="col-md-5">
     <input class="form-control" id="folioSalMoto" type="text" maxlength="4" disabled="" placeholder="" value="<?php echo $Consecutivo->folSalDetencion;?>">
       </div>
  </div>


  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_EditSalBici_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
      <a id="btnEditarSalBici" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarEditSalBici" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verSalidasBici" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
