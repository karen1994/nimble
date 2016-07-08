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

  <!-- Formulario editar matricula-->
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
        <h1> Editar detención de matricula</h1>
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
        <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idNumPlaca;?>">
          </div>
   </div>

   <div class="form-group" style="display:none;">
        <label for="estado" class="control-label col-md-4">Estado</label>
          <div class="col-md-5">
        <input class="form-control" id="estado" type="text" disabled="" value="<?php echo $Consecutivo->estadoPlaca;?>">
          </div>
   </div>

   <div class="form-group" id="boleta">
        <label for="numBoletaMatricula" class="control-label col-md-4">Número de boleta</label>
          <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="numBoletaMatricula" type="text" maxlength="12"    value="<?php echo $Consecutivo->numBoletaPlaca;?>">
          </div>
  </div>

  <div class="form-group" id="fecboleta">
      <label for="fecBoleta" class="control-label col-md-4">Fecha de boleta</label>
        <div class="col-md-5">
      <input class="form-control" onfocus="return datosCorrectos()" id="fecBoleta" type="date"   value="<?php echo $Consecutivo->fecBoletaPlaca;?>">
        </div>
  </div>

  <div class="form-group" id="placa">
       <label for="numPlaca" class="control-label col-md-4">Número de placa</label>
         <div class="col-md-5">
       <input class="form-control" onfocus="return datosCorrectos()" id="numPlaca" type="text" maxlength="12"  value="<?php echo $Consecutivo->numPlaca;?>">
         </div>
  </div>

  <div class="form-group" id="tomo">
     <label for="tomEntMatricula" class="control-label col-md-4">Tomo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomEntMatricula" type="text"  maxlength="4" value="<?php echo $Consecutivo->tomEntMatricula;?>">
       </div>
  </div>

  <div class="form-group" id="folio">
     <label for="folEntMatricula" class="control-label col-md-4">Folio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folEntMatricula" type="text" maxlength="4"   value="<?php echo $Consecutivo->folEntMatricula;?>">
       </div>
  </div>

  <div class="form-group" id="oDetiene">
      <label for="ofiDetMatricula" class="control-label col-md-4">Código del oficial que detiene</label>
        <div class="col-md-5">
      <input class="form-control" onfocus="return datosCorrectos()" id="ofiDetMatricula" type="text" maxlength="5"  value="<?php echo $Consecutivo->codOficialDetienPlaca;?>">
        </div>
  </div>

  <div class="form-group" id="oRecibe">
     <label for="ofiRecMatricula" class="control-label col-md-4">Código del oficial que recibe</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="ofiRecMatricula" type="text" maxlength="5"  value="<?php echo $Consecutivo->codOficialRecPlaca;?>">
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Matricula_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
        <a id="btnActualizar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a  href="?view=verMatricula" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>
</div><!--Fin el div container-->
   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
