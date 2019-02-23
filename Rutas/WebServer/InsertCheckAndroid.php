<?php

$serverName = "192.168.0.126";
$connectionOptions = array(
    "database" => "DB_Ruta53",
    "uid" => "sa",
    "pwd" => "Oas970520"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//VARIABLES
$Cheking=$_GET['checking'];
$Imei=$_GET['imei'];
$fecha=date("Y-m-d");
$hora=date("H:i:s");

if ($Cheking!="NADA") {
  echo ("Inserting a new row into table" . PHP_EOL);
  $tsql= "INSERT INTO Check_Android (Cheking,Check_Fecha,Check_Hora,Imei) VALUES (?,?,?,?);";
  $params = array($Cheking,$fecha,$hora,$Imei);
  $getResults= sqlsrv_query($conn, $tsql, $params);
  $rowsAffected = sqlsrv_rows_affected($getResults);
  if ($getResults == FALSE or $rowsAffected == FALSE)
      die(FormatErrors(sqlsrv_errors()));
  echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

  sqlsrv_free_stmt($getResults);

}

/*
echo ("Inserting a new row into table" . PHP_EOL);
$tsql= "INSERT INTO Check_Android (Cheking,Check_Fecha,Check_Hora,Imei) VALUES (?,?,?,?);";
$params = array($Cheking,$fecha,$hora,$Imei);
$getResults= sqlsrv_query($conn, $tsql, $params);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

sqlsrv_free_stmt($getResults);
*/

function formatErrors($errors)
{
    // Display errors
    echo "Error information: <br/>";
    foreach ($errors as $error) {
        echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
        echo "Code: ". $error['code'] . "<br/>";
        echo "Message: ". $error['message'] . "<br/>";
    }
}



/*
$serverName = "192.168.0.126";
$connectionOptions = array(
    "database" => "Rt_Ruta53",
    "uid" => "sa",
    "pwd" => "Oas970520"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//VARIABLES

//$Fecha=date("Y-m-d H:i:s");
$Cheking=$_GET['checking'];
$Imei=$_GET['imei'];
$fecha=date("Y-m-d");
$hora=date("H:i:s");

echo $Cheking;
echo $Imei;
echo $fecha;
echo $hora;

//echo $Fecha;


echo ("Inserting a new row into table" . PHP_EOL);
$tsql= "INSERT INTO Check_Android (Cheking,Check_fecha,Check_Hora,Imei) VALUES (?,?,?,?,?);";
$params = array($Cheking,$Imei,$fecha,$hora);
$getResults= sqlsrv_query($conn, $tsql, $params);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

sqlsrv_free_stmt($getResults);


function formatErrors($errors)
{
    // Display errors
    echo "Error information: <br/>";
    foreach ($errors as $error) {
        echo "SQLSTATE: ". $error['SQLSTATE'] . "<br/>";
        echo "Code: ". $error['code'] . "<br/>";
        echo "Message: ". $error['message'] . "<br/>";
    }
}
*/


?>
