<?php
 require_once dirname(__DIR__).'/conf/Server_conection.php';
 error_reporting(E_ALL ^ E_NOTICE);
 class Unidades{
     var $srv;

     function Unidades()
     {
         $this->srv=new server();
     }


     public function validarcaracteres($mivariable)
    {
      $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
      $caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
      $caracter = htmlentities(str_replace($caracteres_malos, $caracteres_buenos, $mivariable));
      return $caracter;
    }


     public function Confirmar_Usuarios($Usuario,$Password)
    {
      $query = "SELECT lg_idlogin,lg_user,lg_pass,lg_TipoPersona FROM lg_login
            WHERE(lg_user = '$Usuario') AND lg_pass = '$Password'";

      if($Data = $this->ExecuteQuery($query))
      {
        $Datos = array();
        $Filas = 0;
        while($Resultado = $this->obtener_fila($Data))
        {
          $Datos[$Filas][0] = $Resultado['lg_idlogin'];
          $Datos[$Filas][1] = $Resultado['lg_user'];
          $Datos[$Filas][2] = $Resultado['lg_pass'];
          $Datos[$Filas][3] = $Resultado['lg_TipoPersona'];
        }
        return $Datos;
      }
      else
        return false;
    }

    public function UsuarioConectado($Usuario)
    {
      $query="SELECT u.Usr_Usuario,c.Cb_NumeroRuta from Dueño_Combi du
              inner join Dueños d on d.Id_Dueño=du.Id_Dueño
              inner join Cb_Combi c on c.Cb_IdCombi=du.Cb_IdCombi
              inner join Usr_Usuarios u on u.id_UsrUsuario=d.id_UsrUsuario
              where u.id_UsrUsuario=$Usuario";

        if($Data=$this->ExecuteQuery($query))
        {
          $Datos=array();
          $Filas=0;
          while($Resultado = $this->obtener_fila($Data))
          {
            $Datos[$Filas][0] = $Resultado['Usr_Usuario'];
            $Datos[$Filas][1] = $Resultado['Cb_NumeroRuta'];
          }
          return $Datos;
        }
        else
          return false;
    }

    function Login($usuario,$contra)
     {
         $query = "SELECT id_UsrUsuario,Usr_Usuario,Usr_Password,Usr_Tipo FROM Usr_Usuarios where (Usr_Usuario= '$usuario') AND Usr_Password = '$contra'  ";
         $registros=sqlsrv_query($this->srv->conectar(),$query);

         if($registros === false)
             die(print_r(sqlsrv_errors(),true));

        while($row=sqlsrv_fetch_object($registros))
        {
            $Datos=array();
            $Filas=0;
                $Datos[$Filas][0]=$row->id_UsrUsuario;
                $Datos[$Filas][1]=$row->Usr_Usuario;
                $Datos[$Filas][2]=$row->Usr_Password;
                $Datos[$Filas][3]=$row->Usr_Tipo;
            }
            return $Datos;

            $this->srv->desconectar();
        }
        
     function MostrarUnidades()
     {
         //$query = "SELECT * From Usr_Bs";
         $query = "Select * from Cb_Combi";
         $registers=sqlsrv_query($this->srv->conectar(),$query);
         return $registers;
         $this->srv->desconectar();
     }

     function MostrarChoferes()
     {
         //$query = "SELECT * From Usr_Bs";
         $query = "Select * from Ch_Chofer";
         $registers=sqlsrv_query($this->srv->conectar(),$query);
         return $registers;
         $this->srv->desconectar();
     }

     function MostrarDueños()
     {
      $query = "SELECT D.Id_Dueño,D.NombreDueño,D.ApellidoPaterno,D.ApellidoMaterno,U.Usr_Usuario,U.id_UsrUsuario from Dueños D
                inner join Usr_Usuarios U on D.id_UsrUsuario=U.id_UsrUsuario";
      $register=sqlsrv_query($this->srv->conectar(),$query);
      return $register;
      $this->srv->desconectar();
     }

     function MostrarDueñoUnidad()
     {
      $query="SELECT DU.IdDueñoCombi,D.NombreDueño,D.ApellidoPaterno,D.ApellidoMaterno,Com.Cb_NumeroRuta from Dueño_Combi DU
              inner join Dueños D on D.Id_Dueño=DU.Id_Dueño
              inner join Cb_Combi Com on Com.Cb_IdCombi=DU.Cb_IdCombi";
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     function MostrarUsuarios()
     {
      $query = "SELECT * FROM Usr_Usuarios";
      $registers=sqlsrv_query($this->srv->conectar(),$query);
      return $registers;
      $this->srv->desconectar();
     }

    function UltimoIdEnroler()
    {
        $query = "SELECT MAX(En_IdEnrolado) as Dato from En_Enroler";
        $registers=sqlsrv_query($this->srv->conectar(),$query);
        return $registers;
        $this->srv->desconectar();
    }

     function MostrarEnrolados()
     {
         //$query = "SELECT * From Usr_Bs";
         $query = "
         SELECT Rol.En_IdEnrolado,com.Cb_IdCombi,ch.Ch_IdChofer,com.Cb_NumeroRuta,ch.Ch_NombreChofer,
         ch.Ch_ApellidoPaterno,ch.Ch_ApellidoMaterno,com.Cb_Placas,com.Cb_Marca,com.Cb_Modelo
         ,com.Cb_Telefono,Rol.En_Fecha,Rol.En_Hora
         from En_Enroler Rol
         inner join Cb_Combi com on com.Cb_IdCombi=Rol.Cb_IdCombi
         inner join Ch_Chofer ch on ch.Ch_IdChofer=Rol.Ch_IdChofer
";
         $registers=sqlsrv_query($this->srv->conectar(),$query);
         return $registers;
         $this->srv->desconectar();
     }

     function MostrarSalidas()
     {
         $query="SELECT Chofer.Ch_NombreChofer,Chofer.Ch_ApellidoPaterno,Chofer.Ch_ApellidoMaterno,Combi.Cb_NumeroRuta,Enrol.En_fecha,Vuelta.Vl_Inicio from Vl_Vueltas Vuelta
         inner join En_Enroler Enrol on Enrol.En_IdEnrolado=Vuelta.En_IdEnrolado
         inner join Cb_Combi Combi on Combi.Cb_IdCombi=Enrol.Cb_IdCombi
         inner join Ch_Chofer Chofer on Chofer.Ch_IdChofer=Enrol.Ch_IdChofer";
         $registers=sqlsrv_query($this->srv->conectar(),$query);
         return $registers;
         $this->srv->desconectar();
     }

     function MostrarSalidaTepeyac()
     {
        $query="SELECT Rol.En_IdEnrolado,Vl_IdVuelta,Combi.Cb_NumeroRuta,Chofer.Ch_NombreChofer,Chofer.Ch_ApellidoPaterno,Chofer.Ch_ApellidoMaterno,Rol.En_Fecha,Rol.En_Hora,Vueltas.Vl_Vuelta from En_Enroler Rol
        inner join Vl_Vueltas Vueltas on Rol.En_IdEnrolado=Vueltas.En_IdEnrolado
        inner join Ch_Chofer Chofer on Chofer.Ch_IdChofer=Rol.Ch_IdChofer
        inner join Cb_Combi Combi on Combi.Cb_IdCombi=Rol.Cb_IdCombi
        where Rol.Chk_IdCheck=1";
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

     function MostrarSalidaVolvanes()
     {
        $query="SELECT Rol.En_IdEnrolado,Vl_IdVuelta,Combi.Cb_NumeroRuta,Chofer.Ch_NombreChofer,Chofer.Ch_ApellidoPaterno,Chofer.Ch_ApellidoMaterno,Rol.En_Fecha,Rol.En_Hora,Vueltas.Vl_Vuelta from En_Enroler Rol
        inner join Vl_Vueltas Vueltas on Rol.En_IdEnrolado=Vueltas.En_IdEnrolado
        inner join Ch_Chofer Chofer on Chofer.Ch_IdChofer=Rol.Ch_IdChofer
        inner join Cb_Combi Combi on Combi.Cb_IdCombi=Rol.Cb_IdCombi
        where Rol.Chk_IdCheck=2";
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

     function MostrarParEquipo()
     {
         $query="select pa.idparti, pa.nombre,pa.telefono,pa.edad,eq.nombreequipo from participante pa inner join Equipos eq on pa.nombreequipo=eq.ideq ORDER by eq.nombreequipo";
         $register=sqlsrv_query($this->srv->conectar(),$query);
         return $register;
         $this->srv->desconectar();
     }

 

     function DemoTimeAlgo()
     {
        $query="SELECT Cb_NumeroRuta,Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,ISNULL(CONVERT(varchar,Base1,121),'No Check') as B1,ISNULL(CONVERT(varchar,Base2,121),'No Check')AS B2,ISNULL(CONVERT(varchar,Base3,121),'No Check')As B3,ISNULL(CONVERT(varchar,Base4,121),'No Check')As B4,ISNULL(CONVERT(varchar,Base5,121),'No Check')As B5,
ISNULL(CONVERT(varchar,Base6,121),'No Check')As B6,ISNULL(CONVERT(varchar,Base7,121),'No Check')As B7,ISNULL(CONVERT(varchar,Base8,121),'No Check')As B8,ISNULL(CONVERT(varchar,Base9,121),'No Check')AS B9,ISNULL(CONVERT(varchar,Base10,121),'No Check')As B10,
ISNULL(CONVERT(varchar,Base11,121),'No Check')As B11,ISNULL(CONVERT(varchar,Base12,121),'No Check')As B12,ISNULL(CONVERT(varchar,Base13,121),'No Check')As B13,ISNULL(CONVERT(varchar,Base14,121),'No Check')As B14,
(DATEDIFF(MINUTE,Base1,Base2))AS B1B2,
(DATEDIFF(MINUTE,Base2,Base3))AS B2B3,
(DATEDIFF(MINUTE,Base3,Base4))AS B3B4,
(DATEDIFF(MINUTE,Base4,Base5))AS B4B5,
(DATEDIFF(MINUTE,Base5,Base6))AS B5B6,
(DATEDIFF(MINUTE,Base6,Base7))AS B6B7,
(DATEDIFF(MINUTE,Base7,Base8))AS B7B8,
(DATEDIFF(MINUTE,Base8,Base9))AS B8B9,
(DATEDIFF(MINUTE,Base9,Base10))AS B9B10,
(DATEDIFF(MINUTE,Base10,Base11))AS B10B11,
(DATEDIFF(MINUTE,Base11,Base12))AS B11B12,
(DATEDIFF(MINUTE,Base12,Base13))AS B12B13,
(DATEDIFF(MINUTE,Base13,Base14))AS B13B14,
(DATEDIFF(MINUTE,Base14,Base15))AS B14B15
 from PruebaReporting
";

        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

     function Report()
     {

        $query="SELECT ROW_NUMBER() OVER(ORDER BY Inicio) AS rownum, Cb_NumeroRuta,No_Vuelta,Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,
                        ISNULL(CONVERT(varchar,Inicio,121),'No Cheking')AS Inicio,
                        ISNULL(CONVERT(varchar,B1,121),'No checking')AS B1,ISNULL(CONVERT(varchar,B2,121),'No checking')AS B2,
                        ISNULL(CONVERT(varchar,B3,121),'No checking')AS B3,ISNULL(CONVERT(varchar,B4,121),'No checking')AS B4,
                        ISNULL(CONVERT(varchar,B5,121),'No checking')AS B5,ISNULL(CONVERT(varchar,B6,121),'No checking')AS B6,
                        ISNULL(CONVERT(varchar,B7,121),'No checking')AS B7,ISNULL(CONVERT(varchar,B8,121),'No checking')AS B8,
                        ISNULL(CONVERT(varchar,B9,121),'No checking')AS B9,ISNULL(CONVERT(varchar,B10,121),'No checking')AS B10,
                        ISNULL(CONVERT(varchar,B11,121),'No checking')AS B11,ISNULL(CONVERT(varchar,B12,121),'No checking')AS B12,
                        ISNULL(CONVERT(varchar,B13,121),'No checking')AS B13,ISNULL(CONVERT(varchar,B14,121),'No checking')AS B14,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B1,B2)),121),'No Check') AS B1B2,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B2,B3)),121),'No Check') AS B2B3,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B3,B4)),121),'No Check') AS B3B4,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B4,B5)),121),'No Check') AS B4B5,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B5,B6)),121),'No Check') AS B5B6,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B6,B7)),121),'No Check') AS B6B7,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B7,B8)),121),'No Check') AS B7B8,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B8,B9)),121),'No Check') AS B8B9,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B9,B10)),121),'No Check') AS B9B10,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B10,B11)),121),'No Check') AS B10B11,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B11,B12)),121),'No Check') AS B11B12,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B12,B13)),121),'No Check') AS B12B13,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B13,B14)),121),'No Check') AS B13B14,
                        ISNULL(CONVERT(varchar,Fin,121),'No Checking') As Fin
                        from Report2 ".($_POST['fecha']?"where Inicio like '%".$_POST['fecha']."%'":"")." ".
                        ($_POST['unidad']?"where Cb_NumeroRuta = (select Cb_NumeroRuta from Cb_Combi where Cb_IdCombi = '".$_POST['unidad']."')":"")
                        ." order by Inicio";
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }


    function ReportUnidad()
     {

        $query="SELECT ROW_NUMBER() OVER(ORDER BY Inicio) AS rownum, Cb_NumeroRuta,No_Vuelta,Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,
                        ISNULL(CONVERT(varchar,Inicio,121),'No Cheking')AS Inicio,
                        ISNULL(CONVERT(varchar,B1,121),'No checking')AS B1,ISNULL(CONVERT(varchar,B2,121),'No checking')AS B2,
                        ISNULL(CONVERT(varchar,B3,121),'No checking')AS B3,ISNULL(CONVERT(varchar,B4,121),'No checking')AS B4,
                        ISNULL(CONVERT(varchar,B5,121),'No checking')AS B5,ISNULL(CONVERT(varchar,B6,121),'No checking')AS B6,
                        ISNULL(CONVERT(varchar,B7,121),'No checking')AS B7,ISNULL(CONVERT(varchar,B8,121),'No checking')AS B8,
                        ISNULL(CONVERT(varchar,B9,121),'No checking')AS B9,ISNULL(CONVERT(varchar,B10,121),'No checking')AS B10,
                        ISNULL(CONVERT(varchar,B11,121),'No checking')AS B11,ISNULL(CONVERT(varchar,B12,121),'No checking')AS B12,
                        ISNULL(CONVERT(varchar,B13,121),'No checking')AS B13,ISNULL(CONVERT(varchar,B14,121),'No checking')AS B14,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B1,B2)),121),'No Check') AS B1B2,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B2,B3)),121),'No Check') AS B2B3,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B3,B4)),121),'No Check') AS B3B4,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B4,B5)),121),'No Check') AS B4B5,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B5,B6)),121),'No Check') AS B5B6,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B6,B7)),121),'No Check') AS B6B7,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B7,B8)),121),'No Check') AS B7B8,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B8,B9)),121),'No Check') AS B8B9,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B9,B10)),121),'No Check') AS B9B10,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B10,B11)),121),'No Check') AS B10B11,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B11,B12)),121),'No Check') AS B11B12,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B12,B13)),121),'No Check') AS B12B13,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B13,B14)),121),'No Check') AS B13B14,
                        ISNULL(CONVERT(varchar,Fin,121),'No Checking') As Fin
                        from Report2 where Inicio like '%".date('Y-m-d')."%' AND 
                        Cb_NumeroRuta = (select Cb_NumeroRuta from Cb_Combi where Cb_IdCombi = '".$_POST['unidad']."') order by Inicio";
        //echo $query;
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

    function ReportUnidadDueno()
     {
      $fecha = date('Y-m-d');
      if($_POST['fecha']){
        $fecha = $_POST['fecha'];
      }
      $query="
        SELECT U.Cb_IdCombi,DC.IdDueñoCombi,D.Id_Dueño,Us.Usr_Usuario, Y.* from (
SELECT ROW_NUMBER() OVER(ORDER BY Inicio) AS rownum, Cb_NumeroRuta,No_Vuelta,Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,
                        ISNULL(CONVERT(varchar,Inicio,121),'No Cheking')AS Inicio,
                        ISNULL(CONVERT(varchar,B1,121),'No checking')AS B1,ISNULL(CONVERT(varchar,B2,121),'No checking')AS B2,
                        ISNULL(CONVERT(varchar,B3,121),'No checking')AS B3,ISNULL(CONVERT(varchar,B4,121),'No checking')AS B4,
                        ISNULL(CONVERT(varchar,B5,121),'No checking')AS B5,ISNULL(CONVERT(varchar,B6,121),'No checking')AS B6,
                        ISNULL(CONVERT(varchar,B7,121),'No checking')AS B7,ISNULL(CONVERT(varchar,B8,121),'No checking')AS B8,
                        ISNULL(CONVERT(varchar,B9,121),'No checking')AS B9,ISNULL(CONVERT(varchar,B10,121),'No checking')AS B10,
                        ISNULL(CONVERT(varchar,B11,121),'No checking')AS B11,ISNULL(CONVERT(varchar,B12,121),'No checking')AS B12,
                        ISNULL(CONVERT(varchar,B13,121),'No checking')AS B13,ISNULL(CONVERT(varchar,B14,121),'No checking')AS B14,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B1,B2)),121),'No Check') AS B1B2,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B2,B3)),121),'No Check') AS B2B3,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B3,B4)),121),'No Check') AS B3B4,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B4,B5)),121),'No Check') AS B4B5,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B5,B6)),121),'No Check') AS B5B6,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B6,B7)),121),'No Check') AS B6B7,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B7,B8)),121),'No Check') AS B7B8,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B8,B9)),121),'No Check') AS B8B9,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B9,B10)),121),'No Check') AS B9B10,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B10,B11)),121),'No Check') AS B10B11,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B11,B12)),121),'No Check') AS B11B12,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B12,B13)),121),'No Check') AS B12B13,
                        ISNULL(CONVERT(varchar,(DATEDIFF(MINUTE,B13,B14)),121),'No Check') AS B13B14,
                        ISNULL(CONVERT(varchar,Fin,121),'No Checking') As Fin
                        from
                            Report2
                        where 
                            Inicio like '%".$fecha."%'
            ) as Y,
            Cb_Combi U,
            Dueño_Combi DC,
            Dueños D,
            Usr_Usuarios Us
        Where 
            Y.Cb_NumeroRuta = U.Cb_NumeroRuta and
            U.Cb_IdCombi = DC.Cb_IdCombi and
            DC.Id_Dueño = D.Id_dueño and
            D.id_UsrUsuario = Us.id_UsrUsuario
        order by Y.Inicio

      ";
        echo $query;
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

     function MostrarUnidadDueño()
     {
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
      //echo $query;
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }



     function modalMonitoreoUnidad($idCombi)
     {
      $query="select * from Report2 where Cb_NumeroRuta = (select Cb_NumeroRuta from Cb_Combi where Cb_IdCombi = '$idCombi')";
      echo $query;
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     function corridasUnidad()
     {
      $query="select corrida, convert(time,left(Inicio, 19)) as hora from 
                  (select 
                      ROW_NUMBER() OVER(ORDER BY Inicio) AS corrida,
                      * from Report2
                  ) as x
              where 
                  Cb_NumeroRuta = (select Cb_NumeroRuta from Cb_Combi where Cb_IdCombi = ".$_POST['unidad'].") and 
                  Inicio like '%".$_POST['fecha']."%'";
      //echo $query;
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     function unidadesEnRuta()
     {
      $query="select 
                (select Cb_idCombi from Cb_Combi where Cb_NumeroRuta = X.Cb_NumeroRuta) as Unidad,
                X.Cb_NumeroRuta 
              from 
                Report2 X
              where Fin IS NULL";
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

      function resumeUnidadTiempo()
     {
      $query=";With TiemposUnidades As
                (
                    SELECT ROW_NUMBER() OVER (order by Hora DESC) AS ID,* from (
                        select
                            *
                        from (
                            select

                                C.Cb_NumeroRuta,

                                GPS.Direccion,
                                GPS.Latitud,
                                GPS.Longitud,
                                GPS.Fecha,
                                GPS.Hora,
                                ROW_NUMBER() OVER(PARTITION BY Imei ORDER BY Hora DESC) rn
                            from 
                                LocationGPS GPS
                            join Cb_Combi C on C.Cb_Imei = Imei
                            where
                                Fecha = Format(GETDATE(),'yyyy-MM-dd')
                        ) as x
                        where rn = 1
                        
                    ) as X
                )
                SELECT 
                    ID,
                    Cb_NumeroRuta,
                    Hora 
                from
                    TiemposUnidades
                where 
                    ID in (
                            Select 
                                ID+i
                            FROM
                                TiemposUnidades
                            CROSS JOIN (SELECT -1 AS i UNION ALL SELECT 0 UNION ALL SELECT 1) n
                            WHERE Cb_NumeroRuta = (select Cb_NumeroRuta from Cb_Combi where Cb_IdCombi = ".$_POST['unidadc'].")
                          )";
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     function RutaExists()
     {
      $query="SELECT * from ruta where nombre = '".$_GET['ruta']."'";
      //echo $query;
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     function RutaInfoSession()
     {
        $query="SELECT * from ruta where id_Ruta = ".$_SESSION['idruta'];
        //echo $query;
        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }

     function MostrarUD(){
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
      $Register=sqlsrv_query($this->srv->conectar(),$query);
     }

      function unidadespordueño()
     {
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
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

     //where LaFecha=FORMAT(GETDATE(),'yyyy-MM-dd')
     function unidadesEnRutaALGO()
     {
      $query="SELECT * from 
              (select(select Cb_idCombi from Cb_Combi where Cb_NumeroRuta = X.Cb_NumeroRuta) as Unidad,
              X.Cb_NumeroRuta, (convert(date, Inicio)) as LaFecha,
        (convert(time,Inicio))as Hora,
              X.SLL_IdSalidaLlegada
              from 
              Report2 X where Fin IS NULL) as Y  where LaFecha=FORMAT(GETDATE(),'yyyy-MM-dd')";
      $Register=sqlsrv_query($this->srv->conectar(),$query);
      return $Register;
      $this->srv->desconectar();
     }

}
?>
