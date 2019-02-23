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

$tsql= "select * from coordenadas where telefono ='2228514481' and fecha BETWEEN '2018-25-10 14:11:41.000' and '2018-25-10 16:10:17.000'";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: ' . sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){
 
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("Telefono",$row['telefono']);
  $newnode->setAttribute("Latitud", $row['latitud']);
  $newnode->setAttribute("Longitud", $row['longitud']);
  $newnode->setAttribute("Fecha", $row['fecha_texto']);
}

echo $dom->saveXML();
?>