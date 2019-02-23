$(document).ready(function(){



    function obtener_datos()
    {
        $.ajax({
            url: "../../controlador/TablaInventarioChofer.php",
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

        $.ajax({
            url: "../../controlador/ConsultaParaEditarChoferes.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#mcode').val(data.Ch_IdChofer);
                $('#mNombre').val(data.Ch_NombreChofer);
                $('#mPaterno').val(data.Ch_ApellidoPaterno);
                $('#mMaterno').val(data.Ch_ApellidoMaterno);
                $('#mLicencias').val(data.Ch_Licencia);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatos").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatos")[0]);
    var Ruta="../../controlador/UpdateChoferes.php"

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

$("#InsertaChofer").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertaChofer")[0]);
    var Ruta="../../controlador/InsrtarChoferes.php"
    var Reset=document.getElementById('InsertaChofer').reset();
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