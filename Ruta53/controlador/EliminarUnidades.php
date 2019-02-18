<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);
    $Id=$_POST["id"];

    $Consult="DELETE FROM Cb_Combi WHERE Cb_IdCombi=$Id";

    $Result=sqlsrv_query($Laconepcion,$Consult);

    if(!$Result)
    {
        echo "Error Al Eliminar el Registro..";
        exit();
    }
    else
    {
        echo "Unidad elimanada correctamente";
    }


?>