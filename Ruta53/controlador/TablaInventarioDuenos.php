<?php 
    require_once '../modelo/Rutas.php';
    $LaWea = new Unidades();
    $registros1 = $LaWea->MostrarDueños();         

    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {
        $html="";
        while($row=sqlsrv_fetch_array($registros1))
        {
            $Datos= $row['Id_Dueño'];
            $html.='<tr>
            <td>'.$row['NombreDueño'].'</td>
            <td>'.$row['ApellidoPaterno'].'</td>
            <td>'.$row['ApellidoMaterno'].'</td>
            <td>'.$row['Usr_Usuario'].'</td>
            <td>
              <button id='.$row['Id_Dueño'].' data-id='.$row['Id_Dueño'].' data-toggle="modal" data-target="#editModal"  title='.$row['Id_Dueño'].' type="button" class="edit btn btn-info">Actualizar</button>
              <button id="Eliminar" data-id='.$row['Id_Dueño'].' title='.$row['Id_Dueño'].' type="button" class="eliminar btn btn-danger">Eliminar</button>
            </td>
        </tr>';
        }
        echo $html;
    }
?>