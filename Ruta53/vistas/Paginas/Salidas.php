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
  <title>Editar Enroladores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once '../Recursos/head.php' ?>
  <link rel="stylesheet" href="../css/Estilos.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>
<body>
<?php require_once '../Recursos/navbarRuta.php' ?>
<div class="section">
        <?php require_once '../Recursos/navbarRuta.php' ?>
        <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="SalidasTepeyac-tab" data-toggle="tab" href="#SalidasTepeyac" role="tab" aria-controls="SalidasTepeyac" aria-selected="true">Salidas Tepeyac</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="SalidaVolcanes-tab" href="SalidasVolcanes.php" role="tab" aria-controls="SalidaVolcanes" aria-selected="false">Salidas Volcanes</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="SalidasTepeyac" role="tabpanel" aria-labelledby="SalidasTepeyac-tab">
            <div class="container-fluid">
              <hr>
              <center><h1 class="h3 mb-3 font-weight-normal">Salidas Tepeyac</h1></center>
              <div class="row">
                <div class="col m12">
                    <table id="Equip" class="table table-hover table-responsive text-center">
                      <thead>
                        <tr>
                          <th class="text-center">Numero Ruta</th>
                          <th class="text-center">Nombre del Chofer</th>
                          <th class="text-center">Fecha</th>
                          <th class="text-center">Hora</th>
                          <th class="text-center">Vuelta</th>
                          <th class="text-center">Controls</th>
                        </tr>
                      </thead>
                      <tbody id="MostrarTepeyac">

                      </tbody>
                    </table>
                </div>
              </div>
           </div>
        </div>
        <div class="tab-pane fade" id="SalidaVolcanes" role="tabpanel" aria-labelledby="SalidaVolcanes-tab">

        </div>
      </div>
      <?php require_once '../Recursos/footer.php' ?>
    </div>

    <?php require_once '../../controlador/ModalSalidaTepeyac.php' ?>

    <script src="../../Ajax/Dropdown.js"></script>
        <script src="../js/jquery-3.1.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="../js/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="../../Ajax/Salidas.js"></script>
</body>
</html>
