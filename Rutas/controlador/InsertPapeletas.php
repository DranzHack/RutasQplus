<?php
    require_once '../conf/CnnInfo.php';

    $conection=sqlsrv_connect($serverName,$connectionOptions);




//Datos Pestalozzi
        $Codigo=$_POST['mCode'];
        $FechaP=$_POST['fechpes'];
        $HoraP=$_POST['hrapes'];
        $Metodo='Manual';

        echo $Codigo;
        echo '<br>';
        echo $FechaP;
        echo '<br>';
        echo $HoraP;
        echo '<br>';
        echo $Metodo;
        echo '<br>';

        //echo 'Datos Enroler:'.$Unidades.' '.$Chofer.' '.$Base.' '.$Fecha;
/*
        $VerEnrol=false;
        $VerificaOtro=false;

        $tsql= "INSERT INTO En_Enroler (Cb_IdCombi,Ch_IdChofer,Chk_IdCheck,En_Fecha,En_Hora) VALUES (?,?,?,?,?)";
        $params = array($Unidades,$Chofer,$Base,$Fecha,$Hora);
        $getResults= sqlsrv_query($conection, $tsql, $params);
        $rowsAffected = sqlsrv_rows_affected($getResults);
        if ($getResults == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. " Unidad inserted: " . PHP_EOL);

        sqlsrv_free_stmt($getResults);
*/
        
        $FechaI=$_POST['fechistep'];
        $HoraI=$_POST['hraistep'];


        echo $Codigo;
        echo '<br>';
        echo $FechaI;
        echo '<br>';
        echo $HoraI;
        echo '<br>';
        echo $Metodo;
        echo '<br>';
 /*                   
        

        $Insert2= "INSERT INTO Vl_Vueltas (En_IdEnrolado,Vl_Vuelta) VALUES (?,?)";
        $params2 = array($IdDato,$Vuelta);
        $getResults2= sqlsrv_query($conection, $Insert2, $params2);
        $rowsAffected2 = sqlsrv_rows_affected($getResults2);
        if ($getResults2 == FALSE or $rowsAffected2 == FALSE)
            die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected2. "1 Vuelta inserted: " . PHP_EOL);

        sqlsrv_free_stmt($getResults2);
        
*/
        require_once '../modelo/Rutas.php';
        $LOL=new Unidades;
        $Valor1="";
        $Valor2="";
        $Valores=$LOL->DevuelveResultado($Codigo);
        foreach ($Valores as $Datos) {
            $Valor1=$Datos[0];
            $Valor2=$Datos[1];
        }
        echo $Valor1;
        echo $Valor2;
/*

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
*/
?>
