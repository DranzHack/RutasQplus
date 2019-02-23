$(document).ready(function(){



    function obtener_datos()
    {
        $.ajax({
            url: "../../controlador/TablaInventarioDuenos.php",
            method: "POST",
            success: function(data)
            {
                $("#Mostrar").html(data);
            }
        });
    }

    function obtener_datosDuenoUnidad()
    {
        $.ajax({
            url: "../../controlador/TablaDuenoUnidad.php",
            method: "POST",
            success: function(data)
            {
                $("#MostrarDU").html(data);
            }
        });
    }

    obtener_datos();
    obtener_datosDuenoUnidad();
    $(document).on("click","#Eliminar",function (){

        if(confirm("¿Esta seguro que desea elminar este dueño?"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminarDuenos.php",
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

        $.ajax({
            url: "../../controlador/ConsultaParaEditarDu.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#mcode').val(data.Id_Dueño);
                $('#mNombre').val(data.NombreDueño);
                $('#mPaterno').val(data.ApellidoPaterno);
                $('#mMaterno').val(data.ApellidoMaterno);
                $('#mUsr').val(data.id_UsrUsuario);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatos").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatos")[0]);
    var Ruta="../../controlador/UpdateDueno.php"

    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            var nota = alertify.notify(Datos,'success',5,function(){console.log('dissmissed');});
            obtener_datos();
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+''+Datos.statusText);
        }
    })
}

$("#InsertaDuanos").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertaDuanos")[0]);
    var Ruta="../../controlador/InsertarDuenos.php"
    var Reset=document.getElementById('InsertaDuanos').reset();
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
//SEGUNDO NAV  :) 
$("#InsertaDuanoUnidad").submit(InsertaDuenoUnidad);

function InsertaDuenoUnidad(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertaDuanoUnidad")[0]);
    var Ruta="../../controlador/InsertarDuenoUnidad.php"
    var Reset=document.getElementById('InsertaDuanoUnidad').reset();
    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            var not = alertify.notify(Datos,'success',5,function(){console.log('Spidermar');});
            obtener_datosDuenoUnidad();
            Reset;
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+' '+Datos.statusText);
        }
    })
}


//Esta webada manda el id haciendo la consulta para mostrar los datos del id seleccionado alv :v
    $(document).on('click','.editDU',function(){
        var id=$(this).attr("id");

        $.ajax({
            url: "../../controlador/COnsultaParaEditarDuenoUnidad.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#LOL').val(data.IdDueñoCombi);
                $('#LOL2').val(data.Id_Dueño);
                $('#LOL3').val(data.Cb_IdCombi);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatosDU").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatosDU")[0]);
    var Ruta="../../controlador/UpdateDuenoUnidad.php"

    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            var nota = alertify.notify(Datos,'success',5,function(){console.log('dissmissed');});
            obtener_datosDuenoUnidad();
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+''+Datos.statusText);
        }
    })
}


$(document).on("click","#EliminarDU",function (){

        if(confirm("¿Esta seguro que desea elminar este MaCH?"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminarDuenoUnidad.php",
                method: "POST",
                data: {id: id,},
                success: function(data){
                    //obtener_datos();
                    obtener_datosDuenoUnidad();
                    var nota = alertify.notify(data,'success',5,function(){console.log('dissmissed');});
                }
            });
        }
    });

});