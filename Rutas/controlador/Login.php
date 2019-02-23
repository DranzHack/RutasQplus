<?php
session_start();
$Username=$_POST['Usuario'];
$Pass=$_POST['Pass'];

require_once '../modelo/Rutas.php';

$ElOGTO=new Unidades;
if(empty($Username)||empty($Pass))
{
    echo 'Porfavor Inserte Todos Los Campos';
}

else
{
    $Username=$ElOGTO->validarcaracteres($Username);
    $Pass=$ElOGTO->validarcaracteres($Pass);

    $Dates=$ElOGTO->Login($Username,$Pass);

    if($Dates==false)
    {
        echo 'Los Datos Ingresados no Coinciden';
    }
    else
    {
        foreach($Dates as $Datos)
        {
            session_start();
            $_SESSION['LaWeaQueConoce']=$Datos[0];
            $_SESSION['Usuario']=$Datos[1];
            $_SESSION['privilegio']=$Datos[3];

            if($_SESSION['privilegio']=='Administrador')
            {
                //header("location:../vistas/Paginas/Ruta53.php");
                //header("location:../vistas/Paginas/Ruta53.php");
                echo "1";

                //echo '<script language="JavaScript">location.href = "../vistas/Paginas/Ruta53.php"</script>';
            }
            else if($_SESSION['privilegio']=='Unidad')
            {
                echo "2";
            }
        }

    }
}


/*
    require_once '../modelo/Scouts.php';

    $x=new Scouts;
    #$error=''; 
    $resultado='';

    if(isset($_POST['login']))
    {
        if($_POST['Usuario'] && $_POST['Pass'])
        {
            $Usuario=$_POST['Usuario'];
            $Contra=$_POST['Pass'];
            

            $resultado=$x->LaSesion($Usuario,$Contra);
            if($resultado == true)
            {
                foreach($resultado as $Datos)
                {
                    session_start();
                    $_SESSION['Algo']=$Datos[0];
                    $_SESSION['Usuario']=$Datos[1];
                    $_SESSION['Privilegio']=$Datos[3];
                    
                    if($_SESSION['Privilegio']=='Ruta')
                    {
                        header("location:../vistas/Paginas/Ruta53.php");
                    }
                }
            }
            else
            {
                echo 'Contraseña Incorrecta';
            }
        }
        else
        {
            echo 'Llene Todos Los Campos';
        }
    }
    */
    
?>