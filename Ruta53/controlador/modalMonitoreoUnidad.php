<?php 
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$LaWea = new Unidades();
	$html = "";

	if($_POST['unidad']){
		$Registros=$LaWea->modalMonitoreoUnidad($_POST['unidad']);
		if($Registros){
			while($row=sqlsrv_fetch_array($Registros)){
				$html .=
				'<tr>
					<td>'.$row['No_Vuelta'].'</td>
					<td>'.$row['Cb_NumeroRuta'].'</td>
					<td>'.$row['Ch_NombreChofer'].' '.$row['Ch_ApellidoPaterno'].' '.$row['Ch_ApellidoMaterno'].'</td>
					<td>'.$row['Inicio'].'</td>
					<td>'.$row['B1'].'</td>
					<td>'.$row['B2'].'</td>
					<td>'.$row['B3'].'</td>
					<td>'.$row['B4'].'</td>
					<td>'.$row['B5'].'</td>
					<td>'.$row['B6'].'</td>
					<td>'.$row['B7'].'</td>
					<td>'.$row['B8'].'</td>
					<td>'.$row['B9'].'</td>
					<td>'.$row['B10'].'</td>
					<td>'.$row['B11'].'</td>
					<td>'.$row['B12'].'</td>
					<td>'.$row['B13'].'</td>
					<td>'.$row['B14'].'</td>
					<td>'.$row['Fin'].'</td>
				</tr>';
			}
		}
	}
?>
<table class="table table-hover text-center">
	<thead>
		<th>No de Vuelta</th>
		<th>Unidad</th>
		<th>Chofer</th>
		<th>Inicio</th>
		<th>B1</th>
		<th>B2</th>
		<th>B3</th>
		<th>B4</th>
		<th>B5</th>
		<th>B6</th>
		<th>B7</th>
		<th>B8</th>
		<th>B9</th>
		<th>B10</th>
		<th>B11</th>
		<th>B12</th>
		<th>B13</th>
		<th>B14</th>
		<th>Fin</th>
	</thead>
	<tbody>
		<?php echo $html ?>
	</tbody>
</table>