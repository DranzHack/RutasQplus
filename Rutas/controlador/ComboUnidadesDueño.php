<?php
    require_once dirname(__DIR__).'/conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="
            select C.* 
            from 
                Cb_Combi C,
                Dueño_Combi P,
                Usr_Usuarios U,
                Dueños D
            where 
                P.Cb_IdCombi = C.Cb_IdCombi and 
                P.Id_Dueño = D.Id_Dueño and
                D.id_UsrUsuario = U.id_UsrUsuario AND
                U.id_UsrUsuario = ".$_SESSION['LaWeaQueConoce'];

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