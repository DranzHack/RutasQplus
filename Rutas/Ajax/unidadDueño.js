$(document).ready(function(){

	$('body').on('click', '.button-show', function(x) {
    	getResume(x);
	});

	getResume = (x)=>(
				a = new FormData(),
				a.append('unidad',x.target.getAttribute('data-id')),
				a.append('t','1'),
				$.ajax({
					url: '../../controlador/TablaMonitoreo.php',
					type: "POST",
					data: a,
					contentType: false,
					processData: false,
					success: function(datos)
					        {
						   $('#resume').html(datos);
					        },
					error: function (datos)
					        {
					           console.log("ERROR "+ datos.status + '' + datos.statusText);
					        }
				})
				);

	((x)=>(
			$.ajax({
				url: '../../controlador/unidadesdueno.php',
				type: "POST",
				contentType: false,
				processData: false,
				success: function(datos)
				        {
					   $('#Mostrar').html(datos);
				        },
				error: function (datos)
				        {
				           console.log("ERROR "+ datos.status + '' + datos.statusText);
				        }
			})
			))();
});

