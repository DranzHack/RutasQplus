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
	<title>Inventario</title>
	<link rel="stylesheet" href="../css/Estilos.css">
	<?php require_once '../Recursos/head.php' ?>
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
th{text-align: center}
</style>
</head>
<body>

	<?php require_once '../Recursos/navbarRuta.php' ?> 

	<br>
<div class="section" id="asdf">
    
</div>
<script type="text/javascript">
    console.log("asdf");
    function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("asdf").innerHTML =
            '<table  class="table table-hover table-responsive text-center"><tr><th>Unidad</th><th>Imei</th><th>Telefono</th><th>Placas</th><th>Marca</th><th>Modelo</th></tr>'+this.responseText+'</table>';
       }
    };
    xhttp.open("GET", "../../controlador/TablaUnidadesInven.php", true);
    xhttp.send(); 
    }
    loadDoc();
</script>
</body>
</html>


