<?php 
    require_once '../modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->MostrarChoferes();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['Ch_IdChofer'];
            $html.='<tr>
            <td>'.$row['Ch_NombreChofer'].'</td>
            <td>'.$row['Ch_ApellidoPaterno'].'</td>
            <td>'.$row['Ch_ApellidoMaterno'].'</td>
            <td>'.$row['Ch_Licencia'].'</td>
            <td>
              <button id='.$row['Ch_IdChofer'].' data-id='.$row['Ch_IdChofer'].' data-toggle="modal" data-target="#editModal"  title='.$row['Ch_IdChofer'].' type="button" class="edit btn btn-info">Actualizar</button>
              <button id="Eliminar" data-id='.$row['Ch_IdChofer'].' title='.$row['Ch_IdChofer'].' type="button" class="eliminar btn btn-danger">Eliminar</button>
            </td>
        </tr>';
        }
        echo $html;
    }
?>