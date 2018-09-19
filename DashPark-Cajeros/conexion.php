<?php
class conexionbd{
    public $host;
    public $user;
    public $password;
    public $database;
    public $conn;
    public function __construct(){
        $this->host="localhost"; //192.168.100.37 - localhost
        $this->user="root"; //servidor - root
        $this->password=""; //123 - nada
        $this->database="cortes_estacionamiento";     
    }
    public function Conectar_bd(){
        $this->conn=new mysqli($this->host,$this->user,$this->password,$this->database); //este es el bueno xdxdxd
       
        if($this->conn->connect_errno){
            die("Error al conectarse a la base de datos");
        }
    }
    
    public function Cerrar()
    {
        $this->conn->close();
    }
    public function ExecuteQuery($sql){
        
         $result = $this->conn->query($sql);
         return $result;
        }
}
?>  