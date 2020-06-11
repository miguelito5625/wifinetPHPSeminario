<?php

/**
 * Description de la Conexion
 *
 * @author migue
 */
class Conexion extends mysqli {

    var $host = '34.71.138.115';
    var $user = 'mikearchila';
    var $pass = 'Mariobross5625.';
    var $db = 'wifinet';
    var $myconn;

    function conectar() {
        $con = mysqli_init();
        mysqli_options($con, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
        mysqli_real_connect($con, $this->host, $this->user, $this->pass, $this->db);
        mysqli_query($con, 'SET NAMES \'utf8\'');

        if (mysqli_connect_errno()) {
            //echo "Failed to connect to MySQL: " . mysqli_connect_errno();
            $this->myconn = "codigo_error=" . mysqli_connect_errno();
        } else {
        
            $this->myconn = $con;
            
        }

        return $this->myconn;
    }

    function desconectar() {
        mysqli_close($this->myconn);
    }

}
