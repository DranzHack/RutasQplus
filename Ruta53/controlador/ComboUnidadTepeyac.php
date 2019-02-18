<?php
    require_once '../../conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT Combi.Cb_IdCombi,Combi.Cb_NumeroRuta from En_Enroler Rol
    inner join Vl_Vueltas Vueltas on Rol.En_IdEnrolado=Vueltas.En_IdEnrolado
    inner join Ch_Chofer Chofer on Chofer.Ch_IdChofer=Rol.Ch_IdChofer
    inner join Cb_Combi Combi on Combi.Cb_IdCombi=Rol.Cb_IdCombi
    where Rol.Chk_IdCheck=1";

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