function guardarBicicleta(){
  var connect, form, response, result , cedPersona, nomPersona, ape1Persona, ape2Persona,
  numBoletaDetencion, fecBoletaDetencion, numLlave, tomoDetencion, folioDetenciones,
  codOficialDetiene, codOficialRecibe, tipoBici, marcaBici, colorBici, numMarcoBici,
  observBici, numArticulo, decripMot;

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
tipoBici= __('tipoBici').value;
marcaBici= __('marcaBici').value;
colorBici= __('colorBici').value;
numMarcoBici= __('numMarcoBici').value;
observBici= __('observBici').value;
numArticulo= __('numArticulo').value ;
decripMot= __('decripMot').value;



form = 'cedPersona=' + cedPersona +
'&nomPersona=' + nomPersona +
'&ape1Persona=' + ape1Persona +
'&ape2Persona=' + ape2Persona +
'&numBoletaDetencion=' + numBoletaDetencion +
'&fecBoletaDetencion=' + fecBoletaDetencion +
'&numLlave=' + numLlave +
'&tomoDetencion=' + tomoDetencion +
'&folioDetenciones=' + folioDetenciones +
'&codOficialDetiene=' + codOficialDetiene  +
'&codOficialRecibe=' + codOficialRecibe  +
'&tipoBici=' + tipoBici +
'&marcaBici=' + marcaBici +
'&colorBici=' + colorBici +
'&numMarcoBici=' + numMarcoBici +
'&observBici=' + observBici +
'&numArticulo=' + numArticulo +
'&decripMot=' + decripMot;



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
        result += '<h4>Completado!</h4>';
        result += '<p><strong>El registro se completo excitosamente...</strong></p>';
        result += '</div>';
        __('_AJAX_BICI_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_BICI_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Procesando el registro...</strong></p>';
      result += '</div>';
      __('_AJAX_BICI_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regBicicleta',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function validarFRM1(){
  var cedula;
      cedula= __('cedPersona');
     if(cedula.value != ""){
           $("#secDetencion").show();
        $("#secPersona").hide();
     }else{
        alert("El campo cedula es requerido");
        cedula.focus();
     }

     }

function validarFRM2(){
    $("#secDetencion").hide();
    $("#secBici").show();

}
function validarFRM3(){
    $("#secMotivo").show();
    $("#secBici").hide();
}

function validarFRM4(){
    $("#btnGuardarDIV").show();
}

function regresar2(){
 $("#secPersona").show();
 $("#secDetencion").hide();
}

function regresar3(){
$("#secDetencion").show();
$("#secBici").hide();
}

function regresar4(){
$("#secBici").show();
$("#secMotivo").hide();
}

window.onload= function(){
//Valida cada formulario deuna manera ordenada
//EL boton guardar finalmente guarda todos los datos ya validados.
  var btnTerminar1= __('btnTerminar1');
  var btnTerminar2= __('btnTerminar2');
  var btnTerminar3= __('btnTerminar3');
  var btnTerminar4= __('btnTerminar4');
  var  btnRegresar2= __('regresar2');
  var  btnRegresar3= __('regresar3');
  var  btnRegresar4= __('regresar4');
  var btnGuardarBici= __('btnGuardarBici');

//Llamadas a las funciones
  btnTerminar1.addEventListener("click", validarFRM1);
  btnTerminar2.addEventListener("click", validarFRM2);
  btnTerminar3.addEventListener("click", validarFRM3);
  btnTerminar4.addEventListener("click", validarFRM4);
  btnRegresar2.addEventListener("click",regresar2);
  btnRegresar3.addEventListener("click",regresar3);
  btnRegresar4.addEventListener("click",regresar4);
  btnGuardarBici.addEventListener("click", guardarBicicleta);
  };
