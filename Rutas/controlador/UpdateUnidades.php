<?php
    require_once '../conf/CnnInfo.php';

    $Combi=$_POST['mcode'];
    $Numero=$_POST['mNumero'];
    $Imei=$_POST['mImei'];
    $Telefono=$_POST['mTelefono'];
    $Placas=$_POST['mPlacas'];
    $Marca=$_POST['mMarca'];
    $Modelo=$_POST['mModelo'];

    //echo $ideq;
    //echo $nombreequipo;

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    //$Consult="UPDATE SET nombreequipo=$nombreequipo,grupo=$grupo,categoria=$categoria FROM Equipos WHERE ideq=$ideq";

    //$Result=sqlsrv_query($Laconepcion,$Consult);

    $tsql= "UPDATE Cb_Combi SET Cb_NumeroRuta=?,Cb_Imei=?,Cb_Telefono=?,Cb_Placas=?,Cb_Marca=?,Cb_Modelo=? WHERE Cb_IdCombi=?";
        $params = array($Numero,$Imei,$Telefono,$Placas,$Marca,$Modelo,$Combi);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " Unidad Actualizada Correctamente " . PHP_EOL);
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
