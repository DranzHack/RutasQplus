<?php
    require_once dirname(__DIR__).'/conf/CnnInfo.php';
    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT top 2 *  from Chk_Check";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado==false)
    {
        echo  "<option value='0' selected>--No Hay Datos--</option>";
    }
    else
    {
        $html="<option value='0' selected>--Seleccione una Base--</option>";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $html.='<option value='.$row['Chk_IdCheck'].'>'.$row['Chk_NombreCheck'].'</option>';
            
        }
        echo $html;
    }
?> 
