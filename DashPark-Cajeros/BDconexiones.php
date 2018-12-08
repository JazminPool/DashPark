<?php	
require("conexion.php");

class consultas{

    public function VerificaCajeros($usu)
    {
        $cone=new conexionbd();
        $cone->Conectar_bd();
        $cajero_id=' ';
        $verificarCajero="SELECT * FROM empledos_cajeros WHERE usuario_caje='$usu'";
        $resultadoCaje=$cone->ExecuteQuery($verificarCajero) or die ("Error en cajero");
        while($colCajeros=$resultadoCaje->fetch_array())
        {
         $cajero_id=$colCajeros['idempledos_cajeros'];   
        }
        return $cajero_id;
    }
    public function trae_turnos(){
        $cone=new conexionbd();
        $cone->Conectar_bd();

        $select_turno="SELECT * from turnos_caje";
        $resultado_turno=$cone->ExecuteQuery($select_turno) or die("Error al consultar cajeros");
        
        echo "<select name='turno_cajero' required>";
            echo "<option value='' disabled selected>Seleccione un turno</option>";
            
            while($columna_turno=$resultado_turno->fetch_array()){
                echo "<option value='".$columna_turno['idturnos_caje']."'>".$columna_turno['descripcion']."</option>";          
            }
        echo "</select>"; 
    }

    public function insertar_datos($folio_rojo, $folio_emisor, $contador, $coches_d, $e_tarjeta, $s_tarjeta, $b_cobr, $b_tol, $b_cort, $b_guada, $b_perd,$fecha,$horaEntrada,$horaSalida,$idCajero){
        $resultadoBoletos=$b_cobr+$b_tol+$b_cort+$b_guada+$b_perd;
        $salidasTotales=$resultadoBoletos+$s_tarjeta;
        $conexion = new conexionbd();
        $conexion->Conectar_bd();    
        $insertar="INSERT INTO folios_rojos (idfolios_rojos, folio_entrada, folio_salida, diferencia_folio) VALUES ($folio_rojo, $folio_rojo, null, null);";
        $resultadoCajero=$conexion->ExecuteQuery($insertar) or die ("Error en al ingresar folios rojos");
        $query=("INSERT INTO folio_emisor (idfolio_emisor, emisor_entrada, emisor_salida, diferencia_emisor) VALUES ($folio_rojo, $folio_emisor, null, null)");
        $resultadoCajero=$conexion->ExecuteQuery($query) or die ("Error en al ingresar folio emisor");
        $query1=("INSERT INTO contador_est (idcontador_est, inicio_contador, salida_contador, diferencia_contador) VALUES ($folio_rojo, $contador, null, null)");
        $resultadoCajero=$conexion->ExecuteQuery($query1) or die ("Error en al ingresar contador");
        $query2=("INSERT INTO coches_dentro (idcoches_dentro, coches_incio, coches_salida, diferencia_coches) VALUES ($folio_rojo, $coches_d, 0, 0)");
        $resultadoCajero=$conexion->ExecuteQuery($query2) or die ("Error en al ingresar en cajeros");
        $query3=("INSERT INTO tarjetas_control (idtarjetas_control, entrada_tarjeta, salidas_tarjeta) VALUES ($folio_rojo, $e_tarjeta, $s_tarjeta)");
        $resultadoCajero=$conexion->ExecuteQuery($query3) or die ("Error en al ingresar tarjetas control");
        $query4=("INSERT INTO boletos_tipos (idboletos_tipos, boletos_cobrados, boletos_tolerancia, boletos_guada, boletos_cortesia, boletos_perdidos, boletos_totales) VALUES ($folio_rojo, $b_cobr, $b_tol, $b_guada, $b_cort, $b_perd, $resultadoBoletos)");
        $resultadoCajero=$conexion->ExecuteQuery($query4) or die ("Error en al ingresar boletos tipos");
        
        $query5=("INSERT INTO reportes_cortes (idreportes_cortes, fecha_corte, idcajeros, idrojos, id_contador,emisor_idfolio,coches_idcoches,boletos_idboletos,tarjetas_idtarjetas,total_salidas,observacion_cajero,efectivo_tarjeta, inicio_corte,fin_corte) 
        VALUES ($folio_rojo, $fecha,$idCajero,$folio_rojo, $folio_rojo, $folio_rojo, $folio_rojo, $folio_rojo, $folio_rojo,$salidasTotales,NULL,NULL,'$horaEntrada','$horaSalida')");
        $resultadoCajero=$conexion->ExecuteQuery($query5) or die ("Error en al ingresar reportes cortes");   
         $conexion->Cerrar();     
        //print_r($query5);

    }

    public function traeDatosCajeros($usuarioEmpleado)
    {
        $conexion = new conexionbd();
        $conexion->Conectar_bd();

        $query="SELECT * from empledos_cajeros WHERE idempledos_cajeros='$usuarioEmpleado'";
        $resultadoCajero=$conexion->ExecuteQuery($query) or die ("Error al traer cajeros");

        while($columnaCajeros=$resultadoCajero->fetch_array())
        {           
            $empleado=$columnaCajeros['idempledos_cajeros'];
           $nom_cajero=$columnaCajeros['Nombre_cajero'];  
           
        }
        
    
    }
}


?>