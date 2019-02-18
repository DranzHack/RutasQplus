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
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Antimonitor</title>
  <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-9wy7{font-weight:bold;font-size:24px;border-color:#34cdf9;text-align:center;vertical-align:top}
.tg .tg-6mes{border-color:#34cdf9;text-align:right;vertical-align:top}
.tg .tg-dpqo{background-color:#D2E4FC;font-weight:bold;border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-47m8{font-weight:bold;border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-4rs4{background-color:#D2E4FC;font-weight:bold;font-size:16px;color:#3c3c6d;border-color:#34cdf9;text-align:center;vertical-align:top}
.tg .tg-jgo1{border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-yyri{background-color:#D2E4FC;font-weight:bold;color:#3c3c6d;border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-wfwu{background-color:#D2E4FC;font-weight:bold;font-size:16px;color:#3c3c6d;border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-udwf{background-color:#D2E4FC;border-color:#34cdf9;text-align:left;vertical-align:top}
.tg .tg-l5vw{background-color:#D2E4FC;border-color:#34cdf9;text-align:right;vertical-align:top}
.leter{color: #FA5858}
.check{background-color: #F2F2F2}
.headtable{background-color: #58D3F7 }
.table1{background-color: #58ACFA}
</style>
<?php require_once '../Recursos/head.php' ?>
<link rel="stylesheet" href="../css/Estilos.css">
</head>
<body background="../../img/backblanco.jpg">
    <?php require_once '../Recursos/navbarRuta.php'; ?>
<br>
<div class="section">
    <h10><p>"Los Datos mostrados en la tabla, no son reales solo son una demostracion de como quedaria en la muestra final"</p></h10>
     <table class="table table-hover table-responsive text-center ">    
  <tr>
    <th class="table1 text-center " colspan="25">(DoMi) RUTA 53 CORRIDAS 5 DE DICIEMBRE 2018 (DoMi)<br></th>
  </tr>
  <tr>
    <th class="headtable">Recorridos</th>
    <th class="headtable">Unidad</th>
    <th class="headtable">Conductor</th>
    <th class="headtable">#Vuelta</th>
    <th class="headtable">Salida BaAM</th>
    <th class="headtable">Chk 1</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 2</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 3</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 4</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 5</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 6</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Chk 7</th>
    <th class="headtable">Minutos -</th>
    <th class="headtable">Llegada BaAM</th>
  </tr>
  <tr>
    <td >1<br></td>
    <td >21</td>
    <td >Noe Moctezuma<br></td>
    <td>1</td>
    <td >9:00 AM</td>
    <td >9:15 AM</td>
    <td class="check leter">3</th>
    <td >9:30 AM</td>
    <td class="check leter">3</th>
    <td >9:45 AM</td>
    <td class="check leter">3</th>
    <td >10:00 AM</td>
    <td class="check leter">3</th>
    <td >10:15 AM</td>
    <td class="check leter">3</th>
    <td >10:30 AM</td>
    <td class="check leter">3</th>
    <td >10:45 AM</td>
    <td class="check leter">3</th>
    <td >12:00 AM</td>
  </tr>
  <tr>
    <td >2<br></td>
    <td >10</td>
    <td >Juan Perez<br></td>
    <td>1</td>
    <td >9:00 AM</td>
    <td >9:15 AM</td>
    <td class="check leter">3</th>
    <td >9:30 AM</td>
    <td class="check leter">3</th>
    <td >9:45 AM</td>
    <td class="check leter">3</th>
    <td >10:00 AM</td>
    <td class="check leter">3</th>
    <td >10:15 AM</td>
    <td class="check leter">3</th>
    <td >10:30 AM</td>
    <td class="check leter">3</th>
    <td >10:45 AM</td>
    <td class="check leter">3</th>
    <td >12:00 AM</td>
  </tr>
  <tr>
    <td >3<br></td>
    <td >21</td>
    <td >Noe Moctezuma<br></td>
    <td>2</td>
    <td >12:10 AM</td>
    <td >12:45 am</td>
    <td class="check leter">3</th>
    <td >1:40 AM</td>
    <td class="check leter">3</th>
    <td >9:45 AM</td>
    <td class="check leter">3</th>
    <td >10:00 AM</td>
    <td class="check leter">3</th>
    <td >10:15 AM</td>
    <td class="check leter">3</th>
    <td >10:30 AM</td>
    <td class="check leter">3</th>
    <td >10:45 AM</td>
    <td class="check leter">3</th>
    <td >12:00 AM</td>
  </tr>
  <tr>
    <td >4<br></td>
    <td >11</td>
    <td >Irvin Morales<br></td>
    <td>1</td>
    <td >9:00 AM</td>
    <td >9:15 AM</td>
    <td class="check leter">3</th>
    <td >9:30 AM</td>
    <td class="check leter">3</th>
    <td >9:45 AM</td>
    <td class="check leter">3</th>
    <td >10:00 AM</td>
    <td class="check leter">3</th>
    <td >10:15 AM</td>
    <td class="check leter">3</th>
    <td >10:30 AM</td>
    <td class="check leter">3</th>
    <td >10:45 AM</td>
    <td class="check leter">3</th>
    <td >12:00 AM</td>
  </tr>
  <tr>
    <td >5<br></td>
    <td >12</td>
    <td >Ale Paredes<br></td>
    <td>1</td>
    <td >9:00 AM</td>
    <td >9:15 AM</td>
    <td class="check leter">3</th>
    <td >9:30 AM</td>
    <td class="check leter">3</th>
    <td >9:45 AM</td>
    <td class="check leter">3</th>
    <td >10:00 AM</td>
    <td class="check leter">3</th>
    <td >10:15 AM</td>
    <td class="check leter">3</th>
    <td >10:30 AM</td>
    <td class="check leter">3</th>
    <td >10:45 AM</td>
    <td class="check leter">3</th>
    <td >12:00 AM</td>
  </tr>
  
 
</table>
<br>
</div>

<div id="map"></div>

<?php require_once '../Recursos/footer.php' ?>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAWY2yv9Y9aJKB3oQsYYH0f0mVCHUGdPUY&callback=initMap"> </script>

    <script src="../js/jquery-3.1.1.min.js"></script>

    <script src="../../Ajax/Maping.js"></script>
<script src="../../Ajax/Dropdown.js"></script>
</body>
</html>

