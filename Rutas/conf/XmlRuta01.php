<?php
    require_once "ConexionALE.php";

    //Establishes the connection
//$conn = sqlsrv_connect($serverName, $connectionOptions);

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a MySQL server
$connection=sqlsrv_connect($serverName, $connectionOptions);
if (!$connection) {  die('Not connected : ' . $connection->connect_error);}

//$tsql= "SELECT * FROM coordenadas WHERE telefono='2228514481' AND month(fecha)=11 AND day(fecha)=7";
$tsql= "SELECT * from PruebaGPS where imei='015088000671220'";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: ' . sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['idTabla']);
  $newnode->setAttribute("Telefono",$row['imei']);
  $newnode->setAttribute("Latitud", $row['latitud']);
  $newnode->setAttribute("Longitud", $row['longitud']);
  $newnode->setAttribute("Fecha", date_format($row['fecha'],'Y-m-d'));
  $newnode->setAttribute("Hora",date_format($row['hora'],'H:i:s'));
}

echo $dom->saveXML();
?>
