<?php
$db= new Conexion();
$ConsecutivoP_id= $_GET['id'];

$sql = "SELECT * FROM detenciones INNER JOIN Persona ON detenciones.`idPersona` = Persona.`idPersona`
WHERE  Persona.`idPersona`=".$ConsecutivoP_id;

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

  <!-- Formulario editar conductor-->
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
        <h1> Editar conductor del automóvil</h1>
              </div>
        </div>


      <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
      <h3> Datos del conductor </h3>
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
             <input class="form-control" id="numBoletaMatricula" type="text" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
               </div>
        </div>

       <div class="form-group" id="identPe">
         <label for="cedPersona" class="control-label col-md-4">Identificación</label>
            <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="cedPersona" type="text" maxlength="20" placeholder="" disabled="" value="<?php echo $Consecutivo->cedPersona;?>" >
            </div>
       </div>

        <div class="form-group" id="nomPe">
          <label for="nomPersona" class="control-label col-md-4">Nombre</label>
            <div class="col-md-5">
          <input class="form-control" onfocus="return datosCorrectos()" id="nomPersona" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->nomPersona;?>">
            </div>
        </div>

        <div class="form-group" id="ape1Pe">
          <label for="ape1" class="control-label col-md-4">Primer apellido</label>
              <div class="col-md-5">
          <input class="form-control" onfocus="return datosCorrectos()" id="ape1" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->ape1Persona;?>">
              </div>
        </div>


   <div class="form-group" id="ape2Pe">
        <label for="ape2" class="control-label col-md-4">Segundo apellido</label>
          <div class="col-md-5">
        <input class="form-control" onfocus="return datosCorrectos()" id="ape2" type="text" maxlength="50" placeholder="" disabled="" value="<?php echo $Consecutivo->ape2Persona;?>">
          </div>
   </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Persona_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditarPersona" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarPersona" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verAutomovil" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>

   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
