<?php 
    require_once '../modelo/Scouts.php';
    $LaWea = new Scouts();
    $registros1 = $LaWea->MostrarUnidades();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['Cb_IdCombi'].'||'.$row['Cb_NumeroRuta'];
            $html.='<tr>
            <td>'.$row['Cb_NumeroRuta'].'</td>
            <td>'.$row['Cb_Imei'].'</td>
            <td>'.$row['Cb_Telefono'].'</td>
            <td>'.$row['Cb_Placas'].'</td>
            <td>'.$row['Cb_Marca'].'</td>
            <td>'.$row['Cb_Modelo'].'</td>
            <td>
              <button id='.$row['Cb_IdCombi'].' data-id='.$row['Cb_IdCombi'].' data-toggle="modal" data-target="#editModal"  title='.$row['Cb_IdCombi'].' type="button" class="edit btn btn-info">Actualizar</button>
              <button id="Eliminar" data-id='.$row['Cb_IdCombi'].' title='.$row['Cb_IdCombi'].' type="button" class="eliminar btn btn-danger">Eliminar</button>
            </td>
        </tr>';
        }
        echo $html;
    }
?>