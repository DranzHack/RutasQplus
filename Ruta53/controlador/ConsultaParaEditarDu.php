<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $id=$_POST['id'];
 if(isset($id))
 {
    $Consult="SELECT D.Id_Dueño,D.NombreDueño,D.ApellidoPaterno,D.ApellidoMaterno,U.Usr_Usuario,U.id_UsrUsuario from Dueños D
                inner join Usr_Usuarios U on D.id_UsrUsuario=U.id_UsrUsuario  where D.Id_Dueño=$id";

    $Result=sqlsrv_query($Laconepcion,$Consult);

    $row=sqlsrv_fetch_array($Result);
     echo json_encode($row);
}
?>