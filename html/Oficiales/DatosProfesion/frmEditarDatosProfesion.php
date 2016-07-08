<?php
$db= new Conexion();
$Oficial_id= $_GET['id'];

$sql = "select * from oficiales where oficiales.idOficial = ".$Oficial_id;

$query = $db->query($sql);
$Oficial=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Oficial=$r;
         break;
     }
}

?>

<?php if($Oficial != null){?>


 <div class="container">
        <br>
      <form action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=VerProfesionOficiales" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

     <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
     <h3>Editar Registro de Oficiales</h3>
           </div>
     </div>
     <br><br>

   <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
     <h4>Datos de Profesion</h4>
           </div>
     </div>
     <br>

     <div class="form-group">
          <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
            <div class="col-md-5">
          <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Oficial->idOficial;?>">
            </div>
     </div>

        <div class="form-group"id="ingreso">
        <label for="IngresoDele" class="control-label col-md-4">Fecha de Ingreso a la Delegacion:</label>
        <div class="col-md-5">
        <input class="form-control" id="IngresoDele" onfocus="return validaciones()" value="<?php echo $Oficial->fecIngresoDelegacion;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

        <div class="form-group" id="nombOfic">
        <label for="NombraOficial" class="control-label col-md-4">Nombramiento Oficial</label>
        <div class="col-md-5">
        <input class="form-control" id="NombraOficial" onfocus="return validaciones()" value="<?php echo $Oficial->nombraOficial;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

          <div class="form-group" id="NomPuesto">
        <label for="NombrePuesto" class="control-label col-md-4">Nombre del Puesto</label>
        <div class="col-md-5">
        <input class="form-control" id="NombrePuesto" onfocus="return validaciones()" value="<?php echo $Oficial->nomPuesto;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

          <div class="form-group" id="CodOfic">
        <label for="CodigoOficial"  class="control-label col-md-4">Codigo del Oficial</label>
        <div class="col-md-5">
        <input class="form-control" id="CodigoOficial" onfocus="return validaciones()" value="<?php echo $Oficial->codOficial;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>


 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_Oficiales_"></p>
      </div>
 </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <a id="btnEditarProfesion" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="?view=VerProfesionOficiales" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
