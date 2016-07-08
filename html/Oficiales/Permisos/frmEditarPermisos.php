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
        <a href="?view=VerPermisosOficiales" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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
     <h4>Permisos</h4>
           </div>
     </div>
     <br>

     <div class="form-group">
          <label for="numConsecutivo" class="control-label col-md-4">Consecutivo</label>
            <div class="col-md-5">
          <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Oficial->idOficial;?>">
            </div>
     </div>

         <div class="form-group" id="Lic">
        <label for="TipoLicenciaConducir" class="control-label col-md-4">Tipo Licencia de conducir:</label>
        <div class="col-md-5">
        <select class="form-control" name="" id="TipoLicenciaConducir" onfocus="return validaciones()" value="" >
          <option value="">Seleccione</option>
          <?php
       $b=0; //Variable contadora
       $datos= array("A1", "A2" ,"A3", "B1","B2", "B3","B3","B4","C1","C2","D1","D2","D3","E1"); //Arreglo con las opciones
           while($b < count($datos)):
             if($datos[$b]== $Oficial->tipoLicenciaConducir): //Se compara si el dato de la base de datos es igual
               //Si se encuentra uno se imprime el valor como seleccionado con selected="selected"
             ?>
           <option value="<?php echo $Oficial->tipoLicenciaConducir;?>" selected="selected"><?php echo $Oficial->tipoLicenciaConducir;?></option>
           <?php  //Si no ecuentra una coincidencia imprime las demas opciones que tiene el arreglo
 else:?>
 <option value="<?php echo $datos[$b];?>"><?php echo $datos[$b];?></option>
    <?php
 endif;
 $b= $b+1;
 endwhile;
    ?>
        </select>
        </div>
   </div>

 <div class="form-group" id="VencLic">
        <label for="VenciLicenciaConducir"  class="control-label col-md-4">Vencimiento Licencia Conducir</label>
        <div class="col-md-5">
        <input class="form-control" id="VenciLicenciaConducir" onfocus="return validaciones()" value="<?php echo $Oficial->fecVencLicCond;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group" id="armas">
        <label for="NumPermisoPortacionArmas"  class="control-label col-md-4">Permiso portación de armas</label>
        <div class="col-md-5">
        <input class="form-control" id="NumPermisoPortacionArmas" onfocus="return validaciones()" value="<?php echo $Oficial->numPermPortaArmas;?>" type="text" maxlength="15" placeholder="Digite el número del permiso">
        </div>
  </div>

   <div class="form-group" id="vencArmas">
        <label for="VenciPermisoPortacionArmas"  class="control-label col-md-4">Vencimiento permiso portación de armas</label>
        <div class="col-md-5">
        <input class="form-control" id="VenciPermisoPortacionArmas" onfocus="return validaciones()" value="<?php echo $Oficial->fecVencPermPortaArma;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group" id="Cosevi">
        <label for="NumPermisoConducirCOSEVI"  class="control-label col-md-4">Numero de Permiso de Conducir de COSEVI</label>
        <div class="col-md-5">
        <input class="form-control" id="NumPermisoConducirCOSEVI" onfocus="return validaciones()" value="<?php echo $Oficial->numPerCondCOSEVI;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group" id="VencCosevi">
        <label for="VenciPermisoConducirCOSEVI"  class="control-label col-md-4">Vencimiento de Permiso de Conducir de COSEVI</label>
        <div class="col-md-5">
        <input class="form-control" id="VenciPermisoConducirCOSEVI" onfocus="return validaciones()" value="<?php echo $Oficial->fecVencPermCondCOSEVI;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group" id="Mopt">
        <label for="NumPermisoConducirMOPT"  class="control-label col-md-4">Permiso de Conducir del MOPT</label>
        <div class="col-md-5">
        <input class="form-control" id="NumPermisoConducirMOPT" onfocus="return validaciones()" value="<?php echo $Oficial->numPermCondMOPT;?>" type="text" maxlength="15" placeholder="">
        </div>
  </div>

     <div class="form-group" id="VenciMopt">
        <label for="VenciPermisoConducirMOPT"  class="control-label col-md-4">Vencimiento de Permiso de Conducir del MOPT</label>
        <div class="col-md-5">
        <input class="form-control" id="VenciPermisoConducirMOPT" onfocus="return validaciones()" value="<?php echo $Oficial->fecVenPermCondMOPT;?>" type="date" maxlength="15" placeholder="">
        </div>
  </div>

  <div class="form-group">
       <label for="Observaciones" class="control-label col-md-4">Observaciones</label>
         <div class="col-md-5">
       <textarea id="Observaciones" rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Oficial->observOficial;?></textarea>
         </div>
 </div>


 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_Oficiales_"></p>
      </div>
 </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
  <a id="btnEditarPermisos" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Cambios</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <a href="?view=VerPermisosOficiales" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>

      </form>

    </div>
    <!--Fin el div container-->


<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
