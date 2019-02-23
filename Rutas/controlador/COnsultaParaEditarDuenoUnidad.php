<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $id=$_POST['id'];

    
 if(isset($id))
 {
    $Consult="select * from Dueño_Combi where IdDueñoCombi=$id";

    $Result=sqlsrv_query($Laconepcion,$Consult);

    $row=sqlsrv_fetch_array($Result);
     echo json_encode($row);
}

?>