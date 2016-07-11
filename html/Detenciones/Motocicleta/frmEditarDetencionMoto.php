<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM detenciones INNER JOIN motocicleta ON detenciones.idTipoVehiculo = motocicleta.idTipoVehiculo WHERE detenciones.idDetenciones= ".$Consecutivo_id;

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
        <h1> Editar detención de la motocicleta</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos de entrada</h3>
         </div>
   </div>

   <div class="form-group">
        <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivoM" class="control-label col-md-4">Consecutivo de la motocicleta</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivoM" type="text" disabled="" value="<?php echo $Consecutivo->idMotocicleta;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="estado" class="control-label col-md-4">Estado</label>
          <div class="col-md-5">
        <input class="form-control" id="estado" type="text" disabled="" value="<?php echo $Consecutivo->estadoMoto;?>">
          </div>
   </div>

   <div class="form-group" id="boleta">
        <label for="numBoletaDetencion" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="numBoletaDetencion" type="text" maxlength="12" value="<?php echo $Consecutivo->numBoletaDetencion;?>">
          </div>
  </div>

  <div class="form-group" id="fechaBoleta">
      <label for="fecBoletaDetencion" class="control-label col-md-4">Fecha de boleta</label>
        <div class="col-md-5">
      <input class="form-control" onfocus="return datosCorrectos()" id="fecBoletaDetencion" type="date" value="<?php echo $Consecutivo->fecBoletaDetencion;?>">
        </div>
  </div>

  <div class="form-group" id="IdMoto">
       <label for="numPlacaMoto" class="control-label col-md-4">Placa, motor, marco u otro</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="identMoto" type="text" maxlength="25"  value="<?php echo $Consecutivo->identMoto;?>">
         </div>
  </div>

  <div class="form-group" id="tomo">
     <label for="tomEntDetencion" class="control-label col-md-4">Tomo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomEntDetencion" type="text"  maxlength="4" value="<?php echo $Consecutivo->TomoDetenciones;?>">
       </div>
  </div>

  <div class="form-group" id="folio">
     <label for="folEntDetencion" class="control-label col-md-4">Folio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folEntDetencion" type="text" maxlength="4" value="<?php echo $Consecutivo->FolioDetenciones;?>">
       </div>
  </div>

  <div class="form-group" id="oDetiene">
      <label for="ofiDetMoto" class="control-label col-md-4">Código del oficial que detiene</label>
        <div class="col-md-5">
      <input class="form-control" onfocus="return datosCorrectos()" id="ofiDetMoto" type="text" maxlength="5"  value="<?php echo $Consecutivo->codOficialDetiene;?>">
        </div>
  </div>

  <div class="form-group" id="oRecibe">
     <label for="ofiRecMoto" class="control-label col-md-4">Código del oficial que recibe</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="ofiRecMoto" type="text" maxlength="5"  value="<?php echo $Consecutivo->codOficialRecibe;?>">
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Detencion_Moto_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
        <a id="btnActualizar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verMotocicleta" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>
</div><!--Fin el div container-->
   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
