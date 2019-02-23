<?php
/*
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Administrador')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }
    else{
        session_destroy();
        header('location: ../../'); 
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Papeletas</title>
    <?php require_once '../Recursos/head.php' ?>
    <link rel="stylesheet" href="../css/Estilos.css">
		<link rel="shortcut icon" href="../../img/Unidad.png" />

    <!-- Libreria Alertify -->
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

</head>
<body>
    <div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr>
        <center><h1 class="h3 mb-3 font-weight-normal">RUTA 53 REGISTRO DE PAPELETAS</h1></center>
  <!--      <div class="container">
        <form id="InsertaUnidades" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="Inicio">Seleccione Unidad:</label>
		      <select name="Inicio" id="Inicio" class="form-control">
		      	<?php #require_once '../../controlador/ComboUnidadesInicio.php' ?>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Seleccione Base:</label>
		      <select name="Base" id="Base" class="form-control">
                <?php #require_once '../../controlador/ComboChecks.php' ?>      
              </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="equipo">Fecha:</label>
		      <input type="date" name="Placas" class="form-control" id="Placas" placeholder="Placas" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="form-group col-md-12">
		      <label for="Hora">Hora:</label>
		      <input id="appt-time" class="form-control" type="time" name="appt-time" value="05:30">
		    </div>
		  </div>
			
		  <br>
		   <div class="form-group col-md-12">
		  	<button type="submit" name="InsertaUnidades" class="btn btn-primary">Registrar</button>
			</div>
		</form>
        </div>
-->
				 <div class="container-fluid">
            <div class="row">
                <div class="col m12">
								<table id="Equip" class="table table-hover text-center">
                              <thead>
                              <tr>
                                <th class="text-center">Numero de Ruta</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Acciones</th>
                              </tr>
                              </thead>
                              <tbody id="Mostrar">

                              </tbody>
                            </table>
                </div>
            </div>
        </div>
        <hr>
        <div id="hola">
        </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <?php require_once '../../controlador/ModalDelete.php'?>

    <?php require_once '../../controlador/ModalPapeletas.php' ?>


<!--Warning: sqlsrv_rows_affected() expects parameter 1 to be resource, boolean given in /var/www/html/VicomNet/App_Ruta53/Ruta53/controlador/CheckingBaseFin.php on line 13
Error information: SQLSTATE: IMSSPCode: -14Message: An invalid parameter was passed to sqlsrv_rows_affected.-->



    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){



    function obtener_datos()
    {
        $.ajax({
            url: "../../controlador/TablaPapeletas.php",
            method: "POST",
            success: function(data)
            {
                $("#Mostrar").html(data);
            }
        });
    }
    obtener_datos();

    $(document).on("click","#Eliminar",function (){

        if(confirm("¿Esta seguro que desea elminar este chofer?"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminarChoferes.php",
                method: "POST",
                data: {id: id,},
                success: function(data){
                    //obtener_datos();
                    obtener_datos();
                    var nota = alertify.notify(data,'success',5,function(){console.log('dissmissed');});
                }
            });
        }
    });
//Esta webada manda el id haciendo la consulta para mostrar los datos del id seleccionado alv :v
    $(document).on('click','.edit',function(){
        var id=$(this).attr("id");
        var Unidad=$(this).attr("title");
        //alert(Unidad);

        $('#mCode').val(id);
        $('#mUnidad').val(Unidad);
    });


$("#InsertarPapeleta").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertarPapeleta")[0]);
    var Ruta="../../controlador/InsertPapeletas.php"
    var Reset=document.getElementById('InsertarPapeleta').reset();
    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            var not = alertify.notify(Datos,'success',5,function(){console.log('Spidermar');});
            obtener_datos();
            Reset;
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+' '+Datos.statusText);
        }
    })
}


});        
    </script>
</body>
</html>
