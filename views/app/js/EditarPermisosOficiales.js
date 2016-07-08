function EditarPermisos(){
  var connect, form, response, result, numConsecutivo, TipoLicenciaConducir, VenciLicenciaConducir, NumPermisoPortacionArmas,
  VenciPermisoPortacionArmas, NumPermisoConducirCOSEVI, VenciPermisoConducirCOSEVI, NumPermisoConducirMOPT, VenciPermisoConducirMOPT,
  Observaciones;
  //Parametros capturados del formulario de HTML

numConsecutivo=__('numConsecutivo');
TipoLicenciaConducir= __('TipoLicenciaConducir');
VenciLicenciaConducir= __('VenciLicenciaConducir');
NumPermisoPortacionArmas= __('NumPermisoPortacionArmas');
VenciPermisoPortacionArmas= __('VenciPermisoPortacionArmas');
NumPermisoConducirCOSEVI= __('NumPermisoConducirCOSEVI');
VenciPermisoConducirCOSEVI= __('VenciPermisoConducirCOSEVI');
NumPermisoConducirMOPT= __('NumPermisoConducirMOPT');
VenciPermisoConducirMOPT= __('VenciPermisoConducirMOPT');
Observaciones= __('Observaciones');

if(TipoLicenciaConducir.value == ""){
  alert("El campo tipo de licencia es requerido");
  TipoLicenciaConducir.focus();
  $("#Lic").addClass('has-error');
}else if(VenciLicenciaConducir.value == ""){
  alert("El campo vencimiento de licencia es requerido");
  VenciLicenciaConducir.focus();
  $("#VencLic").addClass('has-error');
}else if(NumPermisoPortacionArmas.value == ""){
  alert("El campo numero de portacion de armas es requerido");
  NumPermisoPortacionArmas.focus();
  $("#armas").addClass('has-error');
}else if(VenciPermisoPortacionArmas.value == ""){
  alert("El campo vencimiento de portacion de armas es requerido");
  VenciPermisoPortacionArmas.focus();
  $("#vencArmas").addClass('has-error');
}else if(NumPermisoConducirCOSEVI.value == ""){
  alert("El campo numero de permiso COSEVI es requerido");
  NumPermisoConducirCOSEVI.focus();
  $("#Cosevi").addClass('has-error');
}else if(VenciPermisoConducirCOSEVI.value == ""){
  alert("El campo vencimiento de permiso COSEVI es requerido");
  VenciPermisoConducirCOSEVI.focus();
  $("#VencCosevi").addClass('has-error');
}else if(NumPermisoConducirMOPT.value == ""){
  alert("El campo numero de permiso del MOPT es requerido");
  NumPermisoConducirMOPT.focus();
  $("#Mopt").addClass('has-error');
}else if(VenciPermisoConducirMOPT.value == ""){
  alert("El campo vencimiento de permiso del MOPT es requerido");
  VenciPermisoConducirMOPT.focus();
   $("#VenciMopt").addClass('has-error');
}else{

  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien
     form = 'numConsecutivo=' + numConsecutivo.value + '&TipoLicenciaConducir='+ TipoLicenciaConducir.value +
     '&VenciLicenciaConducir='+ VenciLicenciaConducir.value + '&NumPermisoPortacionArmas=' + NumPermisoPortacionArmas.value +
    '&VenciPermisoPortacionArmas=' + VenciPermisoPortacionArmas.value + '&NumPermisoConducirCOSEVI=' + NumPermisoConducirCOSEVI.value +
     '&VenciPermisoConducirCOSEVI='+ VenciPermisoConducirCOSEVI.value +'&NumPermisoConducirMOPT=' + NumPermisoConducirMOPT.value +
     '&VenciPermisoConducirMOPT=' + VenciPermisoConducirMOPT.value + '&Observaciones=' + Observaciones.value;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {
      /*Estados del objeto connect:
      1= Esta desactivado.
      2= Esta enviando los datos desde cero.
      3= PHP recibe los datos.
      4= PHP devuelve los datos a JavaScript
      STATUS: 404= Cuando no se encuentra ajax.php?mode=login
              200= Cuando si se encuentra el archivo*/
    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Actualizacion Completada !</h4>';
         result += '</div>';
        __('_AJAX_Oficiales_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Oficiales_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Actualizando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Oficiales_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=EditarPermisos',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro

}
}

function validaciones(){
  if(TipoLicenciaConducir.value != ""){
       $("#Lic").removeClass('has-error');
       $("#Lic").addClass('has-success');
  } if (VenciLicenciaConducir.value != ""){
       $("#VencLic").removeClass('has-error');
        $("#VencLic").addClass('has-success');
   }if (NumPermisoPortacionArmas.value != ""){
        $("#armas").removeClass('has-error');
         $("#armas").addClass('has-success');
    }if (VenciPermisoPortacionArmas.value != ""){
         $("#vencArmas").removeClass('has-error');
          $("#vencArmas").addClass('has-success');
     }if (NumPermisoConducirCOSEVI.value != ""){
          $("#Cosevi").removeClass('has-error');
           $("#Cosevi").addClass('has-success');
      }if (VenciPermisoConducirCOSEVI.value != ""){
           $("#VencCosevi").removeClass('has-error');
            $("#VencCosevi").addClass('has-success');
       }if (NumPermisoConducirMOPT.value != ""){
            $("#Mopt").removeClass('has-error');
             $("#Mopt").addClass('has-success');
        }if (VenciPermisoConducirMOPT.value != ""){
             $("#VenciMopt").removeClass('has-error');
              $("#VenciMopt").addClass('has-success');
         }
}

window.onload = function(){
    var btnEditarPermisos=__('btnEditarPermisos');
   btnEditarPermisos.addEventListener("click",EditarPermisos);

}
