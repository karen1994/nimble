<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "select * from Placa where Placa.idNumPlaca = ".$Consecutivo_id;

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
  <!-- Formulario editar placa-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verMatricula" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1> Editar matricula</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos de la matricula </h3>
         </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idNumPlaca;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="estado" class="control-label col-md-4">Estado</label>
          <div class="col-md-5">
        <input class="form-control" id="estado" type="text" disabled="" value="<?php echo $Consecutivo->estadoPlaca;?>">
          </div>
   </div>

   <div class="form-group" id="boletaMa">
        <label for="numBoletaMatricula" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="numBoletaMatricula" type="text" maxlength="12" disabled=""   value="<?php echo $Consecutivo->numBoletaPlaca;?>">
          </div>
  </div>

  <div class="form-group" id="placaMa">
       <label for="numPlaca" class="control-label col-md-4">Número de placa</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="numPlaca" name="numPlaca" type="text" maxlength="12" disabled="" value="<?php echo $Consecutivo->numPlaca;?>">
         </div>
  </div>

  <div class="form-group" id="marcVehMa">
       <label for="marcVehiculo" class="control-label col-md-4">Marca del vehículo</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="marcVehiculo" type="text" maxlength="25"  disabled="" value="<?php echo $Consecutivo->marcaVehiculo;?>">
         </div>
  </div>

  <div class="form-group" id="fecDetMa">
     <label for="fecDetMatricula" class="control-label col-md-4">Fecha de detención</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="fecDetMatricula" type="date" disabled=""  value="<?php echo $Consecutivo->fecDetencionPlaca;?>">
       </div>
  </div>

  <div class="form-group" id="horaDetMa">
     <label for="horDetMatricula" class="control-label col-md-4">Hora de detención</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="horDetMatricula" type="time" disabled="" value="<?php echo $Consecutivo->horaDetencionPlaca;?>">
       </div>
  </div>

  <div class="form-group" id="observMa">
  <label for="obsMatricula" class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea id="obsMatricula" onfocus="return datosCorrectos()" rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación de la detención" disabled=""><?php echo $Consecutivo->observPlaca;?></textarea>
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Placa_"></p>
      </div>
  </div>


  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarPlaca" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a id="btnGuardarPlaca" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=verMatricula" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>


   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
