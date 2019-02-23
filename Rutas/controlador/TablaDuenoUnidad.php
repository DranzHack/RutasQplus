<?php 
    require_once '../modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->MostrarDueñoUnidad();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['IdDueñoCombi'];
            $html.='<tr>
                    <td>'.$row['NombreDueño'].' '.$row['ApellidoPaterno'].' '.$row['ApellidoMaterno'].'</td>
                    <td>'.$row['Cb_NumeroRuta'].'</td>
                    <td>
                       <button id='.$row['IdDueñoCombi'].' data-id='.$row['IdDueñoCombi'].' data-toggle="modal" data-target="#editModalDU"  title='.$row['IdDueñoCombi'].' type="button" class="editDU btn btn-info">Actualizar</button>
              <button id="EliminarDU" data-id='.$row['IdDueñoCombi'].' title='.$row['IdDueñoCombi'].' type="button" class="eliminar btn btn-danger">Eliminar</button>
                    </td>
                </tr>';
        }
        echo $html;
    }
?>