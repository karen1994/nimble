
    $(document).ready(function(){
        var table= $('#example').dataTable(
              
                {
                    "language":{
                         "decimal":        "",
    "emptyTable":     "No data available in table",
    "info":           "Mostrando _START_ para _END_ de _TOTAL_ entradas",
    "infoEmpty":      "Mostrando 0 para 0 de 0 entradas",
    "infoFiltered":   "(filtrado desde _MAX_ estradas totales)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    
    "zeroRecords":    "No se encontraron resultados",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Atras"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
                    }
                    
//****************************************************************************
                    

                }
                
          );
  
  var tableTools= new $.fn.dataTable.TableTools(table, {
      'sSwfPath': '//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf',
      'aButtons': [{
           'sExtends': 'copy',
           sButtonText: 'Copiar'
                     },
                  {
                      'sExtends': 'xls',
                      sButtonText: 'Guardar en Excel'
                  },
                  {
                      'sExtends': 'pdf',
                       sButtonText: 'Guardar en PDF',
                      'bFooter':false
                  }]
  });
  $(tableTools.fnContainer()).insertBefore('#example_wrapper');
  
    } ); 



