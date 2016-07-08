function guardarAutomovil(){

  var connect, form, response, result ,cedPersona, nomPersona, ape1Persona, ape2Persona,
  numBoletaDetencion, fecBoletaDetencion, numLlave, tomoDetencion, folioDetenciones,
  codOficialDetiene, codOficialRecibe, identAuto, marcaAuto, colorAuto, observAuto, numArticulo,
  decripMot;

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
identAuto= __('identAuto').value;
marcaAuto= __('marcaAuto').value;
colorAuto= __('colorAuto').value;
observAuto= __('observAuto').value ;
numArticulo= __('numArticulo').value;
decripMot= __('decripMot').value;


form = 'cedPersona=' + cedPersona + '&nomPersona=' + nomPersona + '&ape1Persona=' + ape1Persona +
 '&ape2Persona=' + ape2Persona + '&numBoletaDetencion=' + numBoletaDetencion +
 '&fecBoletaDetencion=' + fecBoletaDetencion +  '&numLlave=' + numLlave+ '&tomoDetencion=' + tomoDetencion +
 '&folioDetenciones=' + folioDetenciones + '&codOficialDetiene=' + codOficialDetiene  +
 '&codOficialRecibe=' + codOficialRecibe  + '&identAuto=' + identAuto + '&marcaAuto=' + marcaAuto +
 '&colorAuto=' + colorAuto + '&observAuto=' + observAuto + '&numArticulo=' + numArticulo + '&decripMot=' + decripMot;


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
        result += '<h4>Registro completado !</h4>';
        result += '</div>';
        result += '</div>';
        __('_AJAX_AUTO_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_AUTO_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_AUTO_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regAutomovil',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

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
     if (identAuto.value != ""){
             $("#IdAuto").removeClass('has-error');
              $("#IdAuto").addClass('has-success');
     }
     if (marcaAuto.value != ""){
             $("#marca").removeClass('has-error');
              $("#marca").addClass('has-success');
     }
     if (colorAuto.value != ""){
             $("#color").removeClass('has-error');
              $("#color").addClass('has-success');
     }
     if (observAuto.value != ""){
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

  //valida campos

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
        $("#secAutomovil").show();
        }
}
function validarFRM3(){
    if(identAuto.value == ""){
            alert("El campo placa, vin, motor u otro es requerido");
            identAuto.focus();
            $("#IdAuto").addClass('has-error');
         }else if (marcaAuto.value == ""){
             alert("El campo marca es requerido");
          marcaAuto.focus();
              $("#marca").addClass('has-error');
       }else if (colorAuto.value == ""){
           alert("El campo color es requerido");
        colorAuto.focus();
            $("#color").addClass('has-error');
     }
    else{
      $("#secMotivo").show();
       $("#secAutomovil").hide();
        }
}

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

function regresar2(){
 $("#secPersona").show();
 $("#secDetencion").hide();
}

function regresar3(){
$("#secDetencion").show();
$("#secAutomovil").hide();
}

function regresar4(){
$("#secAutomovil").show();
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
  var btnGuardarAuto= __('btnGuardarAuto');

//Llamadas a las funciones
  btnTerminar1.addEventListener("click", validarFRM1);
  btnTerminar2.addEventListener("click", validarFRM2);
  btnTerminar3.addEventListener("click", validarFRM3);
  btnTerminar4.addEventListener("click", validarFRM4);
  btnRegresar2.addEventListener("click",regresar2);
  btnRegresar3.addEventListener("click",regresar3);
  btnRegresar4.addEventListener("click",regresar4);
  btnGuardarAuto.addEventListener("click", guardarAutomovil);
  };
