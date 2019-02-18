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


$Fecha=$_GET['Fecha'];
$unidad=$_GET['unidad'];
//echo $Fecha;


$tsql="
SELECT Rol.En_IdEnrolado,com.Cb_NumeroRuta,Chof.Ch_NombreChofer,Chof.Ch_ApellidoPaterno,Chof.Ch_ApellidoMaterno,gps.Direccion,gps.Latitud,gps.Longitud,gps.Fecha,gps.Hora from En_Enroler Rol 
inner join Cb_Combi Com on Com.Cb_IdCombi=Rol.Cb_IdCombi
inner join Ch_Chofer Chof on Chof.Ch_IdChofer=Rol.Ch_IdChofer
inner join LocationGPS GPS on GPS.Imei=Com.Cb_Imei
where Com.Cb_IdCombi='$unidad' AND Fecha='$Fecha'
";

#$tsql= "SELECT top 1 * FROM coordenadas where telefono='2228514481' order by id desc;";
$getResults= sqlsrv_query($connection, $tsql);
if (!$getResults) {
  die('Invalid query: '.$tsql . sqlsrv_errors($connection));
}

header("Content-type: text/xml");



while ($row = @sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("Id",$row['En_IdEnrolado']);
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
