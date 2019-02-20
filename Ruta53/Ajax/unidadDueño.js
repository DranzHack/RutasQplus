$(document).ready(function(){
	$(".show").on("click", (x)=>(getResume(x)));

	getResume = (x)=>(
				a = new FormData(),
				a.append('unidad',x.target.getAttribute('data-id')),
				console.log(x.target.getAttribute('data-id')),
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
});