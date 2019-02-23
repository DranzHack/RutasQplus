<?php 
	session_start();
	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$html = '';
	$R = $q->unidadesEnRuta();
	while($r=sqlsrv_fetch_array($R)){
		$html .= '<li value="'.$r['Unidad'].'">'.$r['Cb_NumeroRuta'].'</li>';
	}
	echo '<ol>'.$html.'</ol>';
?>