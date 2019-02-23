<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);

        $Nombre=$_POST['Nombre'];
        $Paterno=$_POST['Paterno'];
        $Materno=$_POST['Materno'];
        $Licencia=$_POST['Licencia'];

        
        $tsql= "INSERT INTO Ch_Chofer (Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,Ch_Licencia) VALUES (?,?,?,?);";
        $params = array($Nombre,$Paterno,$Materno,$Licencia);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. " Chofer insertado: " . PHP_EOL);

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
