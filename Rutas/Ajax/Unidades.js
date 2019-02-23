$(document).ready(function(){



    function obtener_datos()
    {
        $.ajax({
            url: "../../controlador/TablaInventarioUnidades.php",
            method: "POST",
            success: function(data)
            {
                $("#Mostrar").html(data);
            }
        });
    }
    obtener_datos();

    $(document).on("click","#Eliminar",function (){
        if(confirm("¿Esta seguro que desea elminar esta Unidad?"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminarUnidades.php",
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
            url: "../../controlador/ConsultaParaEditarUnidades.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#mcode').val(data.Cb_IdCombi);
                $('#mNumero').val(data.Cb_NumeroRuta);
                $('#mImei').val(data.Cb_Imei);
                $('#mTelefono').val(data.Cb_Telefono);
                $('#mPlacas').val(data.Cb_Placas);
                $('#mMarca').val(data.Cb_Marca);
                $('#mModelo').val(data.Cb_Modelo);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatos").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatos")[0]);
    var Ruta="../../controlador/UpdateUnidades.php"

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

$("#InsertaUnidades").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertaUnidades")[0]);
    var Ruta="../../controlador/InsertarUnidades.php"
    var Reset=document.getElementById('InsertaUnidades').reset();
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
            Reset;
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+' '+Datos.statusText);
        }
    })
}


});