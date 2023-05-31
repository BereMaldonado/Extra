<?php
//clase conexion a la bd
if (class_exists("class_db")!=true){
    class class_db{
        var $db_conn;
        var $db_name;
        var $db_query;

        function __construct(){
            $this->set_db("localhost","root","","bd_agenciaautomoviles");
        } 

        function __destruct(){
            $this->close_db();
        }

        function set_db($host,$user,$passwd,$db){
            if (!isset($this->db_conn)){
                $this->db_conn=mysqli_connect($host,$user,$passwd,$db);
                $this->db_name=$db;
            }

            if (!$this->db_conn){
                echo "Error:No se pudo connectar a MYSQL" .PHP_EOL;
                echo "NÚMERO Error:" .mysqli_connect_errno().PHP_EOL;
                echo "Descripción Error:" .mysqli_connect_error().PHP_EOL;
                exit;
            }

        }

        function close_db(){
            if (isset($db_conn)){
                mysqli_close($db_conn);
            }
        }

        function set_sql($sql){
            $this->db_query=$sql;
        }

    }
}
?>