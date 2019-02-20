<?php

    require_once "../conf/CnnInfo.php";

    //Establishes the connection
//$conn = sqlsrv_connect($serverName, $connectionOptions);

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a MySQL server
$connection=sqlsrv_connect($serverName, $connectionOptions);
if (!$connection) {  die('Not connected : ' . $connection->connect_error);}


$Fecha=$_POST['fecha'];
$unidad=$_POST['unidad'];
$corrida=$_POST['corrida'];

//echo $Fecha;


$tsql="
SELECT 
    SL.SLL_IdSalidaLlegada,
    Cm.Cb_NumeroRuta,
    Ch.Ch_NombreChofer,
    Ch.Ch_ApellidoPaterno,
    Ch.Ch_ApellidoMaterno,
    GPS.Direccion,
    GPS.Latitud,
    GPS.Longitud,
    GPS.Fecha,
    convert(Time, GPS.Hora) as Hora 
FROM Salidas_Llegadas SL 
    inner join Cb_Combi Cm on Cm.Cb_IdCombi=SL.Cb_IdCombi
    inner join Ch_Chofer Ch on Ch.Ch_IdChofer=Sl.Ch_IdChofer
    inner join LocationGPS GPS on GPS.Imei=Cm.Cb_Imei
WHERE 
    Cm.Cb_IdCombi='$unidad' AND 
    GPS.Fecha='$Fecha' AND
    SL.SSL_EstadoIO='Inicio'  AND
    (
    Hora BETWEEN 
        (SELECT SUBSTRING(Inicio, 11, 6) from (SELECT ROW_NUMBER() OVER(ORDER BY Inicio) AS corrida, * from Report2 ) as x where corrida = $corrida)
    and 
        (SELECT SUBSTRING(Fin, 11, 6) from (SELECT ROW_NUMBER() OVER(ORDER BY Inicio) AS corrida, * from Report2 ) as x where corrida = $corrida)
    )
";

#$tsql= "SELECT top 1 * FROM coordenadas where telefono='2228514481' order by id desc;";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: '. sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("Id",$row['SLL_IdSalidaLlegada']);
  $newnode->setAttribute("Ruta",$row['Cb_NumeroRuta']);
  $newnode->setAttribute("Nombre", $row['Ch_NombreChofer']);
  $newnode->setAttribute("Paterno", $row['Ch_ApellidoPaterno']);
  $newnode->setAttribute("Materno",$row['Ch_ApellidoMaterno']);
  $newnode->setAttribute("Direccion",$row['Direccion']);
  $newnode->setAttribute("Latitud", $row['Latitud']);
  $newnode->setAttribute("Longitud", $row['Longitud']);
  $newnode->setAttribute("Fecha", date_format($row['Fecha'],'Y-m-d'));
  $newnode->setAttribute("Hora", date_format($row['Hora'],'H:i:s'));
}

echo $dom->saveXML();

?>
