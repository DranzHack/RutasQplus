$(document).ready(function(){

    
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

    $('.timepicker').timepicker({
    /*
    timeFormat: 'h:mm p',
    interval: 8,
    minTime: '10',
    maxTime: '9:00pm',
    defaultTime: '9',
    startTime: '9:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
    */
   timeFormat: 'hh:mm p',
        // year, month, day and seconds are not important
        minTime: new Date(0, 0, 0, 5, 0, 0),
        //Hora Inicio
        maxTime: new Date(0, 0, 0, 23, 0, 0),
        //Hora Fin contando 24hrs 
        // time entries start being generated at 6AM but the plugin 
        // shows only those within the [minTime, maxTime] interval
        //Intervalo de tiempo de inicio 
        startHour: 5,
        // the value of the first item in the dropdown, when the input
        // field is empty. This overrides the startHour and startMinute 
        // options
        //La verdaderoa Hora de Inicio
        startTime: new Date(0, 0, 0, 5, 0, 0),
        // items in the dropdown are separated by at interval minutes
        //Minutos secuenciales despues de la hora de inicio
        interval: 8
        
});
/*
$(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd  hh:ii",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
    */

    

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