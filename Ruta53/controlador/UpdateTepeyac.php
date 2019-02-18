<?php
    require_once '../conf/CnnInfo.php';

    $ID=$_POST['mCode'];
    $Combi=$_POST['mCombi'];
    $Chofer=$_POST['mChofer'];
    $Check=$_POST['mBase'];
    $Fecha=$_POST['mFecha'];

    /*
    echo $ID;
    echo '</br>';
    echo $Combi;
    echo '</br>';
    echo $Chofer;
    echo '</br>';
    echo $Check;
    echo '</br>';
    echo $Fecha;
    */
    

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $tsql= "UPDATE En_Enroler SET Cb_IdCombi=?,Ch_IdChofer=?,Chk_IdCheck=?,En_Fecha=? WHERE En_IdEnrolado=?";
        $params = array($Combi,$Chofer,$Check,$Fecha,$ID);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " row(s) updated: " . PHP_EOL);
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