<?php
    require_once dirname(__DIR__).'/conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT * FROM Dueños";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado==false)
    {
        echo  "<option value='0' selected>--No Hay Datos--</option>";
    }
    else
    {
        $html="<option value='0' selected>--Seleccione Un Usuario--</option>";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $html.='<option value='.$row['Id_Dueño'].'>'.$row['NombreDueño'].' '.$row['ApellidoPaterno'].' '.$row['ApellidoMaterno'].'</option>';
            
        }
        echo $html;
    }
?> 