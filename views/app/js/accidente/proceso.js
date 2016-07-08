/*
  $("#canton,#distrito").attr('disabled', true);
 
  function ejecutar(obj1, obj2, task) {
    $('<img/>', {
      'class': 'loading',
      src: 'loading.gif',
      'style': 'display:inline'
    }).insertAfter(obj1);
 
    $.ajax({
      type: "POST",
      url: "action.php",
      dataType: "html",
      data: "task=" + task + "&amp;id=" + $(obj1).val(),
      success: function(msg) {
        $(obj1).next('img').remove();
        $(obj2).html(msg).attr("disabled", false);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $(obg1).next('img').remove();
        alert("Error al ejecutar =&gt; " + textStatus + " - " + errorThrown);
      }
    });
  } */
 
  function  provincia (){
      alert("Hola");
   /* $("#canton,#distrito").attr('disabled', true);
    if ($(this).val().trim() != "") {
      ejecutar($(this), $("#canton"), "getcanton");
    }*/
  }
    
    
 /* function  canton() {
    $("#distrito").attr('disabled', true);
    if ($(this).val().trim() != "") {
      ejecutar($(this), $("#distrito"), "getdistrito");
    }
  }
 */




