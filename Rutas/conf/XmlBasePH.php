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

$tsql= "SELECT * FROM Bs_Bases where Bs_Tipo='Base' and Bs_IdBase in(5,7,11)";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: ' . sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){
 
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['Bs_IdBase']);
  $newnode->setAttribute("Base",$row['Bs_Nombre']);
  $newnode->setAttribute("Latitud", $row['Bs_Latitud']);
  $newnode->setAttribute("Longitud", $row['Bs_Longitud']);
}

echo $dom->saveXML();
?>