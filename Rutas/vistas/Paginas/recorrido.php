<?php
    session_start();

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['privilegio']=='Administrador'||$_SESSION['privilegio']=='Unidad')
        {
            
        }
        else
        {
            session_destroy();
            header('location: ../../');
        }
    }else{
        session_destroy();
        header('location: ../../'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recorridos Unidad</title>
    <link rel="stylesheet" href="../css/Estilos.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body>

    <div class="section">
        <?php
            if($_SESSION['privilegio']=='Administrador'){
                require_once '../Recursos/navbarRuta.php';
            }
            elseif($_SESSION['privilegio']=='Unidad'){
                require_once '../Recursos/NavBarUnidades.php';
            }
        ?>
        <form id="DatosAlv">
                    <input class="form-control" type="date" name="fecha" id="fecha" style="width:33%;display: inline-block;">
                    <select class="form-control" name="unidad" id="unidad" style="width:33%;display: inline-block;">
                        <?php 
                            if($_SESSION['privilegio']=='Administrador'){
                                require_once '../../controlador/ComboUnidades.php';
                            }
                            elseif($_SESSION['privilegio']=='Unidad'){
                                require_once '../../controlador/ComboUnidadesDueño.php';
                            }
                        ?>
                    </select>
                    <select class="form-control" name="corrida" id="corrida" style="width:33%;display: inline-block;">
                    </select>
        </form>
        <div id = "map"> </div>
        <?php require_once '../Recursos/footer.php' ?>
    </div>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&callback=initMap"> </script>
    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/recorrido.js"></script>
    <script type="text/javascript">
        
    </script>
    
</body>
</html>