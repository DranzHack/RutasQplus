$(document).ready(function(){

    
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

    $('.timepicker').timepicker({
   timeFormat: 'hh:mm p',
        // Hora inicio
        minTime: new Date(0, 0, 0, 5, 0, 0),
        //Hora Final
        maxTime: new Date(0, 0, 0, 23, 0, 0),
        //Intervalo de tiempo de inicio La hora de inicio
        startHour: 5,
        //La verdaderoa Hora de Inicio
        startTime: new Date(0, 0, 0, 5, 0, 0),
        //Minutos secuenciales despues de la hora de inicio
        interval: 8
        
});

    function obtener_datos()
    {
        $.ajax({
            url: "../../controlador/TablaEnroladores.php",
            method: "POST",
            success: function(data)
            {
                $("#Mostrar").html(data);
            }
        });
    }
    obtener_datos();

    $(document).on("click","#Eliminar",function (){
        if(confirm("Esta seguro que desea elminarlo"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminarEnrol.php",
                method: "POST",
                data: {id: id,},
                success: function(data){
                    //obtener_datos();
                    obtener_datos();
                    alert(data);
                }
            });
        }
    });
//Esta webada manda el id haciendo la consulta para mostrar los datos del id seleccionado alv :v
    $(document).on('click','.edit',function(){
        var id=$(this).attr("id");

        $.ajax({
            url: "../../controlador/ConsultaParaEditarEnrolados.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#mCode').val(data.En_IdEnrolado);
                $('#mCombi').val(data.Cb_IdCombi);
                $('#mChofer').val(data.Ch_IdChofer);
                $('#mBase').val(data.Chk_IdCheck);
                $('#datepicker').val(data.En_Fecha);
                $('#mHora').val(data.En_Hora);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatosEnroler").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatosEnroler")[0]);
    var Ruta="../../controlador/UpdateEnroler.php"

    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            alert(Datos);
            obtener_datos();
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+''+Datos.statusText);
        }
    })
}

});