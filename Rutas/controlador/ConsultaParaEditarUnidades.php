<?php
    require_once '../conf/CnnInfo.php';


    $Laconepcion=sqlsrv_connect($serverName,$connectionOptions);

    $id=$_POST['id'];
 if(isset($id))
 {
    $Consult="SELECT * from Cb_Combi where Cb_idCombi=$id";

    $Result=sqlsrv_query($Laconepcion,$Consult);

    $row=sqlsrv_fetch_array($Result);
     echo json_encode($row);
    /*
        while($row=sqlsrv_fetch_array($Result))
        {
            $Id=$row->ideq;
            $Equipo=$row->nombreequipo;
        }
        */
}
?>