 function editarAmbiente(){
  var form, numBoleta, Iluminacion, estAmbiente, aliVertical, aliHorizontal, senVial, tipInterseccion, carriles,estEspecial, claCalzada, condCalzada, estCalzada ,exiDe, sentVia, tipAccidente, vehCirculacion, obsVia; 
    
    var id1, id2, id3, id4, id5, id6, id7, id8, id9, id10, id11, id12, id13, id14, id15;
    
     id1= __('id1').value;
     id2= __('id2').value;
     id3= __('id3').value;
     id4= __('id4').value;
     id5= __('id5').value;
     id6= __('id6').value;
     id7= __('id7').value;
     id8= __('id8').value;
     id9= __('id9').value;
     id10= __('id10').value;
     id11= __('id11').value;
     id12= __('id12').value;
     id13= __('id13').value;
     id14= __('id14').value;
     id15= __('id15').value;
     id16= __('id16').value;
  
 
  estEspecial= __('estEspecial').value;
  claCalzada= __('claCalzada').value;
  numBoleta= __('numBoleta').value;
  condCalzada= __('condCalzada').value;
   estCalzada= __('estCalzada').value;
   Iluminacion= __('Iluminacion').value;
   estAmbiente= __('estAmbiente').value;
   aliVertical= __('aliVertical').value;
   aliHorizontal= __('aliHorizontal').value;
   senVial= __('senVial').value;
   tipInterseccion= __('tipInterseccion').value;
   carriles= __('carriles').value;
   exiDe= __('exiDe').value;
   sentVia= __('sentVia').value;
   tipAccidente= __('tipAccidente').value;
   vehCirculacion= __('vehCirculacion').value;
   obsVia= __('obsVia').value;
   
  form= 'estEspecial=' + estEspecial +
      '&claCalzada=' + claCalzada +
      '&numBoleta='+ numBoleta+
     '&condCalzada=' + condCalzada +
       '&estCalzada=' + estCalzada +
       '&Iluminacion=' + Iluminacion +
       '&estAmbiente=' + estAmbiente +
       '&aliVertical=' + aliVertical +
       '&aliHorizontal=' + aliHorizontal +
       '&senVial=' + senVial +
       '&tipInterseccion=' + tipInterseccion +
       '&carriles=' + carriles +
       '&exiDe=' + exiDe +
       '&sentVia=' + sentVia +
       '&tipAccidente=' + tipAccidente +
       '&vehCirculacion=' + vehCirculacion  +
       '&obsVia=' + obsVia + 
      '&id1=' + id1 + 
       '&id2=' + id2 + 
       '&id3=' + id3 + 
       '&id4=' + id4 + 
       '&id5=' + id5 + 
       '&id6=' + id6 + 
       '&id7=' + id7 + 
       '&id8=' + id8 + 
       '&id9=' + id9 + 
       '&id10=' + id10 + 
       '&id11=' + id11 + 
       '&id12=' + id12 + 
       '&id13=' + id13 + 
       '&id14=' + id14 + 
       '&id15=' + id15 + 
       '&id16=' + id16 ;
      
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

       result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Registro realizado !</h4>';
      result += '<p><strong>Se guardaron los datos.</strong></p>';
      result += '</div>';
        
        __('_AJAX_ACCIDENTE_').innerHTML = result;
        
        window.location.assign("?view=verAccidente");
        
      } else {
        __('_AJAX_ACCIDENTE_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Se esta ejecuntando la petición.</strong></p>';
      result += '</div>';
      __('_AJAX_ACCIDENTE_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarAmbiente',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form);//Envia los datos a ajax

} 

function combo1(){

    var label1=    __('amb1');
   // var label2=   __('amb2');
    //var select1= __('estEspecial').value;
    //var select2= __('claCalzada').value;
     // alert(select);
    label1.innerHTML= __('estEspecial').value;;
   // label2.innerHTML= select2;
  
      // alert(select.textContent);
}
function validarFRM1 () {
    
    if( estEspecial.disabled){
        estEspecial.disabled=false;
    } 
    if(  claCalzada.disabled){
        claCalzada.disabled=false;
    } 
    if(  condCalzada.disabled){
        condCalzada.disabled=false;
    }
    if(  estCalzada.disabled){
        estCalzada.disabled=false;
    }
    if(  Iluminacion.disabled){
       Iluminacion.disabled=false;
    }
     if( estAmbiente.disabled){
       estAmbiente.disabled=false;
    }
    if( aliHorizontal.disabled){
       aliHorizontal.disabled=false;
    }
    if( aliVertical.disabled){
       aliVertical.disabled=false;
    }
    if(  senVial.disabled){
        senVial.disabled=false;
    }
    if( tipInterseccion.disabled){
      tipInterseccion.disabled=false;
    }
    if( carriles.disabled){
        carriles.disabled=false;
    }
    if( exiDe.disabled){
       exiDe.disabled=false;
    }
    if(  sentVia.disabled){
        sentVia.disabled=false;
    }
    if(  tipAccidente.disabled){
       tipAccidente.disabled=false;
    }
    if( vehCirculacion.disabled){
       vehCirculacion.disabled=false;
    }
    if(  obsVia.disabled){
        obsVia.disabled=false;
    }
    
 $("#btnGuadarDIV").show();
    $("#btnCancelarDIV").show();
}

function cancelar() {
 window.location.assign("?view=verAccidente");
}
function combo2(){
    
}
function combo2(){
    
}
function combo2(){
    
}


window.onload= function(){
  var btnEditar= __('btnEditar');
   var btnGuardar= __('btnGuardarAmbiente');
    //var btnCancelar __('btnCancelarAmbiente');
  //var select= __('estEspecial');
  
  //btnTerminar.addEventListener("click",regAccidente);
   btnEditar.addEventListener("click", validarFRM1);
    btnGuardar.addEventListener("click", editarAmbiente);
    // btnCancelar.addEventListener("click", cancelar);
  //select.addEventListener("onchange", combo);
  };




