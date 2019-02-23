<?php
    require_once '../../modelo/Scooter.php';

    $LaWea = new ScoutsConsulta();
    $registros1 = $LaWea->MostrarChoferes();

    if($registros1==false)
    {
        echo  "<option value='0' selected>--No Hay Datos--</option>";
    }
    else
    {
        $html="<option value='0' selected>--Seleccione una Base--</option>";

        while($row=sqlsrv_fetch_array($registros1))
        {
            $html.='<option value='.$row['Ch_IdChofer'].'>'.$row['Ch.NombreChofer'].'</option>';
            
        }
        echo $html;
    }
?> 