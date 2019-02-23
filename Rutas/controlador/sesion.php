<?php

    require_once '../modelo/Scouts.php';

    $x=new Scouts;
    $error='';
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

                    if($_SESSION['Privilegio']=='Administrador')
                    {
                        header("location:../vistas/Paginas/Ruta53.php");
                    }
                    else if($_SESSION['Privilegio']=='Unidad5')
                    {
                      header("location:../vistas/Paginas/Mapas/Equipo1.php");
                    }
                    else if($_SESSION['Privilegio']=='Unidad6')
                    {
                        header("location:../vistas/Paginas/Mapas/Equipo2.php");
                    }
                    else if($_SESSION['Privilegio']=='Unidad21')
                    {
                        header("location:../vistas/Paginas/Mapas/Equipo3.php");
                    }
                    else if($_SESSION['Privilegio']=='Unidad34')
                    {
                        header("location:../vistas/Paginas/PRUEBASWIALON.php");
                    }
                }
            }
            else
            {
                $error='Contraseña Incorrecta';
            }
        }
        else
        {
            $error='Llene Todos Los Campos';
        }
    }

/* REsolviendo La Wea 2
session_start();

    require_once '../modelo/Scouts.php';

    $x=new Scouts;
    $error='';
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
                    if($Datos[3]=='Coordinador')
                    {

                        header("location:../vistas/Paginas/Inicio.php");
                    }
                    else if($Datos[3] == 'Sinodal')
                    {
                        header("location:../vistas/Paginas/Calificar.php");
                    }
                }
            }
            else
            {
                $error='Contraseña Incorrecta';
            }
        }
        else
        {
            $error='Llene Todos Los Campos';
        }
    }
    */

/* Algo Bien Perro 1
    session_start();

    require_once '../modelo/Scouts.php';

    $x=new Scouts;
    $error='';
    $resultado='';

    if(isset($_POST['login']))
    {
        if($_POST['Usuario'] && $_POST['Pass'])
        {
            $Usuario=$_POST['Usuario'];
            $Contra=$_POST['Pass'];


            $resultado=$x->inicioSesion($Usuario,$Contra);
            if($resultado != '')
            {
                if($resultado=='Coordinador')
                {

                    header("location:../vistas/Paginas/Inicio.php");
                }
                else if($resultado == 'Sinodal')
                {
                    header("location:../vistas/Paginas/Calificar.php");
                }
            }
            else
            {
                $error='Contraseña Incorrecta';
            }
        }
        else
        {
            $error='Llene Todos Los Campos';
        }
    }

    */

?>
