<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);

        $dueno=$_POST['dueno'];
        $unidad=$_POST['Unidad'];
        
        /*
        echo $dueno;
        echo '<br>';
        
        echo $unidad;
        echo '<br>';
        */

        $tsql= "INSERT INTO Dueño_Combi (Id_Dueño,Cb_IdCombi) VALUES (?,?);";
        $params = array($dueno,$unidad);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. "Unidad Agregada Correctamente a Dueño: " . PHP_EOL);

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
