<?php
 require_once '../conf/Server_conection.php';
 error_reporting(E_ALL ^ E_NOTICE);
 class Scouts{
     var $srv;

     function Scouts()
     {
         $this->srv=new server();
     }
     function inicioSesion($usuario,$contra)
     {
         $Tipos='';
         $query = "SELECT Usr_Usuario,Usr_Password,Usr_Tipo FROM Usr_Usuarios where Usr_Usuario='".$usuario."'";
         $registros=sqlsrv_query($this->srv->conectar(),$query);

         if($registros === false)
             die(print_r(sqlsrv_errors(),true));

        while($row=sqlsrv_fetch_object($registros))
        {
            if($row->Usr_Password==$contra)
            {

                $Tipos=$row->Usr_Tipo;
            }
            else
            {
                $Tipos='';
            }
            $this->srv->desconectar();
        }
        return $Tipos;
     }


     function LaSesion($usuario,$contra)
     {
         $query = "SELECT id_UsrUsuario,Usr_Usuario,Usr_Password,Usr_Tipo FROM Usr_Usuarios where Usr_Usuario='".$usuario."'";
         $registros=sqlsrv_query($this->srv->conectar(),$query);

         if($registros === false)
             die(print_r(sqlsrv_errors(),true));

        while($row=sqlsrv_fetch_object($registros))
        {
            $Datos=array();
            $Filas=0;
            if($row->Usr_Password==$contra)
            {
                $Datos[$Filas][0]=$row->id_UsrUsuario;
                $Datos[$Filas][1]=$row->Usr_Usuario;
                $Datos[$Filas][2]=$row->Usr_Password;
                $Datos[$Filas][3]=$row->Usr_Tipo;
            }
            else
            {
               return false;
            }
            $this->srv->desconectar();
        }
        return $Datos;
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

     function MostrarMonitoreoAlv()
     {
       $query = "SELECT com.Cb_NumeroRuta,Chof.Ch_NombreChofer,Chof.Ch_ApellidoPaterno,Chof.Ch_ApellidoMaterno,
    (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 1' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 1'AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base1,
   (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 2' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 2' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base2,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 3' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 3' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base3,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 4' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 4' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base4,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 5' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 5' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base5,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 6' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 6' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base6,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 7' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 7' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base7,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 8' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 8' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base8,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 9' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 9' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base9,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 10' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 10' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base10,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 11' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 11' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base11,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 12' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 12' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base12,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 13' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 13' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base13,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 14' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 14' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base14,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 15' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 15' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base15,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 16' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 16' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base16,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 17' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 17' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base17,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 18' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 18' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base18,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 19' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 19' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base19,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 20' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 20' AND
          DATEPART(year,chk.Chk_FechaChek)='2019' and DATEPART(day,chk.Chk_FechaChek)=29)end) as Base20

                   from Vl_Vueltas Voltias
                   INNER JOIN En_Enroler Rol on Rol.En_IdEnrolado=Voltias.En_IdEnrolado
                  INNER JOIN Cb_Combi com on com.Cb_IdCombi=Rol.Cb_IdCombi
                  INNER JOIN Ch_Chofer Chof on Chof.Ch_IdChofer=Rol.Ch_IdChofer";

        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
        $this->srv->desconectar();
     }



     function MonitoreoChido()
     {
       $query = "SELECT com.Cb_NumeroRuta,Chof.Ch_NombreChofer,Chof.Ch_ApellidoPaterno,Chof.Ch_ApellidoMaterno,
    (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 1'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 1'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base1,
   (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 2'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 2'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base2,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 3'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 3'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base3,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 4'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 4'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base4,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 5'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 5'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base5,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 6'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 6'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base6,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 7'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 7'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base7,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 8'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 8'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base8,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 9'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 9'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base9,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 10'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 10'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base10,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 11'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 11'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base11,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 12'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 12'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base12,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 13'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 13'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base13,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 14'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 14'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base14,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 15'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 15'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base15,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 16'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 16'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base16,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 17'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 17'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base17,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 18'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 18'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base18,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 19'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 19'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base19,
                  (case when (SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 20'
                  ORDER BY chk.Chk_FechaChek ASC)is null then 0  else(SELECT top 1 chk.Chk_FechaChek FROM Check_Vuelta chk INNER JOIN Chk_Check Base on Base.Chk_IdCheck=chk.Chk_IdCheck
                  INNER JOIN Vl_Vueltas v on v.Vl_IdVuelta=chk.Vl_IdVuelta WHERE Voltias.Vl_IdVuelta=v.Vl_IdVuelta and Base.Chk_NombreCheck='Base 20'
                  ORDER BY chk.Chk_FechaChek ASC)end) as Base20

                   from Vl_Vueltas Voltias
                   INNER JOIN En_Enroler Rol on Rol.En_IdEnrolado=Voltias.En_IdEnrolado
                  INNER JOIN Cb_Combi com on com.Cb_IdCombi=Rol.Cb_IdCombi
                  INNER JOIN Ch_Chofer Chof on Chof.Ch_IdChofer=Rol.Ch_IdChofer";

        $Register=sqlsrv_query($this->srv->conectar(),$query);
        return $Register;
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

     function CalPerEquipo($Equipo)
     {
        $query="select e.nombreequipo,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=1) as Base1,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=2)as Base2,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=3)as Base3,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=4)as Base4,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=5)as Base5,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=6)as Base6,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=7)as Base7,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=8)as Base8,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=9)as Base9,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=10)as Base10,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=11)as Base11,
        (select eq.EqChk_Calificacion from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=12)as Base12,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=1) as Puntos1,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=2) as Puntos2,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=3) as Puntos3,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=4) as Puntos4,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=5) as Puntos5,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=6) as Puntos6,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=7) as Puntos7,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=8) as Puntos8,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=9) as Puntos9,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=10) as Puntos10,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=11) as Puntos11,
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5 else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=12) as Puntos12,
        (select sum(eq.EqChk_Calificacion) from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq) as SUMABASE
         from Equipos e where e.ideq=$Equipo";

         $registers=sqlsrv_query($this->srv->conectar(),$query);

         return $registers;

         $this->srv->desconectar();
     }


 }
?>
