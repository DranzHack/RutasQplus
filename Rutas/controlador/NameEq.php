<?php 
require_once '../../modelo/Scooter.php';
$Eq=$_GET['Pagina'];
$LaWea = new ScoutsConsulta();
$registros1 = $LaWea->EquipoID($Eq);
while($row1 = sqlsrv_fetch_array($registros1))
{
    $NAME=$row1['nombreequipo'];
}
echo $NAME;
?>


