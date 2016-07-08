function EditarDatosPersonales(){
  var connect, form, response, result, numConsecutivo, Nombre, PrimerApell, SegundoApell, Cedula, Edad, Direccion,
  Escolaridad, NumeroTelefono, Correo, FechaNac;
  //Parametros capturados del formulario de HTML

numConsecutivo=__('numConsecutivo');
Nombre= __('Nombre');
PrimerApell= __('PrimerApell');
SegundoApell= __('SegundoApell');
Cedula= __('Cedula');
Edad= __('Edad');
Direccion= __('Direccion');
Escolaridad= __('Escolaridad');
NumeroTelefono= __('NumeroTelefono');
Correo= __('Correo');
FechaNac= __('FechaNac');

if(Nombre.value == ""){
  alert("El campo Nombre es requerido");
  Nombre.focus();
  $("#Nom").addClass('has-error');
}else if(PrimerApell.value == ""){
  alert("El campo primer apellido es requerido");
  PrimerApell.focus();
  $("#priApell").addClass('has-error');
}else if(SegundoApell.value == ""){
  alert("El campo segundo apellido es requerido");
  SegundoApell.focus();
  $("#SeguApell").addClass('has-error');
}else if(Cedula.value == ""){
  alert("El Cedula que recibe es requerido");
  Cedula.focus();
  $("#Ced").addClass('has-error');
}else if(Edad.value == ""){
  alert("El campo Edad es requerido");
  Edad.focus();
  $("#edad").addClass('has-error');
}else if(Direccion.value == ""){
  alert("El campo Direccion es requerido");
  Direccion.focus();
  $("#Direcc").addClass('has-error');
}else if(Escolaridad.value == ""){
  alert("El campo Escolaridad es requerido");
  Escolaridad.focus();
  $("#Escol").addClass('has-error');
}else if(NumeroTelefono.value == ""){
  alert("El campo numero de telefono es requerido");
  NumeroTelefono.focus();
  $("#NumTele").addClass('has-error');
}else if(Correo.value == ""){
  alert("El campo Correo es requerido");
  Correo.focus();
  $("#mail").addClass('has-error');
}else if(FechaNac.value == ""){
  alert("El campo fecha de nacimiento es requerido");
  FechaNac.focus();
  $("#nacimiento").addClass('has-error');
}else{

  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien

     form = 'numConsecutivo=' + numConsecutivo.value + '&Nombre=' + Nombre.value + '&PrimerApell=' + PrimerApell.value  +
    '&SegundoApell=' + SegundoApell.value +'&Cedula='+ Cedula.value + '&Edad='+ Edad.value + '&Direccion=' + Direccion.value + '&Escolaridad=' +
    Escolaridad.value + '&NumeroTelefono=' + NumeroTelefono.value + '&Correo=' + Correo.value + '&FechaNac=' + FechaNac.value;

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
  connect.open('POST','ajax.php?mode=EditarDatosPersOficiales',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro

}
}

function validaciones(){
  if(Nombre.value != ""){
       $("#Nom").removeClass('has-error');
       $("#Nom").addClass('has-success');
  } if (PrimerApell.value != ""){
       $("#priApell").removeClass('has-error');
        $("#priApell").addClass('has-success');
   }if (SegundoApell.value != ""){
        $("#SeguApell").removeClass('has-error');
         $("#SeguApell").addClass('has-success');
    }if (Cedula.value != ""){
         $("#Ced").removeClass('has-error');
          $("#Ced").addClass('has-success');
     }if (Edad.value != ""){
          $("#edad").removeClass('has-error');
           $("#edad").addClass('has-success');
      }if (Direccion.value != ""){
           $("#Direcc").removeClass('has-error');
            $("#Direcc").addClass('has-success');
       }if (Escolaridad.value != ""){
            $("#Escol").removeClass('has-error');
             $("#Escol").addClass('has-success');
        }if (NumeroTelefono.value != ""){
             $("#NumTele").removeClass('has-error');
              $("#NumTele").addClass('has-success');
         }if (Correo.value != ""){
              $("#mail").removeClass('has-error');
               $("#mail").addClass('has-success');
          }if (FechaNac.value != ""){
               $("#nacimiento").removeClass('has-error');
                $("#nacimiento").addClass('has-success');
           }
}

window.onload = function(){
    var btnEditarDatosPersonales=__('btnEditarDatosPersonales');
   btnEditarDatosPersonales.addEventListener("click",EditarDatosPersonales);

}
