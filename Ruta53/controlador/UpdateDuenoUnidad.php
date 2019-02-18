<?php
    require_once '../conf/CnnInfo.php';

    $Id=$_POST['LOL'];
    $Dusño=$_POST['LOL2'];
    $Unidad=$_POST['LOL3'];
/*
    echo $Id;
    echo '<br>';
    echo $Dusño;
    echo '<br>';
    echo $Unidad;
    echo '<br>';
*/
    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $tsql= "UPDATE Dueño_Combi SET Id_Dueño=?,Cb_IdCombi=?  WHERE IdDueñoCombi=?";
        $params = array($Dusño,$Unidad,$Id);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " DueñoUnidad Actualizado Correctamente " . PHP_EOL);
        sqlsrv_free_stmt($getResults);



    function FormatErrors( $errors )
    {
        // Display errors. 
        echo "Error information: ";

        foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."";
            echo "Code: ".$error['code']."";
            echo "Message: ".$error['message']."";
        }
    }
    
?>
