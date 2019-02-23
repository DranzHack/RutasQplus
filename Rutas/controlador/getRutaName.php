<?php

	require_once dirname(__DIR__).'/modelo/Rutas.php';
	$q = new Unidades();
	$R = $q->RutaInfoSession();
  $nombre='';
  if($_SESSION['idruta']){
	 while($r=sqlsrv_fetch_array($R)){
	 	$nombre = $r['nombre'];
	 }
  }
  echo $nombre?$nombre:'Sistema de Monitoreo';
?>