<?php
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
    <title>Document</title>

    <?php require_once '../Recursos/head.php'?>
    <link rel="stylesheet" href="../css/Estilos.css">

</head>
<body>
    <?php require_once '../Recursos/navbarRuta.php' ?>
     <div id="map"></div>



     
    <script src="../js/jquery-3.1.1.min.js"></script>
<script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&libraries=drawing&callback=initMap"> </script>
    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../../Ajax/PruebaALV.js"></script>


</body>
</html>
