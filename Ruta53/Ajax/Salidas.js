$(document).ready(function(){       
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd  hh:ii",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
          
        
    function obtener_datosTepeyac()
    {
        $.ajax({
            url: "../../controlador/TablaSalidaTepeyac.php",
            method: "POST",
            success: function(data)
            {
                $("#MostrarTepeyac").html(data);
            }
        });
    }

    function obtener_datosVolcanes()
    {
        $.ajax({
            url: "../../controlador/TablaSalidaVolcanes.php",
            method: "POST",
            success: function(data)
            {
                $("#MostrarVolcanes").html(data);
            }
        });
    }
    obtener_datosTepeyac();
    obtener_datosVolcanes();
    

    //esta webada elimina Trpryac
    $(document).on("click","#Eliminar",function (){
        if(confirm("Esta seguro que desea elminarlo"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../../controlador/EliminaTepeyac.php",
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
//Esta webada manda el id haciendo la consulta TEPEYAC para mostrar los datos del id seleccionado alv :v
    $(document).on('click','.editTepeyac',function(){
        var idTepeyac=$(this).attr("id");

        $.ajax({
            url: "../../controlador/ConsultaParaEditarSalidaTepeyac.php",
            method: "POST",
            data: {id: idTepeyac,},
            dataType: "json",
            success: function(data)
            {
                $('#mCode').val(data.En_IdEnrolado);
                $('#mCombi').val(data.Cb_IdCombi);
                $('#mChofer').val(data.Ch_IdChofer);
                $('#mBase').val(data.Chk_IdCheck);
                $('#mHora').val(moment(data.En_Hora).format('h:mm a'));
            }
        });

    });

    //Mostrar Edicion para Volcanes 
    $(document).on('click','.editVolcanes',function(){
        var IdVolcanes=$(this).attr("id");
        $.ajax({
            url: "../../controlador/ConsultaParaEditarSalidaVolcanes.php",
            method: "POST",
            data:{id:IdVolcanes,},
            dataType: "json",
            success: function(Data)
            {
                $('#mCodeVolcanes').val(Data.En_IdEnrolado);
                $('#mCombiVolcanes').val(Data.Cb_IdCombi);
                $('#mChoferVolcanes').val(Data.Ch_IdChofer);
                $('#mBaseVolcanes').val(Data.Chk_IdCheck);
                $('#mHoraVolcanes').val(Data.En_Hora);
            }
        })
    });
//Con los datos mostrados en modal esta es la Actualizacion TEPEYAC alv :v 
$("#EditarDatosTepeyac").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatosTepeyac")[0]);
    var Ruta="../../controlador/UpdateTepeyac.php"

    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            alert(Datos);
            obtener_datosTepeyac();
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+''+Datos.statusText);
        }
    })
}

$("#InsertaEnrol").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#InsertaEnrol")[0]);
    var Ruta="../../controlador/InsertarEnrol.php"
    var Reset=document.getElementById('InsertaEnrol').reset();
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
            Reset;
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+' '+Datos.statusText);
        }
    })
}


});