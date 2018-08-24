<?php
class Conneciones{
    public $host;
    public $user;
    public $password;
    public $database;
    public $conn;
    public function __construct(){
        $this->host="localhost";
        $this->user="root";
        $this->password="";
        $this->database="cortes_estacionamiento";     
    }
    public function Conectar()
    {
        $this->conn=new mysqli($this->host,$this->user,$this->password,$this->database);
        if($this->conn->connect_errno)
        {
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