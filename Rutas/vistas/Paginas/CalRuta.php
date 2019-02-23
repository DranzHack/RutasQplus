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
    <title>Calificacion</title>
    <?php require_once '../Recursos/head.php'; ?>
		<link rel="stylesheet" href="../css/Estilos.css">
        
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
       
</head>
<body>
    <div class="section">
        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr> 
        <center><h1 class="h3 mb-3 font-weight-normal">Unidades</h1></center>
        <div class="container-fluid">
            <div class="row">
                <div class="col m12">
                    <?php require_once '../../controlador/TablaUnidades.php' ?>
                </div>
            </div>
        </div>
        <hr>
        <?php require_once '../Recursos/footer.php'?>
    </div>




		<script src="../../Ajax/Dropdown.js"></script>
</body>
</html>