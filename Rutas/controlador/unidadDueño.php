<?php
    require_once dirname(__DIR__).'/conf/Server_conection.php';
    $srv=new server();
      $query="
            select C.* 
            from 
                Cb_Combi C,
                Dueño_Combi P,
                Usr_Usuarios U,
                Dueños D
            where 
                P.Cb_IdCombi = C.Cb_IdCombi and 
                P.Id_Dueño = D.Id_Dueño and
                D.id_UsrUsuario = U.id_UsrUsuario AND
                U.id_UsrUsuario = ".$_SESSION['LaWeaQueConoce'];
      echo $query;
      $conn=sqlsrv_connect('192.168.0.126',array("Database"=>"DB_Ruta53","UID"=>"SA","PWD"=>"SA"));
      echo $conn?1:2;
      $Register=sqlsrv_query($conn,$query);

/*    $registros1 = $LaWea->RutaInfoSession();
    $html="";
    if($registros1==false)
    {
        echo 'No hay Datos';
    }
    else
    {

        while($row=sqlsrv_fetch_array($registros1))
        {   
            $html .= 
            '<tr>
                <td>'.$row['Cb_NumeroRuta'].'</td>
                <td>'.$row['Cb_Telefono'].'</td>
                <td>'.$row['Cb_Placas'].'</td>
                <td>'.$row['Cb_Marca'].'</td>
                <td>'.$row['Cb_Modelo'].'</td>
                <td><button data-id="'.$row['Cb_IdCombi'].'" data-toggle="modal" data-target="#showResume" type="button" class="show btn btn-info">Ver Resumen</button></td>
            </tr>';
        }
        echo $html;
    }*/

?>
