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

$hoy = date("Y-m-d");

$tsql="
SELECT top 1 rol.SLL_IdSalidaLlegada,com.Cb_NumeroRuta,chofer.Ch_NombreChofer,chofer.Ch_ApellidoPaterno,chofer.Ch_ApellidoMaterno,gps.Direccion,gps.Latitud,gps.Longitud,gps.Fecha,gps.Hora from Salidas_Llegadas rol inner join Cb_Combi com
on rol.Cb_IdCombi=com.Cb_IdCombi
inner join Ch_Chofer chofer on rol.Ch_IdChofer=chofer.Ch_IdChofer
inner join LocationGPS gps on gps.Imei=com.Cb_Imei
  where gps.Imei='355628086196259' and gps.Fecha='$hoy'
ORDER by gps.Id_Location DESC
";
#$tsql= "SELECT top 1 * FROM coordenadas where telefono='2228514481' order by id desc;";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: ' . sqlsrv_errors($connection));
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
