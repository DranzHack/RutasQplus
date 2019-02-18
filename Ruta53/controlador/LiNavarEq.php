<?php
	require_once '../../conf/CnnInfo.php';

    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $Consulta="SELECT * FROM Equipos";

    $Resultado=sqlsrv_query($Laconepcion,$Consulta);

    if($Resultado==false)
    {
        echo  "<li><a class='dropdown-item' href='#'>No Hay Equipos</a></li>";
    }
    else
    {
        $html="<li><a class='dropdown-item' href='#'></a></li>";

        while($row=sqlsrv_fetch_array($Resultado))
        {
            $html.='<li><a class="dropdown-item" href="CalificacionEquipo.php?Pagina='.$row['ideq'].'">Equipo '.$row['nombreequipo'].'</a></li>';

        }
        echo $html;
    }
?>
