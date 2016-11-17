$(document).ready(function() {
    $('#example').dataTable({
        "language": { "url": "/PDE/spanish/Spanish.json" },
        paging: true
    });

	$('#importar').on('click',
    function () {
        $(this).addClass("active");
    });


	//"Username o Password estan incorrectos"

});

$(function() {
	$('#importar').click(function() {
    	path='./php/lectorExcelOrdenes.php';
	    $.ajax({
	        type: 'GET',
	        dataType: 'php',
	        url: path,
	        statusCode:{
        	    200: function() {
  					alert("Datos importados con Exito!!!"),
					$('#importar').removeClass("active"),
					document.location.reload()		
				}
	        } 
	    });
	});
});