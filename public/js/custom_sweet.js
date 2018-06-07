// Elimina cotización
function destroyCotizacion( nombre,url_ref ) 
{
  	swal({
    	  title: nombre,
    	  text: '¿Desea eliminar esta cotización?',
    	  type: 'warning',
    	  showCancelButton: true,
    	  confirmButtonColor: '#DD6B5',
        confirmButtonText: 'Eliminar'
  	},
  	function()
    {
  		  window.location.href = url_ref;
  	});
};


// Elimina los datos de facturación
function destroyDataFact( nombre,url_ref ) 
{
    swal({
        title: nombre,
        text: '¿Seguro que desea eliminar los datos de facturación?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B5',
        confirmButtonText: 'Eliminar'
    },
    function()
    {
        window.location.href = url_ref;
    });
};