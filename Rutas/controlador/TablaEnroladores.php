<?php 
    require_once '../modelo/Scouts.php';
    $LaWea = new Scouts();
    $registros1 = $LaWea->MostrarEnrolados();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['En_IdEnrolado'].'||'.$row['Cb_NumeroRuta'];
            $html.='<tr>
            <td>'.$row['Cb_NumeroRuta'].'</td>
            <td>'.$row['Ch_NombreChofer'].' '.$row['Ch_ApellidoPaterno'].' '.$row['Ch_ApellidoMaterno'].'</td>
            <td>'.$row['Cb_Telefono'].'</td>
            <td>'.$row['Cb_Placas'].'</td>
            <td>'.$row['Cb_Marca'].'</td>
            <td>'.$row['Cb_Modelo'].'</td>
            <td>'.date_format($row['En_Fecha'],"Y-m-d").'</td>
            <td>'.date_format($row['En_Hora'],"H:i:s A").'</td>
            <td>
              <button id='.$row['En_IdEnrolado'].' data-id='.$row['En_IdEnrolado'].' data-toggle="modal" data-target="#editModal"  title='.$row['En_IdEnrolado'].' type="button" class="edit btn btn-info">Actualizar</button>
              <button id="Eliminar" data-id='.$row['En_IdEnrolado'].' title='.$row['En_IdEnrolado'].' type="button" class="eliminar btn btn-danger">Eliminar</button>
            </td>
        </tr>';
        }
        echo $html;
    }
?>