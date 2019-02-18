<?php
    require_once '../conf/CnnInfo.php';

    $ideq=$_POST['edit_code'];
    $nombreequipo=$_POST['edit_name'];
    $grupo=$_POST['Grupo'];
    $categoria=$_POST['Categoria'];

    echo $ideq;
    echo $nombreequipo;

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    //$Consult="UPDATE SET nombreequipo=$nombreequipo,grupo=$grupo,categoria=$categoria FROM Equipos WHERE ideq=$ideq";

    //$Result=sqlsrv_query($Laconepcion,$Consult);

    $tsql= "UPDATE Equipos SET nombreequipo=?,grupo=?,categoria=? WHERE ideq=?";
        $params = array($nombreequipo,$grupo,$categoria,$ideq);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " row(s) updated: " . PHP_EOL);
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
