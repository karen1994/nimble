<?php
$db= new Conexion();
$Alcoholimetro_id= $_GET['id'];

$sql = "select * from alcoholimetro where alcoholimetro.idAlcoholimetro = ".$Alcoholimetro_id;

$query = $db->query($sql);
$Alcoholimetro=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Alcoholimetro=$r;
         break;
     }
}

?>

<?php if($Alcoholimetro != null){?>


  <!-- Formulario editar alcoholimetro-->
<div class="container">
<br>
   <form name="form1" action="" class="form-horizontal">

     <div class="form-group">
           <div class="col-md-4 col-md-offset-10">
     <a href="?view=verAlcoholimetro" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
           </div>
     </div>

     <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
     <h2> Editar alcoholimetro</h2>
           </div>
     </div>


     <div class="form-group">
          <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
            <div class="col-md-5">
          <input class="form-control" id="consecutivo" type="text" disabled="" value="<?php echo $Alcoholimetro->idAlcoholimetro;?>">
            </div>
     </div>

     <div class="form-group">
          <label for="EstaServicioAlcoholimetro" class="control-label col-md-4">Disponibilidad</label>
            <div class="col-md-5">
          <input class="form-control" id="EstaServicioAlcoholimetro" type="text" disabled="" value="<?php echo $Alcoholimetro->estadoServicioAlcoh;?>">
            </div>
     </div>

     <div class="form-group" id="Patrimonio">
          <label for="numPatrimonio" class="control-label col-md-4">Patrimonio</label>
            <div class="col-md-5">
          <input class="form-control" id="numPatrimonio"  onfocus="return validaciones()" value="<?php echo $Alcoholimetro->idnumPatrimonio;?>"type="text" maxlength="15" placeholder="">
            </div>
     </div>

    <div class="form-group" id="ultimaPrueba">
         <label for="numUltimaPrueba" class="control-label col-md-4">Numero de última prueba</label>
           <div class="col-md-5">
         <input class="form-control" id="numUltimaPrueba"  onfocus="return validaciones()" value="<?php echo $Alcoholimetro->numUltimaPrueba;?> "type="text" placeholder="">
           </div>
    </div>

    <div class="form-group">
         <label for="Observaciones" class="control-label col-md-4">Observaciones</label>
           <div class="col-md-5">
         <textarea id="Observaciones" onfocus="return validaciones()" rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Alcoholimetro->observAlcoholimetro;?></textarea>
           </div>
   </div>

<br>

 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_EditAlcoholimetro_"></p>
      </div>
 </div>


 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnEditAlcoholimetro" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=VerAlcoholimetro" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

     </form>
</div><!--Fin el div container-->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
