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