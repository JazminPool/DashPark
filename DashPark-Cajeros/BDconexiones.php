<?php	
require("conexion.php");

class consultas{

    public function trae_turnos(){
        $cone=new conexionbd();
        $cone->Conectar_bd();

        $select_turno="SELECT * from turnos_caje";
        $resultado_turno=$cone->ExecuteQuery($select_turno) or die("Error al consultar cajeros");

        echo "<select name='turno_cajero'>";
            echo "<option value='' disabled selected>Seleccione un turno</option>";
            
            while($columna_turno=$resultado_turno->fetch_array()){
                echo "<option value='".$columna_turno['idturnos_caje']."'>".$columna_turno['descripcion']."</option>";          
            }
        echo "</select>"; 
    }

    public function insertar_datos($folio_rojo, $folio_emisor, $contador, $coches_d, $e_tarjeta, $s_tarjeta, $b_cobr, $b_tol, $b_cort, $b_guada, $b_perd, $b_tot, $sal_tot){
        $conexion = new conexionbd();
        $conexion->Conectar_bd();

        $conexion->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);

        $conexion->query("INSERT INTO folios_rojos (idfolios_rojos, folio_entrada, folio_salida, diferencia_folio) VALUES ($folio_rojo, $folio_rojo, null, null)");
        $conexion->query("INSERT INTO folio_emisor (idfolio_emisor, emisor_entrada, emisor_salida, diferencia_emisor) VALUES ($folio_rojo, $folio_emisor, null, null)");
        $conexion->query("INSERT INTO contador_est (idcontador_est, inicio_contador, salida_contador, diferencia_contador) VALUES ($folio_rojo, $contador, null, null)");
        $conexion->query("INSERT INTO coches_dentro (idcoches_dentro, coches_incio, coches_salida, diferencia_coches) VALUES ($folio_rojo, $coches_d, null, null)");
        $conexion->query("INSERT INTO tarjetas_control (idtarjetas_control, entrada_tarjet, salidas_tarjeta) VALUES ($folio_rojo, $e_tarjeta, $s_tarjeta)");
        $conexion->query("INSERT INTO boletos_tipos (idboletos_tipos, boletos_cobrados, boletos_tolerancia, boletos_guada, boletos_cortesia, boletos_perdidos, boletos_totales) VALUES ($folio_rojo, $b_cobr, $b_tol, $b_guada, $b_cort, $b_perd, 30)");
        //falta añadir el turno con update
        //tambien insertar en reportes cortes
        $conexion->commit();

        $conexion->Cerrar();

        // $insertar="INSERT INTO folios_rojos (idfolios_rojos, folio_entrada, folio_salida, diferencia_folio) VALUES ($folio_rojo, $folio_rojo, null, null);";
        

    }
}


?>