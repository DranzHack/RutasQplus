<?php
    require_once dirname(__DIR__).'/conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT * FROM Ch_Chofer";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado==false)
    {
        echo  "<option value='0' selected>--No Hay Datos--</option>";
    }
    else
    {
        $html="<option value='0' selected>--Seleccione Un Chofer--</option>";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $html.='<option value='.$row['Ch_IdChofer'].'>'.$row['Ch_NombreChofer'].' '.$row['Ch_ApellidoPaterno'].' '.$row['Ch_ApellidoMaterno'].' </option>';

        }
        echo $html;
    }
?>
