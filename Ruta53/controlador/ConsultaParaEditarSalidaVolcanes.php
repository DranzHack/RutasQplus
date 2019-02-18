<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $id=$_POST['id'];
 if(isset($id))
 {
    $Consult="SELECT Rol.En_IdEnrolado,Vl_IdVuelta,Combi.Cb_IdCombi,Chofer.Ch_IdChofer,Rol.Chk_IdCheck,Rol.En_Fecha,En_Hora,Vueltas.Vl_Vuelta from En_Enroler Rol
    inner join Vl_Vueltas Vueltas on Rol.En_IdEnrolado=Vueltas.En_IdEnrolado
    inner join Ch_Chofer Chofer on Chofer.Ch_IdChofer=Rol.Ch_IdChofer
    inner join Cb_Combi Combi on Combi.Cb_IdCombi=Rol.Cb_IdCombi
    where Rol.Chk_IdCheck=2 and Rol.En_IdEnrolado=$id";

    $Result=sqlsrv_query($Laconepcion,$Consult);

    $row=sqlsrv_fetch_array($Result);
     echo json_encode($row);
}
?>