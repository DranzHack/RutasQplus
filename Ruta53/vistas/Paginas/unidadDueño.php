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
    }
    else{
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
    <title>Mis unidades</title>
    <?php require_once '../Recursos/head.php' ?>
    <link rel="stylesheet" href="../css/Estilos.css">
    <link rel="shortcut icon" href="../../img/Chofer.jpg" />
    <!-- Libreria Alertify -->
    <style>
        th{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <hr>
        <center><h1 class="h3 mb-3 font-weight-normal">Mis unidades</h1></center>
        <div class="container">
        </div>

        <div class="container-fluid">
          <div class="row">
             <div class="col m12">
                <table id="unidades" class="table table-hover text-center">
                    <thead>
                        <tr>
                          <th>Unidad</th>
                          <th>Telefono</th>
                          <th>Placas</th> 
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody id="Mostrar">
                        <?php require (__DIR__.'/../../controlador/unidadDueño.php') ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <hr>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <div id="showResume" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="resume" style="overflow-y: scroll">
                        
            </div>
        </div>
    </div>


    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/unidadDueño.js"></script>

</body>
</html>