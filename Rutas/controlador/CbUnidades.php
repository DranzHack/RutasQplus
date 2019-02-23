<?php
    require_once dirname(__DIR__).'/conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT * FROM Cb_Combi";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado==false)
    {
        echo  "<option value='0' selected>--No Hay Datos--</option>";
    }
    else
    {
        $html="<option value='0' selected>--Seleccione una Unidad--</option>";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $html.='<option value='.$row['Cb_IdCombi'].'>'.$row['Cb_NumeroRuta'].'</option>';
            
        }
        echo $html;
    }
?> 