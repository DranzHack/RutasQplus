<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recorridos Unidad</title>
    <link rel="stylesheet" href="../../css/Estilos.css">
    <?php require_once 'head.php' ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

</head>
<body>

    <div class="section">
        <?php require_once 'navbar2.php' ?>
        <form id="DatosAlv">
                    <input class="form-control" type="date" name="Fecha" id="Fecha" style="width:49%;display: inline-block;">
                    <select name="unidad" id="unidad" style="width:49%;display: inline-block;">
                        <?php require_once '../../../controlador/ComboUnidades.php'; ?>
                    </select>
        </form>
        <div id = "map"> </div>
        <?php require_once '../../Recursos/footer.php' ?>
    </div>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&callback=initMap"> </script>
    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="JS/Equipo1.js"></script>
    <script type="text/javascript">
        /*$(document).ready(function(){
                
                //var FormX=new FormData(document.getElementById('DatosAlv'));
                //var url = '../../../XML/XmlRCombi1.php';
                /*
                $.ajax({
                    method: 'GET',
                    url:"../../../XML/XmlRCombi1.php?Fecha="+F,
                    data: {F:F,},
                    success: function(datos)
                    {
                        initMap();
                    }
                });
                
            });

        });*/
        //var ALGO=document.getElementById("Fecha");
        /*
        $('#Fecha').on('change',function(){
            var F=$('#Fecha').val();
            var url = '../../../XML/XmlRCombi1.php';
            $.ajax({
                type: 'POST',
                url:url,
                data:{F:F,},
                success: function(datos)
                {
                    console.log('datos');
                }
            });
        });
        */

    </script>
    
</body>
</html>