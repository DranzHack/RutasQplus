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
                        <?php require '../../controlador/unidadesdueno.php'; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <hr>
        <?php require_once '../Recursos/footer.php' ?>
    </div>

    <div id="showResume" class="modal fade">
        <div class="modal-dialog" style="max-width: 70% !important;">
            <div class="modal-content" style="overflow-y: scroll">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Recorridos</th>
                            <th class="text-center">Unidad</th>
                            <th class="text-center">Conductor</th>
                            <th class="text-center">#Vuelta</th>
                            <th class="text-center">Inicio</th>
                            <th class="text-center">Chk 1</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 2</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 3</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 4</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 5</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 6</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 7</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 8</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 9</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 10</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 11</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 12</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 13</th>
                            <th class="text-center">Minutos</th>
                            <th class="text-center">Chk 14</th>
                            <th class="text-center">Fin</th>
                        </tr>
                    </thead>
                    <tbody id="resume">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../../Ajax/unidadDueño.js"></script>

</body>
</html>