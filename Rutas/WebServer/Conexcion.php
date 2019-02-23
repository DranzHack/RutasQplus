<?php
    class ConnectionInfo
    {
        public $Server;
        public $InfoConn;
        public $Conec;

        public function GetConnection()
        {
            $this->Server="localhost";
            $this->InfoConn=array("Database"=>"Ruta53","UID"=>"SA","PWD"=>"Oas970520");
            $this->Conec=sqlsrv_connect($this->Server,$this->InfoConn);

            return $this->Conec;
        }
    }
?>