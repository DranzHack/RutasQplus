<?php 
    require_once '../modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->unidadesEnRutaALGO();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['SLL_IdSalidaLlegada'];
            $html.='<tr>
            <td>'.$row['Cb_NumeroRuta'].'</td>
            <td>'.date_format($row['LaFecha'],'Y-m-d').'</td>
            <td>'.date_format($row['Hora'],'H:i:s A').'</td>
            <td>
              <button id='.$row['SLL_IdSalidaLlegada'].' data-id='.$row['SLL_IdSalidaLlegada'].' data-toggle="modal" data-target="#editModal"  title='.$row['Cb_NumeroRuta'].' type="button" class="edit btn btn-info">Terminar Recorrido</button>
            </td>
        </tr>';
        }
        echo $html;
    }
?>