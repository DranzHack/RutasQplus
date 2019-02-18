<?php 
require_once '../../modelo/Scooter.php';

$x=new ScoutsConsulta;
    $Algo=$_SESSION['Algo'];
    $Consultaishon='';
    $Consultaishon=$x->UserBase($Algo);

    foreach($Consultaishon as $Datos)
    {
        $User=$Datos[0];
        $Bs=$Datos[2];
    }
?>