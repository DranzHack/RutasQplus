<?php 
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$html = '';
	$R = $q->resumeUnidadTiempo();
	while($r=sqlsrv_fetch_array($R)){
		$html .= "<li>".$r['Cb_NumeroRuta']." ".$r['Hora']->format('dd-MM-yyyy')."</li>";
	}
	echo '<ol>'.$html.'</ol>';
?>