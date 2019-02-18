function Login()
{
	console.log("k login");
	var formulario=document.getElementById("login_form");
	var formData=new FormData($("#login_form")[0]);
		console.log(FormData);
	var Ruta="../controlador/Login.php";
	var Limpiar=document.getElementById('login_form').reset();
		$.ajax({
			url: Ruta,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function(datos)
			        {
				   $('#alert').html(datos);
				   Limpiar;
			        },
			error: function (datos)
			        {
			           console.log("ERROR "+ datos.status + '' + datos.statusText);
			        }
		}).done(function(msg){
			~~msg==1?location.href = "../vistas/Paginas/Ruta53.php":0;
			~~msg==2?location.href = "../vistas/Paginas/Unidades.php":0;
		});
		return false
}