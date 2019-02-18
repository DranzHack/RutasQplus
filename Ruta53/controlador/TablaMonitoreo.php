<?php
    require_once dirname(__DIR__).'/modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->Report();

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
            <td>'.$row['rownum'].'</td>
            <td>'.$row['Cb_NumeroRuta'].'</td>
            <td>NA</td>
            <td>'.$row['No_Vuelta'].'</td>
            <td>'.$row['Inicio'].'</td>
            <td>'.$row['B1'].'</td>
            <td>'.$row['B1B2'].'</td>
            <td>'.$row['B2'].'</td>
            <td>'.$row['B2B3'].'</td>
            <td>'.$row['B3'].'</td>
            <td>'.$row['B3B4'].'</td>
            <td>'.$row['B4'].'</td>
            <td>'.$row['B4B5'].'</td>
            <td>'.$row['B5'].'</td>
            <td>'.$row['B5B6'].'</td>
            <td>'.$row['B6'].'</td>
            <td>'.$row['B6B7'].'</td>
            <td>'.$row['B7'].'</td>
            <td>'.$row['B7B8'].'</td>
            <td>'.$row['B8'].'</td>
            <td>'.$row['B8B9'].'</td>
            <td>'.$row['B9'].'</td>
            <td>'.$row['B9B10'].'</td>
            <td>'.$row['B10'].'</td>
            <td>'.$row['B10B11'].'</td>
            <td>'.$row['B11'].'</td>
            <td>'.$row['B11B12'].'</td>
            <td>'.$row['B12'].'</td>
            <td>'.$row['B12B13'].'</td>
            <td>'.$row['B13'].'</td>
            <td>'.$row['B13B14'].'</td>
            <td>'.$row['B14'].'</td>
            <td>'.$row['Fin'].'</td>
        </tr>';
        }
        echo $html;
    }

?>
