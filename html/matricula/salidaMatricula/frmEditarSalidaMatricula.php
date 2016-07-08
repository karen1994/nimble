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
  <!-- Formulario salida matricula-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verSalidasMatriculas" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1>Editar salida de matricula</h1>
              </div>
        </div>


  <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
  <h3> Datos de salida</h3>
        </div>
  </div>

  <div class="form-group" style="display:none;">
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

  <div class="form-group">
     <label for="bolSalMatricula" class="control-label col-md-4">Número de boleta</label>
       <div class="col-md-5">
     <input class="form-control" id="bolSalMatricula" type="text" maxlength="15" placeholder="" disabled="" value="<?php echo $Consecutivo->numBoletaPlaca;?>">
       </div>
  </div>

  <div class="form-group">
   <label for="numPlaca" class="control-label col-md-4">Número de placa</label>
     <div class="col-md-5">
   <input class="form-control" id="placaSalMatricula" type="text" maxlength="12" disabled="" value="<?php echo $Consecutivo->numPlaca;?>">
     </div>
  </div>

  <div class="form-group" id="oficMa">
     <label for="oficioSalMatricula" class="control-label col-md-4">Número de oficio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="oficioSalMatricula" type="text" maxlength="18" placeholder="" disabled="" value="<?php echo $Consecutivo->numOficioPlaca;?>">
       </div>
  </div>

  <div class="form-group" id="fecSaMa">
    <label for="fecDetMatricula" class="control-label col-md-4">Fecha de salida</label>
      <div class="col-md-5">
    <input class="form-control" onfocus="return datosCorrectos()" id="fecSalMatricula" type="date"  placeholder="" disabled="" value="<?php echo $Consecutivo->fecSalMatricula;?>">
      </div>
  </div>

  <div class="form-group" id="tomMa">
     <label for="tomSalMatricula" class="control-label col-md-4">Tomo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="tomSalMatricula" type="text" maxlength="4" placeholder="" disabled="" value="<?php echo $Consecutivo->tomSalMatricula;?>">
       </div>
  </div>

  <div class="form-group" id="folMa">
     <label for="folSalMatricula" class="control-label col-md-4">Folio</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="folSalMatricula" type="text" maxlength="4" placeholder="" disabled="" value="<?php echo $Consecutivo->folSalMatricula;?>">
       </div>
  </div>

  <div class="form-group" id="nomPeCoMa">
     <label for="nomPerCorreo" class="control-label col-md-4">Nombre de persona del correo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="nomPerCorreo" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->nomPersonaEnvia;?>">
       </div>
  </div>

  <div class="form-group" id="ape1PeCoMa">
     <label for="ape1PerCorreo" class="control-label col-md-4">Primer apellido de persona del correo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="ape1PerCorreo" type="text" maxlength="50"  placeholder="" disabled="" value="<?php echo $Consecutivo->ape1PersonaEnvia;?>">
       </div>
  </div>

  <div class="form-group" id="ape2PeCoMa">
     <label for="ape2PerCorreo" class="control-label col-md-4">Segundo apellido de persona del correo</label>
       <div class="col-md-5">
     <input class="form-control" onfocus="return datosCorrectos()" id="ape2PerCorreo" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->ape2PersonaEnvia;?>">
       </div>
  </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_editSMatricula_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
      <a id="btnEditarSMatricula" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarSMatricula" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verSalidasMatriculas" id="btnCancelareditSMatricula" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
