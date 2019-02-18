<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);
    $Id=$_POST["id"];

    $Consult="DELETE FROM En_Enroler WHERE En_IdEnrolado=$Id";

    $EliminarSalida=sqlsrv_query($Laconepcion,$Consult);

    if(!$Result)
    {
        echo "Error Al Eliminar el Registro..";
        exit();
    }
    else
    {
        echo "Chofer Eliminado Correctamente";
    }


?>