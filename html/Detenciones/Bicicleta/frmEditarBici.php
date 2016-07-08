<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = " SELECT * FROM bicicleta INNER JOIN detenciones ON bicicleta.idTipoVehiculo = detenciones.idTipoVehiculo WHERE bicicleta.idBicicleta = ".$Consecutivo_id;

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
  <!-- Formulario editar bicicleta-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verBicicleta" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1> Editar bicicleta</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos de la bicicleta</h3>
         </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idBicicleta;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="numConsecutivoD" class="control-label col-md-4">Número de consecutivo</label>
          <div class="col-md-5">
        <input class="form-control" id="numConsecutivoD" type="text" disabled="" value="<?php echo $Consecutivo->idDetenciones;?>">
          </div>
   </div>

   <div class="form-group">
        <label for="numBoletaBici" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" id="numBoletaBici" type="text" maxlength="15" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
          </div>
  </div>

  <div class="form-group">
       <label for="numMarcoBici" class="control-label col-md-4">Número de marco</label>
         <div class="col-md-5">
       <input class="form-control" id="numMarcoBici" type="text" maxlength="12" disabled="" value="<?php echo $Consecutivo->numMarcoBici;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="tipoBici" class="control-label col-md-4">Tipo de bicicleta</label>
       <div class="col-md-5">
     <input class="form-control" id="tipoBici" type="text" disabled="" value="<?php echo $Consecutivo->tipoBici;?>">
       </div>
  </div>

  <div class="form-group">
     <label for="llaveBici" class="control-label col-md-4">Número de llave</label>
       <div class="col-md-5">
     <input class="form-control" id="llaveBici" type="text" disabled="" value="<?php echo $Consecutivo->numLlave;?>">
       </div>
  </div>

  <div class="form-group">
       <label for="marcaBici" class="control-label col-md-4">Marca</label>
         <div class="col-md-5">
       <input class="form-control" id="marcaBici" type="text" maxlength="25"  disabled="" value="<?php echo $Consecutivo->marcaBici;?>">
         </div>
  </div>

  <div class="form-group">
     <label for="colorBici" class="control-label col-md-4">Color</label>
       <div class="col-md-5">
     <input class="form-control" id="colorBici" type="text" disabled=""  value="<?php echo $Consecutivo->colorBici;?>">
       </div>
  </div>

  <div class="form-group">
  <label for="obsBici" class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea id="obsBici" rows="8" cols="40"  maxlength="100" placeholder="Escriba la observación del automóvil" disabled=""><?php echo $Consecutivo->observBici;?></textarea>
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_editBici_"></p>
      </div>
  </div>


  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarBici" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a id="btnGuardarBici" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=verBicicleta" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>


   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
