<?php
    require_once "CnnInfo.php";

    //Establishes the connection
//$conn = sqlsrv_connect($serverName, $connectionOptions);

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a MySQL server
$connection=sqlsrv_connect($serverName, $connectionOptions);
if (!$connection) {  die('Not connected : ' . $connection->connect_error);}

$tsql="SELECT top 1 * FROM LocationGPS where Imei='0000000000' order by fecha desc ,hora desc;";
#$tsql= "SELECT top 1 * FROM coordenadas where telefono='2228514481' order by id desc;";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: ' . sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("Id",$row['Id_Location']);
  $newnode->setAttribute("Direccion",$row['Direccion']);
  $newnode->setAttribute("Imei",$row['Imei']);
  $newnode->setAttribute("Telefono",$row['Telefono']);
  $newnode->setAttribute("Latitud", $row['Latitud']);
  $newnode->setAttribute("Longitud", $row['Longitud']);
  $newnode->setAttribute("Fecha", date_format($row['Fecha'],'Y-m-d'));
  $newnode->setAttribute("Hora", date_format($row['Hora'],'H:i:s'));
}

echo $dom->saveXML();
?>
