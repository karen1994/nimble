<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "
SELECT * FROM automóvil INNER JOIN detenciones ON automóvil.idTipoVehiculo = detenciones.idTipoVehiculo WHERE automóvil.idAutomovil = ".$Consecutivo_id;

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
  <!-- Formulario editar automóvil-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verAutomovil" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1> Editar automóvil</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos del automóvil </h3>
         </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idAutomovil;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivoD" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivoD" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="estado" class="control-label col-md-4">Estado</label>
          <div class="col-md-5">
        <input class="form-control" id="estado" type="text" disabled="" value="<?php echo $Consecutivo->estadoAuto;?>">
          </div>
   </div>

   <div class="form-group">
        <label for="numBoletaAuto" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" id="numBoletaAuto" type="text" maxlength="15" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
          </div>
  </div>

  <div class="form-group" id="IdAuto">
       <label for="identAuto" class="control-label col-md-4">Placa, vin, motor u otro</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="identAuto" type="text" maxlength="25" disabled="" value="<?php echo $Consecutivo->identAuto;?>">
         </div>
  </div>

  <div class="form-group" id="llave">
     <label for="llaveAuto" class="control-label col-md-4">Número de llave</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="llaveAuto" type="text" disabled="" value="<?php echo $Consecutivo->numLlave;?>">
       </div>
  </div>

  <div class="form-group" id="marca">
       <label for="marcaAuto" class="control-label col-md-4">Marca</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="marcaAuto" type="text" maxlength="25"  disabled="" value="<?php echo $Consecutivo->marcaAuto;?>">
         </div>
  </div>

  <div class="form-group" id="color">
     <label for="colorAuto" class="control-label col-md-4">Color</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="colorAuto" type="text" disabled=""  value="<?php echo $Consecutivo->colorAuto;?>">
       </div>
  </div>

  <div class="form-group" id="observacion">
  <label for="obsAuto" class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea onfocus="return datosCorrectos()" id="obsAuto" rows="8" cols="40"  maxlength="100" placeholder="Escriba la observación del automóvil" disabled=""><?php echo $Consecutivo->observAuto;?></textarea>
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_editAuto_"></p>
      </div>
  </div>


  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarAuto" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a id="btnGuardarAuto" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=verAutomovil" id="btnCancelarPlaca" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>


   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
