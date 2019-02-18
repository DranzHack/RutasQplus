<?php
	require_once '../conf/CnnInfo.php';

	$Conection=sqlsrv_connect($serverName,$connectionOptions);

	$fecha=date("Y-d-m H:i:s");
	$idchecador=14;
	$id=$_POST['id'];

	$tsql="INSERT INTO Check_Vuelta (Vl_IdVuelta,Chk_IdCheck,Chk_FechaChek) VALUES(?,?,?)";
	$params = array($id,$idchecador,$fecha);
    $getResults= sqlsrv_query($Conection, $tsql, $params);
    $rowsAffected = sqlsrv_rows_affected($getResults);
      if ($getResults == FALSE or $rowsAffected == FALSE)
          die(FormatErrors(sqlsrv_errors()));
          echo ($rowsAffected. " Cheking Base Fin Correct: " . PHP_EOL);

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
