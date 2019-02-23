<?php 
	session_start();
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$html = '';
	$R = $q->unidadespordueño();
	$html="";
    if($R==false)
    {
        echo 'No hay Datos';
    }
    else
    {

        while($row=sqlsrv_fetch_array($R))
        {   
            $html .= 
            '<tr>
                <td>'.$row['Cb_NumeroRuta'].'</td>
                <td>'.$row['Cb_Telefono'].'</td>
                <td>'.$row['Cb_Placas'].'</td>
                <td>'.$row['Cb_Marca'].'</td>
                <td>'.$row['Cb_Modelo'].'</td>
                <td><button data-id="'.$row['Cb_IdCombi'].'" data-toggle="modal" data-target="#showResume" type="button" class="show btn btn-info button-show">Vueltas del día</button></td>
            </tr>';
        }
        echo $html;
    }
?>