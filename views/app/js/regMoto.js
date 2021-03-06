//Función donde se guardarn los datos validados por las funciones anteriores
function guardarMotocicleta(){

  var connect, form, response, result ,cedPersona, nomPersona, ape1Persona, ape2Persona, numBoletaDetencion,
  fecBoletaDetencion, numLlave, tomoDetencion, folioDetenciones, codOficialDetiene, codOficialRecibe,
  identMoto, marcaMoto, colorMoto, observMoto, numArticulo, decripMot;
// Parametros capturados del formulario
cedPersona= __('cedPersona').value;
nomPersona=     __('nomPersona').value;
ape1Persona= __('ape1Persona').value;
ape2Persona= __('ape2Persona').value;
numBoletaDetencion= __('numBoletaDetencion').value;
fecBoletaDetencion= __('fecBoletaDetencion').value;
numLlave= __('numLlave').value;
tomoDetencion= __('tomoDetencion').value;
folioDetenciones= __('folioDetenciones').value;
codOficialDetiene= __('codOficialDetiene').value;
codOficialRecibe= __('codOficialRecibe').value;
identMoto= __('identMoto').value;
marcaMoto= __('marcaMoto').value;
colorMoto= __('colorMoto').value;
observMoto= __('observMoto').value ;
numArticulo= __('numArticulo').value;
decripMot= __('decripMot').value;
  //Se abre la conexion, si todo esta bien
form = 'cedPersona=' + cedPersona + '&nomPersona=' + nomPersona + '&ape1Persona=' + ape1Persona +
 '&ape2Persona=' + ape2Persona + '&numBoletaDetencion=' + numBoletaDetencion +
 '&fecBoletaDetencion=' + fecBoletaDetencion +  '&numLlave=' + numLlave+ '&tomoDetencion=' + tomoDetencion +
 '&folioDetenciones=' + folioDetenciones + '&codOficialDetiene=' + codOficialDetiene  +
 '&codOficialRecibe=' + codOficialRecibe  + '&identMoto=' + identMoto + '&marcaMoto=' + marcaMoto +
 '&colorMoto=' + colorMoto + '&observMoto=' + observMoto +
 '&numArticulo=' + numArticulo + '&decripMot=' + decripMot;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {
      /*Estados del objeto connect:
      1= Esta desactivado.
      2= Esta enviando los datos desde cero.
      3= PHP recibe los datos.
      4= PHP devuelve los datos a JavaScript
      STATUS: 404= Cuando no se encuentra ajax.php?mode=login
              200= Cuando si se encuentra el archivo*/

//Revisa el estado de la conexión con ajax
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Registro completado !</h4>';
        result += '</div>';
        result += '</div>';
        __('_AJAX_MOTO_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_MOTO_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Registrando datos...</strong></p>';
        result += '</div>';
      __('_AJAX_MOTO_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regMotocicleta',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
}

//Función que identifica los campos con colores
function datosCorrectos(){
  if(cedPersona.value != ""){
          $("#cedula").removeClass('has-error');
          $("#cedula").addClass('has-success');
     }
     if (nomPersona.value != ""){
         $("#nombre").removeClass('has-error');
          $("#nombre").addClass('has-success');
     }
    if (ape1Persona.value != ""){
         $("#apellido1").removeClass('has-error');
          $("#apellido1").addClass('has-success');
     }
     if (ape2Persona.value != ""){
          $("#apellido2").removeClass('has-error');
           $("#apellido2").addClass('has-success');
     }
     if (numBoletaDetencion.value != ""){
           $("#boleta").removeClass('has-error');
            $("#boleta").addClass('has-success');
     }
     if (fecBoletaDetencion.value != ""){
            $("#fechaBoleta").removeClass('has-error');
             $("#fechaBoleta").addClass('has-success');
     }
     if (numLlave.value != ""){
             $("#llave").removeClass('has-error');
              $("#llave").addClass('has-success');
     }
     if (tomoDetencion.value != ""){
             $("#tomo").removeClass('has-error');
              $("#tomo").addClass('has-success');
     }
     if (folioDetenciones.value != ""){
             $("#folio").removeClass('has-error');
              $("#folio").addClass('has-success');
     }
     if (codOficialDetiene.value != ""){
             $("#oDetiene").removeClass('has-error');
              $("#oDetiene").addClass('has-success');
     }
     if (codOficialRecibe.value != ""){
             $("#oRecibe").removeClass('has-error');
              $("#oRecibe").addClass('has-success');
     }
     if (identMoto.value != ""){
             $("#IdMoto").removeClass('has-error');
              $("#IdMoto").addClass('has-success');
     }
     if (marcaMoto.value != ""){
             $("#marca").removeClass('has-error');
              $("#marca").addClass('has-success');
     }
     if (colorMoto.value != ""){
             $("#color").removeClass('has-error');
              $("#color").addClass('has-success');
     }
     if (observMoto.value != ""){
             $("#observacion").removeClass('has-error');
              $("#observacion").addClass('has-success');
     }
     if (numArticulo.value != ""){
             $("#articulo").removeClass('has-error');
              $("#articulo").addClass('has-success');
     }
     if (decripMot.value != ""){
             $("#motivo").removeClass('has-error');
              $("#motivo").addClass('has-success');
     }
                            }

//Valida los campos de los formularios
//Formulario de conductor
function validarFRM1(){
  if(cedPersona.value == ""){
          alert("El campo identificación es requerido");
          cedPersona.focus();
          $("#cedula").addClass('has-error');
       }else if (nomPersona.value == ""){
           alert("El campo nombre es requerido");
          nomPersona.focus();
            $("#nombre").addClass('has-error');
     }else if (ape1Persona.value == ""){
          alert("El campo primer apellido es requerido");
         ape1Persona.focus();
           $("#apellido1").addClass('has-error');
    }else if (ape2Persona.value == ""){
         alert("El campo segundo apellido es requerido");
        ape2Persona.focus();
          $("#apellido2").addClass('has-error');
   }else{
       $("#secDetencion").show();
        $("#secPersona").hide();
     }
                             }
//Formulario de detención
function validarFRM2(){
  if(numBoletaDetencion.value == ""){
          alert("El campo número de boleta es requerido");
          numBoletaDetencion.focus();
          $("#boleta").addClass('has-error');
       }else if (fecBoletaDetencion.value == ""){
           alert("El campo fecha de boleta es requerido");
        fecBoletaDetencion.focus();
            $("#fechaBoleta").addClass('has-error');
     }else if (numLlave.value == ""){
         alert("El campo número de llave es requerido");
      numLlave.focus();
          $("#llave").addClass('has-error');
   }else if (tomoDetencion.value == ""){
       alert("El campo tomo es requerido");
    tomoDetencion.focus();
        $("#tomo").addClass('has-error');
  }else if (folioDetenciones.value == ""){
     alert("El campo folio es requerido");
  folioDetenciones.focus();
      $("#folio").addClass('has-error');
  }else if (codOficialDetiene.value == ""){
    alert("El campo código del oficial que detiene es requerido");
  codOficialDetiene.focus();
     $("#oDetiene").addClass('has-error');
  }else if (codOficialRecibe.value == ""){
    alert("El campo código del oficial que recibe es requerido");
  codOficialRecibe.focus();
     $("#oRecibe").addClass('has-error');
  }
    else{
      $("#secDetencion").hide();
        $("#secMoto").show();
        }
                      }
//Formulario de la motocicleta
function validarFRM3(){
  if(identMoto.value == ""){
          alert("El campo placa, vin, motor u otro es requerido");
          identMoto.focus();
          $("#IdMoto").addClass('has-error');
       }else if (marcaMoto.value == ""){
           alert("El campo marca es requerido");
        marcaMoto.focus();
            $("#marca").addClass('has-error');
     }else if (colorMoto.value == ""){
         alert("El campo color es requerido");
      colorMoto.focus();
          $("#color").addClass('has-error');
   }
  else{
    $("#secMotivo").show();
     $("#secMoto").hide();
      }
                      }
//Formulario del motivo
function validarFRM4(){
  if(numArticulo.value == ""){
          alert("El campo número de artículo es requerido");
          numArticulo.focus();
          $("#articulo").addClass('has-error');
       }else if (decripMot.value == ""){
           alert("El campo descripción del motivo es requerido");
        decripMot.focus();
            $("#motivo").addClass('has-error');
     }
    else{
  $("#btnGuadarDIV").show();
        }
                      }

//Botones de regresar
//Botón regresar del segundo formulario
function regresar2(){
 $("#secPersona").show();
 $("#secDetencion").hide();
}
//Botón regresar del tercer formulario
function regresar3(){
$("#secDetencion").show();
$("#secMoto").hide();
}
//Bóton regresar del cuarto formulario
function regresar4(){
$("#secMoto").show();
$("#secMotivo").hide();
}

window.onload= function(){
//Valida cada formulario de una manera ordenada
//EL boton guardar finalmente guarda todos los datos ya validados.
  var btnTerminar1= __('btnTerminar1');
  var btnTerminar2= __('btnTerminar2');
  var btnTerminar3= __('btnTerminar3');
  var btnTerminar4= __('btnTerminar4');
  var  btnRegresar2= __('regresar2');
  var  btnRegresar3= __('regresar3');
  var  btnRegresar4= __('regresar4');
  var btnGuardarMoto= __('btnGuardarMoto');

//Llamadas a las funciones
  btnTerminar1.addEventListener("click", validarFRM1);
  btnTerminar2.addEventListener("click", validarFRM2);
  btnTerminar3.addEventListener("click", validarFRM3);
  btnTerminar4.addEventListener("click", validarFRM4);
  btnRegresar2.addEventListener("click",regresar2);
  btnRegresar3.addEventListener("click",regresar3);
  btnRegresar4.addEventListener("click",regresar4);
  btnGuardarMoto.addEventListener("click", guardarMotocicleta);
  };
