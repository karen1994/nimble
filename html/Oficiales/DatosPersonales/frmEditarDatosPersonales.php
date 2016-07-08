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
        <a href="?view=VerDatosOficiales" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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
     <h4>Datos Personales</h4>
           </div>
     </div>
     <br><br>

     <div class="form-group">
          <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
            <div class="col-md-5">
          <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Oficial->idOficial;?>">
            </div>
     </div>

        <div class="form-group" id="Nom">
          <label for="Nombre" class="control-label col-md-4">Nombre:</label>
          <div class="col-md-5">
          <input class="form-control" id="Nombre" onfocus="return validaciones()" value="<?php echo $Oficial->nomOficial;?>" type="text" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group" id="priApell">
        <label for="PrimerApell" class="control-label col-md-4">Primer Apellido:</label>
        <div class="col-md-5">
        <input class="form-control" id="PrimerApell" onfocus="return validaciones()" value="<?php echo $Oficial->ape1Oficial;?>" type="text" placeholder="">
        </div>
   </div>

   <div class="form-group" id="SeguApell">
        <label for="SegundoApell" class="control-label col-md-4">Segundo Apellido:</label>
        <div class="col-md-5">
        <input class="form-control" id="SegundoApell" onfocus="return validaciones()" value="<?php echo $Oficial->ape2Oficial;?>" type="text" maxlength="15" placeholder="">
        </div>
   </div>

   <div class="form-group" id="Ced">
        <label for="Cedula" class="control-label col-md-4">Cedula</label>
        <div class="col-md-5">
        <input class="form-control" id="Cedula" onfocus="return validaciones()" value="<?php echo $Oficial->cedOficial;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

     <div class="form-group" id="edad">
        <label for="Edad" class="control-label col-md-4">Edad</label>
        <div class="col-md-5">
        <input class="form-control" id="Edad" onfocus="return validaciones()" value="<?php echo $Oficial->edadOficial;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

    <div class="form-group" id="Direcc">
        <label for="Direccion" class="control-label col-md-4">Direccion:</label>
        <div class="col-md-5">
        <textarea id="Direccion" onfocus="return validaciones()" rows="8" cols="40" placeholder=""><?php echo $Oficial->dirOficial;?></textarea>
        </div>
  </div>



   <div class="form-group" id="Escol">
        <label for="Escolaridad" class="control-label col-md-4">Escolaridad</label>
        <div class="col-md-5">
        <select class="form-control" name="" id="Escolaridad" onfocus="return validaciones()" value="" >
         <option value="">Seleccione</option> <!-- INICIO DEL SELECT -->
         <?php
      $b=0; //Variable contadora
      $datos= array("Primaria Incompleta", "Primaria Completa" ,"Secundaria Incompleta", "Secundaria completa",
                    "Universidad Incompleta", "Universidad completa"); //Arreglo con las opciones
          while($b < count($datos)):
            if($datos[$b]== $Oficial->escoOficial): //Se compara si el dato de la base de datos es igual
              //Si se encuentra uno se imprime el valor como seleccionado con selected="selected"
            ?>
          <option value="<?php echo $Oficial->escoOficial;?>" selected="selected"><?php echo $Oficial->escoOficial;?></option>
          <?php  //Si no ecuentra una coincidencia imprime las demas opciones que tiene el arreglo
else:?>
<option value="<?php echo $datos[$b];?>"><?php echo $datos[$b];?></option>
   <?php
endif;
$b= $b+1;
endwhile;
   ?>
 </select> <!-- FIN DEL SELECT -->
        </div>
   </div>

      <div class="form-group" id="NumTele">
        <label for="NumeroTelefono" class="control-label col-md-4">Numero de telefono</label>
        <div class="col-md-5">
        <input class="form-control" id="NumeroTelefono" onfocus="return validaciones()" value="<?php echo $Oficial->numTelefono;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

        <div class="form-group" id="mail">
        <label for="Correo" class="control-label col-md-4">Correo Electronico</label>
        <div class="col-md-5">
        <input class="form-control" id="Correo" onfocus="return validaciones()" value="<?php echo $Oficial->mailOficial;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

        <div class="form-group" id="nacimiento">
        <label for="FechaNac" class="control-label col-md-4">Fecha de Nacimiento:</label>
        <div class="col-md-5">
        <input class="form-control" id="FechaNac" onfocus="return validaciones()" value="<?php echo $Oficial->fecNacimiento;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

  <hr>

 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_Oficiales_"></p>
      </div>
 </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <a id="btnEditarDatosPersonales" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="?view=VerDatosOficiales" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
