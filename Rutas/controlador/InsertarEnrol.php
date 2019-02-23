<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);

        $Unidades=$_POST['Unidades'];
        $Chofer=$_POST['Chofer'];
        $Base=$_POST['Base'];
        $Fecha=$_POST['Fecha'];
        $Hora=$_POST['Hora'];

        //echo 'Datos Enroler:'.$Unidades.' '.$Chofer.' '.$Base.' '.$Fecha;

        $VerEnrol=false;
        $VerificaOtro=false;

        $tsql= "INSERT INTO En_Enroler (Cb_IdCombi,Ch_IdChofer,Chk_IdCheck,En_Fecha,En_Hora) VALUES (?,?,?,?,?)";
        $params = array($Unidades,$Chofer,$Base,$Fecha,$Hora);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. " Unidad inserted: " . PHP_EOL);
        echo 'INSERT INTO En_Enroler (Cb_IdCombi,Ch_IdChofer,Chk_IdCheck,En_Fecha,En_Hora) VALUES ('.$Unidades.','.$Chofer.','.$Base.','.$Fecha.','.$Hora.')';  

        sqlsrv_free_stmt($getResults);
/*
        
            require_once 'MostrarEnroler.php';
            $IdDato=$Datos;
            $Vuelta=1;
            //$Enrol=0;
            
            //foreach($IdDato as $dates)
            //{
                //$Enrol=$dates['0'];
            //}
            
        

        $Insert2= "INSERT INTO Vl_Vueltas (En_IdEnrolado,Vl_Vuelta) VALUES (?,?)";
        $params2 = array($IdDato,$Vuelta);
        $getResults2= sqlsrv_query($conection, $Insert2, $params2);
        $rowsAffected2 = sqlsrv_rows_affected($getResults2);
        if ($getResults2 == FALSE or $rowsAffected2 == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected2. "1 Vuelta inserted: " . PHP_EOL);

        sqlsrv_free_stmt($getResults2);
*/


function FormatErrors( $errors )
{
    
    echo "Error information: ";

    foreach ( $errors as $error )
    {
        echo "SQLSTATE: ".$error['SQLSTATE']."";
        echo "Code: ".$error['code']."";
        echo "Message: ".$error['message']."";
    }
}

?>
