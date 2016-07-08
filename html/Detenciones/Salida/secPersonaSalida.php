<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM automóvil INNER JOIN detenciones ON  detenciones.idTipoVehiculo = automóvil.idTipoVehiculo WHERE idAutomovil = ".$Consecutivo_id;


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
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a id="regresar" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

     <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
     <h3>Registrar persona que retira el automóvil</h3>
           </div>
     </div>

     <div class="form-group">
        <label for="bolSalMatricula" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" id="bolSalMatricula" type="text" maxlength="15" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
          </div>
     </div>


       <div class="form-group">
        <label for="identAuto" class="control-label col-md-4">Placa, vin, motor u otro</label>
          <div class="col-md-5">
        <input class="form-control" id="identAuto" type="text" maxlength="25" disabled="" value="<?php echo $Consecutivo->identAuto;?>">
          </div>
       </div>

        <div class="form-group" id="identPe">
          <label for="cedPersona" class="control-label col-md-4">Identificación</label>
          <div class="col-md-5">
          <input class="form-control" onfocus="return datosCorrectos()" id="cedPersona" type="text" placeholder="" value="" maxlength="20">
          </div>
        </div>

   <div class="form-group" id="nomPe">
        <label for="nomPersona" class="control-label col-md-4">Nombre</label>
        <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="nomPersona" type="text" placeholder="" value="" maxlength="50">
        </div>
   </div>

   <div class="form-group" id="ape1Pe">
        <label for="ape1Persona" class="control-label col-md-4">Primer Apellido</label>
        <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="ape1Persona" type="text" placeholder="" value="" maxlength="50">
        </div>
   </div>

   <div class="form-group" id="ape2Pe">
        <label for="ape2Persona" class="control-label col-md-4">Segundo Apellido</label>
        <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="ape2Persona" type="text" placeholder="" value="" maxlength="50">
        </div>
  </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_SalAuto_"></p>
      </div>
  </div>

<!-- Boton Terminar -->
 <div class="form-group">
    <div class="col-md-4 col-md-offset-4">
      <a id="Terminar2" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span> Terminar</a>
    </div>
</div>

<!-- BTN GUARDAR -->
<div class="form-group" id="btnGuardarDiv" style="display:none;">
   <div class="col-md-4 col-md-offset-4">
  <a  id="btnGuardarSalAuto" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="?view=verAutomovil" id="btnCancelar" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
   </div>
</div>

   </form>

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
