<?php	
require("conexion.php");

class consultas{

    public function trae_turnos(){
        $cone=new conexionbd();
        $cone->Conectar();

        $select_turno="SELECT * from turnos_caje";
        $resultado_turno=$cone->ExecuteQuery($select_turno) or die("Error al consultar cajeros");

        echo "<select name='turno_cajero'>";
            echo "<option value='' disabled selected>Seleccione un turno</option>";
            
            while($columna_turno=$resultado_turno->fetch_array()){
                echo "<option value='".$columna_turno['idturnos_caje']."'>".$columna_turno['descripcion']."</option>";          
            }
        echo "</select>"; 
    }

    public function insertar_reporte(){
        $conexion = new conexionbd();
        $conexion->Conectar();

        $insert_reporte="";
    }
}


?>