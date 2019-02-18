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
    }    else{
        session_destroy();
        header('location: ../../'); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editar Enroladores</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php require_once '../Recursos/head.php' ?>
  <link rel="stylesheet" href="../css/Estilos.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>
<body>

<div class="section">

        <?php require_once '../Recursos/navbarRuta.php' ?>
        <br>
              <hr>
              
                    <center><h1>Monitoreo Ruta 53</h1></center>
                      <div class="col-xl-12">
                        <form id="FormF" name="FormF" enctype="multipart/form-data">
                            <input class="form-group" type="date" id="fecha" name="fecha">
                            <label for="fecha">Filtrar por fecha</label>  
                        </form>                    
                      </div>
                    <div class="row" style="overflow-y: scroll">
                <div class="col-xl-12 ">
                    <table id="Equip" class="table table-hover table-responsive text-center">
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
                      <tbody id="MostrarMonitoreo">

                      </tbody>
                    </table>
                </div>
              </div>
      </div>
      <?php require_once '../Recursos/footer.php' ?>
    </div>
    <script src="../../Ajax/Dropdown.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>

<script src="../../Ajax/Monitoreo.js"></script>
</body>
</html>
