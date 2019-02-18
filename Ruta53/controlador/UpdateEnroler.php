<?php
    require_once '../conf/CnnInfo.php';

    $ID=$_POST['mCode'];
    $Combi=$_POST['mCombi'];
    $Chofer=$_POST['mChofer'];
    $Base=$_POST['mBase'];
    $Fecha=$_POST['mFecha'];
    $Hora=$_POST['mHora'];

    /*
    echo $ID;
    echo '<br>';
    echo $Combi;
    echo '<br>';
    echo $Chofer;
    echo '<br>';
    echo $Materno;
    echo '<br>';
    echo $Fecha;
    echo '<br>';
    echo $Hora;
    echo '<br>';
    */
   
    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    //$Consult="UPDATE SET nombreequipo=$nombreequipo,grupo=$grupo,categoria=$categoria FROM Equipos WHERE ideq=$ideq";

    //$Result=sqlsrv_query($Laconepcion,$Consult);

    $tsql= "UPDATE En_Enroler SET Cb_IdCombi=?,Ch_IdChofer=?,Chk_IdCheck=?,En_Fecha=?,En_Hora=?  WHERE En_IdEnrolado=?";
        $params = array($Combi,$Chofer,$Base,$Fecha,$Hora,$ID);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " Unidad Actualizada Correctamente " . PHP_EOL);
        sqlsrv_free_stmt($getResults);



    function FormatErrors( $errors )
    {
        
        echo "Error information: ";

        foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."";
            echo "Code: ".$error['code']."";
            echo "Message: ".$error['message']."";
        }
    }

?>
