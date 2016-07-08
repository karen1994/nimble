
   /* var formulario= document.getElementByName('form1')[0],
    elementos = formulario.elements,
    boton= document.getElementById(),
    select= document.getElementById('select'),
    label= document.getElementById('label');*/
    
    function select(e) {
        
    
    var select= document.getElementById('label1').Value;
    var label= document.getElementById('label');
    label.innerHTML= select.nodeValue;
    
    alert(select+label);
    }