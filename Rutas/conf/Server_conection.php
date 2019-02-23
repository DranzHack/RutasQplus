<?php
class server{
    var $conn;

    function server()
    {
        $this->conn=null;
    }

    function conectar()
    {
        require_once 'Connectate.php';

        if($this->conn==null)
        {
            $this->conn=sqlsrv_connect($server,$conect_inf);

            if($this->conn)
            {
                return $this->conn;
            }
            else
            {
                die(print_r(sqlsrv_errors(),true));
            }
        }
    }

    function desconectar()
    {
        if($this->conn!=null)
        {
            sqlsrv_close($this->conn);
        }
    }
} 
?>