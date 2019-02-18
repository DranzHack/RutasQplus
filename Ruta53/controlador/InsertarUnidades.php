<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);

        $NumeroRuta=$_POST['Numero'];
        $Imei=$_POST['Imei'];
        $Telefono=$_POST['Telefono'];
        $Placas=$_POST['Placas'];
        $Marca=$_POST['Marca'];
        $Modelo=$_POST['Modelo'];
        

        $tsql= "INSERT INTO Cb_Combi (Cb_NumeroRuta,Cb_Imei,Cb_Telefono,Cb_Placas,Cb_Marca,Cb_Modelo) VALUES (?,?,?,?,?,?);";
        $params = array($NumeroRuta,$Imei,$Telefono,$Placas,$Marca,$Modelo);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. "Unidad insertada: " . PHP_EOL);

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
