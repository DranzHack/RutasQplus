<?php
    require_once '../conf/CnnInfo.php';

    $ID=$_POST['edit_code'];
    $nombre=$_POST['edit_name'];
    $telefono1=$_POST['edit_fon1'];
    $telefono2=$_POST['edit_fon2'];
    $equipo=$_POST['edit_team'];

    /*
    echo $ID;
    echo '</br>';
    echo $nombre;
    echo '</br>';
    echo $telefono1;
    echo '</br>';
    echo $telefono2;
    echo '</br>';
    echo $equipo;
    */

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $tsql= "UPDATE Participante SET nombre=?,telefono=?,edad=?,nombreequipo=? WHERE idparti=?";
        $params = array($nombre,$telefono1,$telefono2,$equipo,$ID);
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
