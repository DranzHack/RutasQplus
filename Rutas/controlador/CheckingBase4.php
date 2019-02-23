<?php
	require_once '../conf/CnnInfo.php';

	$Conection=sqlsrv_connect($serverName,$connectionOptions);

	$idchecador=6;
	$id=$_POST['id'];
    $Ruta=$_POST['Who'];
    $fecha=date("Y-m-d");
    $hora=date("H:i:s");

	$tsql="INSERT INTO Checking(SLL_IdSalidaLlegada,Chk_IdCheck,Chk_FechaCheckPoint,Chk_HoraCheckPoint) VALUES(?,?,?,?)";
    $params = array($id,$idchecador,$fecha,$hora);
    $getResults= sqlsrv_query($Conection, $tsql, $params);
    $rowsAffected = sqlsrv_rows_affected($getResults);
      if ($getResults == FALSE or $rowsAffected == FALSE)
          die(FormatErrors(sqlsrv_errors()));
          echo ("Unidad:".$Ruta." Cheking Base 4 Correct: " . PHP_EOL);

    sqlsrv_free_stmt($getResults);


    function FormatErrors( $errors )
{
    /* Display errors. */
    echo "Error information: ";

    foreach ( $errors as $error )
    {
        echo "SQLSTATE: ".$error['SQLSTATE']."";
        echo "Code: ".$error['code']."";
        echo "Message: ".$error['message']."";
    }
}
?>