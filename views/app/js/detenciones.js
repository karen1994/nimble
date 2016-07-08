
function verAuto(){
      $("#verAutomovil").show();
       $("#verMotocicletas").hide();
         $("#verBicicletas").hide();
}
function verMoto(){
      $("#verMotocicletas").show();
       $("#verAutomovil").hide();
        $("#verBicicletas").hide();
}

function verBici(){
     $("#verBicicletas").show();
      $("#verAutomovil").hide();
       $("#verMotocicletas").hide();
}


window.onload= function(){
//  var btnTerminar= __('btnTerminar');
//BOTONES DE CADA FORMULARIO EN ORDEN DE 1 HASTA N
//CADA BOTON LLAMA UNA FUNCION EN GENERAL LLAMDA validarFRM1 y asi consecutivamente
//para validar cada formulario deuna manera ordenada
//EL boton guardar finalmente guarda todos los datos ya validados.
  var btnAuto= __('btnAuto');
   var btnMoto= __('btnMoto');
     var btnBici= __('btnBici');
   //  var btnBici= __('btnBici');
      // var select= __('estEspecial');
  
  //btnTerminar.addEventListener("click",regAccidente);
  btnAuto.addEventListener("click", verAuto); //Llamada a la funcion 
  btnMoto.addEventListener("click", verMoto); //Llamada a la funcion 
   btnBici.addEventListener("click", verBici);
   //btnTerminar3.addEventListener("click", validarFRM3); //Llamada a la funcion 
   // btnGuardar.addEventListener("click", Guardar); //Llamada a la funcion Guardar
  //select.addEventListener("onchange", combo);
  };


