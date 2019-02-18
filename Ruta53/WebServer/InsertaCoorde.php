<?php
    require_once 'Conexcion.php';

    if(isset($_POST['Latitud']) && isset($_POST['Longitud']) && isset($_POST['Fecha']) )
    {
        //get the post variables
        $Lat=$_POST['Latitud'];
        $Lon=$_POST['Longitud'];
        $Fecha=$_POST['Fecha'];

        $Connection= new ConnectionInfo();
        $Connection->GetConection();

        if(!$Connection->Conect)
        {
            echo 'No Conecction';
        }
        else
        {
            $query="INSERT INTO Coordenadas (Latitud,Longitud,Fecha) VALUES (?,?,?)";
            $parameters=array($Lat,$Log,$Fecha);

            $stmt=sqlsrv_query($Connection->Conect,$query,$parameters);

            if(!$stmt)
            {
                echo "Query Failed";
            }
            else
            {
                echo "Insert Correct!";
            }
        }

    }
?>