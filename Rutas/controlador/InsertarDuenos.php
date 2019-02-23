<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);

        $Nombre=$_POST['Nombre'];
        $Paterno=$_POST['Paterno'];
        $Materno=$_POST['Materno'];
        $Usuario=$_POST['Usuario'];
        
        /*
        echo $Nombre;
        echo '<br>';
        
        echo $Paterno;
        echo '<br>';
        
        echo $Materno;
        echo '<br>';
        
        echo $Usuario;
        echo '<br>';
        */
        

        $tsql= "INSERT INTO Dueños (NombreDueño,ApellidoPaterno,ApellidoMaterno,id_UsrUsuario) VALUES (?,?,?,?);";
        $params = array($Nombre,$Paterno,$Materno,$Usuario);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. "Dueño insertado: " . PHP_EOL);

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
