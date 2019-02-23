<?php 
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$html = '';

	if($_POST['unidad'] && $_POST['fecha']){
		$R = $q->corridasUnidad();
		while($r=sqlsrv_fetch_array($R)){
			$html .= '<option value="'.$r['corrida'].'">'.$r['hora']->format('H:m').'</option>';
		}
		$html.=$html==''?'<option value="" disabled selected>No hubo recorridos en esta fecha</option>':'<option value="" disabled selected>Seleccione un recorrido</option>';
		echo $html;
	}
?>