<?php
    require_once '../conf/CnnInfo.php';

    $Chofer=$_POST['mcode'];
    $Nombre=$_POST['mNombre'];
    $Paterno=$_POST['mPaterno'];
    $Materno=$_POST['mMaterno'];
    $Usuario=$_POST['mUsr'];

    /*
    echo $Chofer;
    echo '<br>';
    echo $Nombre;
    echo '<br>';
    echo $Paterno;
    echo '<br>';
    echo $Materno;
    echo '<br>';
    echo $Usuario;
    echo '<br>';
    */

    //echo $ideq;
    //echo $nombreequipo;

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    //$Consult="UPDATE SET nombreequipo=$nombreequipo,grupo=$grupo,categoria=$categoria FROM Equipos WHERE ideq=$ideq";

    //$Result=sqlsrv_query($Laconepcion,$Consult);

    $tsql= "UPDATE Dueños SET NombreDueño=?,ApellidoPaterno=?,ApellidoMaterno=?,Id_UsrUsuario=?  WHERE Id_Dueño=?";
        $params = array($Nombre,$Paterno,$Materno,$Usuario,$Chofer);
        #echo("Updating Location for user ".$userToUpdate. PHP_EOL);

        $getResults= sqlsrv_query($Laconepcion, $tsql,$params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " Chofer Actualizado Correctamente " . PHP_EOL);
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
