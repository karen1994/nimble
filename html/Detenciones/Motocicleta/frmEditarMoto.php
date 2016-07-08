<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM motocicleta INNER JOIN detenciones ON motocicleta.idTipoVehiculo = detenciones.idTipoVehiculo WHERE motocicleta.idMotocicleta =  ".$Consecutivo_id;

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
  <!-- Formulario editar motocicleta-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verMotocicleta" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1> Editar motocicleta</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos de la motocicleta</h3>
         </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idMotocicleta;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivoD" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivoD" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
          </div>
   </div>

   <div class="form-group">
        <label for="numBoletaMoto" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" id="numBoletaMoto" type="text" maxlength="15" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
          </div>
  </div>

  <div class="form-group">
       <label for="numPlacaMoto" class="control-label col-md-4">Número de placa</label>
         <div class="col-md-5">
       <input class="form-control" id="numPlacaMoto" type="text" maxlength="12" disabled="" value="<?php echo $Consecutivo->numPlacaMoto;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="llaveMoto" class="control-label col-md-4">Número de llave</label>
       <div class="col-md-5">
     <input class="form-control" id="llaveMoto" type="text" disabled="" value="<?php echo $Consecutivo->numLlave;?>">
       </div>
  </div>

  <div class="form-group">
       <label for="marcaMoto" class="control-label col-md-4">Marca</label>
         <div class="col-md-5">
       <input class="form-control" id="marcaMoto" type="text" maxlength="25"  disabled="" value="<?php echo $Consecutivo->marcaMoto;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="colorMoto" class="control-label col-md-4">Color</label>
       <div class="col-md-5">
     <input class="form-control" id="colorMoto" type="text" disabled=""  value="<?php echo $Consecutivo->colorMoto;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="motorMoto" class="control-label col-md-4">Número de motor</label>
       <div class="col-md-5">
     <input class="form-control" id="motorMoto" type="text" disabled="" value="<?php echo $Consecutivo->numMotorMoto;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="marcoMoto" class="control-label col-md-4">Número de marco</label>
       <div class="col-md-5">
     <input class="form-control" id="marcoMoto" type="text" disabled="" value="<?php echo $Consecutivo->numMarcoMoto;?>">
       </div>
  </div>

  <div class="form-group">
  <label for="obsMoto" class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea id="obsMoto" rows="8" cols="40"  maxlength="100" placeholder="Escriba la observación del automóvil" disabled=""><?php echo $Consecutivo->observMoto;?></textarea>
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_editMoto_"></p>
      </div>
  </div>


  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarMoto" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a id="btnGuardarMoto" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=verAutomovil" id="btnCancelarPlaca" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>


   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
