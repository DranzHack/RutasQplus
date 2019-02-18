<?php 
    require_once '../modelo/Rutas.php';
    $LaWea = new Unidades();
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
        </tr>';
        }
        echo $html;
    }
?>