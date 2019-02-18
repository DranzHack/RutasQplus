<?php
 require_once '../../conf/Server_conection.php';
 error_reporting(E_ALL ^ E_NOTICE);
 class ScoutsConsulta{
     var $srv;

     function ScoutsConsulta()
     {
         $this->srv=new server();
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
     function MostrarEquipos()
     {
         //$query = "SELECT * From Usr_Bs";
         $query = "Select * from Equipos";
         $registers=sqlsrv_query($this->srv->conectar(),$query);
         return $registers;
         $this->srv->desconectar();
     }

     function MostrarParEquipo()
     {
         $query="select pa.idparti, pa.nombre,pa.telef1,pa.telef2,eq.nombreequipo from participante pa inner join Equipos eq on pa.nombreequipo=eq.ideq";
         $register=sqlsrv_query($this->srv->conectar(),$query);
         return $register;
         $this->srv->desconectar();
     }

     function CalificacionesEquipo()
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
         (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
         from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
         inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=12) as Puntos12,
         (select sum(eq.EqChk_Calificacion) from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
         inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq) as SUMABASE
          from Equipos e ORDER by  SUMABASE DESC";

         $registers=sqlsrv_query($this->srv->conectar(),$query);

         return $registers;

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
        (select (case when eq.EqChk_InicioMatch is not null and eq.EqChk_FinCal is not null then '5' else '0' end)
        from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq and eq.IdbaseArribo=12) as Puntos12,
        (select sum(eq.EqChk_Calificacion) from EqChk_EquipoChek eq inner join UsrBs ub on ub.UsrBs_Id=eq.UsrBs_Id
        inner join Bs_Bases ba on ba.Bs_IdBase=ub.Bs_IdBase where eq.Eq_IdEquipo=e.ideq) as SUMABASE
         from Equipos e where e.ideq=$Equipo";

         $registers=sqlsrv_query($this->srv->conectar(),$query);

         return $registers;

         $this->srv->desconectar();
     }

     function EquipoID($Id)
     {
       $query = "SELECT nombreequipo FROM Equipos where ideq=$Id";

       $registers=sqlsrv_query($this->srv->conectar(),$query);

       return $registers;

       $this->srv-desconectar();
     }

     function PromedioEquipo()
     {
         $query="SELECT Sc.ideq,Sc.nombreequipo,Sc.Base1,Sc.Base2,Sc.Base3,Sc.Base4,Sc.Base5,Sc.Base6,Sc.Base7,Sc.Base8,Sc.Base9,Sc.Base10,Sc.Base11,Sc.Base12,
         Sc.Puntos1,Sc.Puntos2,Sc.Puntos3,Sc.Puntos4,Sc.Puntos5,Sc.Puntos6,Sc.Puntos7,Sc.Puntos8,Sc.Puntos9,Sc.Puntos10,Sc.Puntos11,Sc.Puntos12,
         (SELECT sum(SR.Base1+SR.Base2+SR.Base3+SR.Base4+SR.Base5+SR.Base6+SR.Base7+SR.Base8+SR.Base9+SR.Base10+SR.Base11+SR.Base12+SR.Puntos1+SR.Puntos2+SR.Puntos3+SR.Puntos4+SR.Puntos5+SR.Puntos6+SR.Puntos7+SR.Puntos8+SR.Puntos9+SR.Puntos10+SR.Puntos11+SR.Puntos12) 
         FROM Calificaciones SR WHERE SR.ideq=Sc.ideq) AS Prom FROM Calificaciones Sc ORDER BY Prom DESC";

         $Disaster=sqlsrv_query($this->srv->conectar(),$query);

         return $Disaster;

         $this->srv->desconectar();
     }

    function PromedioXEquipo ($Ides)
    {
        $query="SELECT Sc.ideq,Sc.nombreequipo,Sc.Base1,Sc.Base2,Sc.Base3,Sc.Base4,Sc.Base5,Sc.Base6,Sc.Base7,Sc.Base8,Sc.Base9,Sc.Base10,Sc.Base11,Sc.Base12,
        Sc.Puntos1,Sc.Puntos2,Sc.Puntos3,Sc.Puntos4,Sc.Puntos5,Sc.Puntos6,Sc.Puntos7,Sc.Puntos8,Sc.Puntos9,Sc.Puntos10,Sc.Puntos11,Sc.Puntos12,
        (SELECT sum(SR.Base1+SR.Base2+SR.Base3+SR.Base4+SR.Base5+SR.Base6+SR.Base7+SR.Base8+SR.Base9+SR.Base10+SR.Base11+SR.Base12+SR.Puntos1+SR.Puntos2+SR.Puntos3+SR.Puntos4+SR.Puntos5+SR.Puntos6+SR.Puntos7+SR.Puntos8+SR.Puntos9+SR.Puntos10+SR.Puntos11+SR.Puntos12) 
        FROM Calificaciones SR WHERE SR.ideq=Sc.ideq) AS Prom FROM Calificaciones Sc where Sc.ideq=$Ides";

        $registers=sqlsrv_query($this->srv->conectar(),$query);

        return $registers;

        $this->srv-desconectar();
    }

    function InventarioCombis()
    {
         $query="SELECT Cb_NumeroDeRuta,Cb_Placas,Cb_Marca,Cb_Modelo From Cb_CombiRuta";

         $Disaster=sqlsrv_query($this->srv->conectar(),$query);

         return $Disaster;

         $this->srv->desconectar();
    }

    function InventarioChoferes()
    {
         $query="SELECT Ch_NombreChofer,Ch_ApellidoPaterno,Ch_ApellidoMaterno,Ch_NumeroDeEmpleado from Ch_chofer";

         $Disaster=sqlsrv_query($this->srv->conectar(),$query);

         return $Disaster;

         $this->srv->desconectar();
    }

    function InventarioDueñoCombi()
    {
         $query="SELECT Cb_NumeroDeRuta,Cb_Placas,Cb_Marca,Cb_Modelo From Cb_CombiRuta";

         $Disaster=sqlsrv_query($this->srv->conectar(),$query);

         return $Disaster;

         $this->srv->desconectar();
    }


     /* 
     
     */


 }
?>
