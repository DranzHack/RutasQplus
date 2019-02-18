<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scouts Web</title>
    <link rel="stylesheet" href="../../css/Estilos.css">
</head>
<body>
    <?php require_once 'head.php' ?>
    <?php require_once 'navbar2.php' ?>
    
    <div id = "map"> </div>
    
    <?php require_once '../footer.php' ?>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&callback=initMap"> </script>
    <script src="../../../Ajax/Dropdown.js"></script>
    <script src="JS/Equipo18.js"></script>
</body>
</html>