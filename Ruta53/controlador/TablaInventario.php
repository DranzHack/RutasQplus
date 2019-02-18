<?php

require_once '../../modelo/Scouts.php';
    $LaWea = new Scouts();
    $registros1 = $LaWea->DemoTimeAlgo();

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
            <td>'.$row['Cb_NumeroDeRuta'].'</td>
            <td>'.$row['Cb_Placas'].'</td>
            <td>'.$row['Cb_Marca'].'</td>
            <td>'.$row['Cb_Modelo'].'</td>
            <td>Build</td>
        </tr>';
        }
        echo $html;
    }


/*
    require_once '../../modelo/Scooter.php';

    echo "<table class='table table-hover table-responsive text-center '>  ";

    $LaWea = new ScoutsConsulta();
    $registros1 = $LaWea->InventarioCombis();



    echo "<thead>";
    echo    "<tr>";
        echo    "<th class='text-center' colspan='13'>Inventario Combis</th>";
        echo    "</tr>";
        echo    "<tr>";
        echo    "<th class='text-center'>Numero Comercial</th>";
        echo    "<th class='text-center'>Placas</th>";
        echo    "<th class='text-center'>Marca</th>";
        echo    "<th class='text-center'>Moelo</th>";
        echo    "</tr>";
    echo "</thead>";

    while($row1 = sqlsrv_fetch_array($registros1))
    {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>";
        echo $row1['Cb_NumeroDeRuta'];
        echo "</td>";
        echo "<td>";
        echo $row1['Cb_Placas'];
        echo "</td>";
        echo "<td>";
        echo $row1['Cb_Marca'];
        echo "</td>";
        echo "<td>";
        echo $row1['Cb_Modelo'];
        echo "</td>";
        echo "</tr>";
        echo "</tbody>";
    }

    echo "</table>";
    */
   
?>

