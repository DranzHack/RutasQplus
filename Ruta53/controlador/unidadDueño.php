<?php
    require_once dirname(__DIR__).'/modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->MostrarUnidadDueño();
    $html="";
    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $i=0;

        while($row=sqlsrv_fetch_array($registros1))
        {   
            $html .= 
            '<tr>
                <td>'.$row['Cb_NumeroRuta'].'</td>
                <td>'.$row['Cb_Telefono'].'</td>
                <td>'.$row['Cb_Placas'].'</td>
                <td>'.$row['Cb_Marca'].'</td>
                <td>'.$row['Cb_Modelo'].'</td>
                <td><button data-id="'.$row['Cb_IdCombi'].'" data-toggle="modal" data-target="#showResume" type="button" class="show btn btn-info">Ver Resumen</button></td>
            </tr>';
        }
        echo $html;
    }

?>
