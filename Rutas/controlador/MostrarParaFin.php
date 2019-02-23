<?php
    require_once '../conf/CnnInfo.php';

    
    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT MAX(En_IdEnrolado) As Datos FROM En_Enroler";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado == null)
    {
        echo "No Hay Datos";
    }
    else
    {
        $Datos="";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $Datos=$row['Datos'];
            
        }
        echo $Datos;
    }

?> 

