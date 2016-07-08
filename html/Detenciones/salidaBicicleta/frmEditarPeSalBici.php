<?php
$db= new Conexion();
$ConsecutivoP_id= $_GET['id'];

$sql = "SELECT * FROM salidadetencion INNER JOIN detenciones ON salidadetencion . idDetenciones = detenciones . idDetenciones INNER JOIN persona ON salidadetencion.`idPersona`=persona.`idPersona`
INNER JOIN `bicicleta` ON `bicicleta`.`idTipoVehiculo` = `detenciones`.`idTipoVehiculo` WHERE persona.`idPersona`=".$ConsecutivoP_id;

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

  <!-- Formulario matricula-->
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
        <h1> Editar persona que retira la bicicleta</h1>
              </div>
        </div>


      <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
      <h3> Datos de la persona </h3>
         </div>
      </div>

        <div class="form-group" style="display:none;">
             <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
               <div class="col-md-5">
             <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idPersona;?>">
               </div>
        </div>

        <div class="form-group">
             <label for="numBoletaMatricula" class="control-label col-md-4">Número de boleta</label>
               <div class="col-md-5">
             <input class="form-control" id="numBoletaMatricula" type="text" maxlength="15" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
               </div>
        </div>

       <div class="form-group">
         <label for="cedPersona" class="control-label col-md-4">Número de cédula</label>
            <div class="col-md-5">
        <input class="form-control" id="cedPersona" type="text" maxlength="20" placeholder="" disabled="" value="<?php echo $Consecutivo->cedPersona;?>" >
            </div>
       </div>

        <div class="form-group">
          <label for="nomPersona" class="control-label col-md-4">Nombre</label>
            <div class="col-md-5">
          <input class="form-control" id="nomPersona" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->nomPersona;?>">
            </div>
        </div>

        <div class="form-group">
          <label for="ape1" class="control-label col-md-4">Primer apellido</label>
              <div class="col-md-5">
          <input class="form-control" id="ape1" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->ape1Persona;?>">
              </div>
        </div>


   <div class="form-group ">
        <label for="ape2" class="control-label col-md-4">Segundo apellido</label>
          <div class="col-md-5">
        <input class="form-control" id="ape2" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->ape2Persona;?>">
          </div>
   </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_PersonaSalBici_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarPersonaBici" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarPersonaBici" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verSalidasBici" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
