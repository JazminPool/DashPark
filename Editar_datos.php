<?php
include("conexion.php");

Class editar_bd{

    public static $id_array;
    public function mostrar_id(&$id_array)
    {
        self::$id_array=$id_array;
    }

    public function enviar_efectivo($fecha,$efectivo1,$efectivo2,$efectivo3)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $trae_ids="SELECT idreportes_cortes FROM reportes_cortes WHERE fecha_corte=$fecha";
        $resultado_ids=$cone->ExecuteQuery($trae_ids) or die("Error al traer turnos");
        while($columa_res=$resultado_ids->fetch_array())
        {
            $array_id[]=$columa_res['idreportes_cortes'];
        }   
        self::mostrar_id($array_id);

            $array_nuevo=self::$id_array;
            $envia_efe="UPDATE reportes_cortes
                        SET efectivo_tarjeta = 
                            CASE 
                            WHEN idreportes_cortes = $array_nuevo[0] THEN $efectivo1
                            WHEN idreportes_cortes = $array_nuevo[1] THEN $efectivo2
                            WHEN idreportes_cortes = $array_nuevo[2] THEN $efectivo3
                            END
                        WHERE idreportes_cortes IN ($array_nuevo[0],$array_nuevo[1],$array_nuevo[2])
                        AND fecha_corte = $fecha";
    $resultdo_update=$cone->ExecuteQuery($envia_efe) or die ("ERROR EN EL UPDATE");       
    } 

    public function enviar_fisicos($fecha,$fisico1,$fisico2,$fisico3)
    {
        $array_id=self::$id_array;

        $cone=new Conneciones();
        $cone->Conectar(); 
            $envia_fisco="UPDATE boletos_tipos
                        SET boletos_fisicos = 
                            CASE 
                            WHEN idboletos_tipos = $array_id[0] THEN $fisico1
                            WHEN idboletos_tipos = $array_id[1] THEN $fisico2
                            WHEN idboletos_tipos = $array_id[2] THEN $fisico3
                            END
                        WHERE idboletos_tipos IN ($array_id[0],$array_id[1],$array_id[2])
                ";
    $resultdo_update=$cone->ExecuteQuery($envia_fisco) or die ("ERROR EN EL UPDATE fisicos");       
    }

    public function enviar_observaciones($fecha,$ob1,$ob2,$ob3)
    {
        $array_ids=self::$id_array;
        
                $cone=new Conneciones();
                $cone->Conectar(); 
                    $envia_observacion="UPDATE reportes_cortes
                                SET observacion_cajero = 
                                    CASE 
                                    WHEN idreportes_cortes = $array_ids[0] THEN '$ob1'
                                    WHEN idreportes_cortes = $array_ids[1] THEN '$ob2'
                                    WHEN idreportes_cortes = $array_ids[2] THEN '$ob3'
                                    END
                                WHERE idreportes_cortes IN ($array_ids[0],$array_ids[1],$array_ids[2])";
            $resultdo_observa=$cone->ExecuteQuery($envia_observacion) or die ("ERROR EN EL UPDATE observaciones");   
    }

    public function dia_siguiente($fecha,$em_sig,$rojo_sig,$conta_sig,$coches_sig,$resumen)
    {
       
    }

    public function trae_datos($fecha)
    {
        $cone=new Conneciones();
        $cone->Conectar();
       
        $consulta_datos="SELECT folios_rojos.folio_entrada, folio_emisor.emisor_entrada,coches_dentro.coches_incio,
        contador_est.inicio_contador,tarjetas_control.entrada_tarjeta,reportes_cortes.total_salidas from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
        inner join folios_rojos ON reportes_cortes.idrojos=folios_rojos.idfolios_rojos INNER JOIN contador_est ON reportes_cortes.id_contador=contador_est.idcontador_est
        Inner join folio_emisor ON reportes_cortes.emisor_idfolio=folio_emisor.idfolio_emisor INNER JOIN coches_dentro ON reportes_cortes.coches_idcoches=coches_dentro.idcoches_dentro
        INNER JOIN boletos_tipos ON reportes_cortes.boletos_idboletos=boletos_tipos.idboletos_tipos INNER JOIN tarjetas_control ON
        reportes_cortes.tarjetas_idtarjetas=tarjetas_control.idtarjetas_control
        INNER JOIN turnos_caje ON empledos_cajeros.turnos_caje_idturnos_caje=turnos_caje.idturnos_caje WHERE reportes_cortes.fecha_corte=".$fecha."";
        $resultado_corteFinal=$cone->ExecuteQuery($consulta_datos) or die ("Error al consultar corte final1");

        while($columna_datos=$resultado_corteFinal->fetch_array())
        {
            $array_turno1[]=array(
                
                'folio_entrada' =>$columna_datos['folio_entrada'],
                'emisor_entrada' =>$columna_datos['emisor_entrada'],
                'coches_dentro' =>$columna_datos['coches_incio'],
                'contador' =>$columna_datos['inicio_contador'],
                'tarjetas'=>$columna_datos['entrada_tarjeta'],
                'salidas_totales'=>$columna_datos['total_salidas']
                
        );
            
        }
        $consulta_diasig="SELECT * from dia_siguiente WHERE fecha_siguiente='$fecha'";
        $resultado_corte=$cone->ExecuteQuery($consulta_diasig) or die("Error al consultar datos siguientes");
        while($columna_sig=$resultado_corte->fetch_array())
        {
            $array_siguiente[]=array(
                'id_siguiente'=>$columna_sig['iddia_siguiente'],
                'fecha_sig'=>$columna_sig['fecha_siguiente'],
                'emisor_sig'=>$columna_sig['folio_emisor'],
                'rojo_sig'=>$columna_sig['folios_rojos'],
                'contador_sig'=>$columna_sig['contador'],
                'coches_sig'=>$columna_sig['coches_dentro'],
                'resumen'=>$columna_sig['resumen_dia']
            );
        }
        

        $array_resultados=       
            array(
                array(
                'res_rojos'=>$array_turno1[1]['folio_entrada']-1,
                'res_difrojos'=>$array_turno1[1]['folio_entrada']-$array_turno1[0]['folio_entrada'],
                'res_emisor'=>$array_turno1[1]['emisor_entrada']-1,
                'res_difemisor'=>$array_turno1[1]['emisor_entrada']-$array_turno1[0]['emisor_entrada'],
                'res_contador'=>$array_turno1[1]['contador']-1,
                'res_difcontador'=>$array_turno1[1]['contador']-$array_turno1[0]['contador'],
                'res_coches'=>$array_turno1[0]['coches_dentro']+$array_turno1[0]['tarjetas']+($array_turno1[2]['folio_entrada']-$array_turno1[1]['folio_entrada'])+$array_turno1[0]['salidas_totales']
                ),
                array(
                    'res_rojos'=>$array_turno1[2]['folio_entrada']-1,
                    'res_difrojos'=>$array_turno1[2]['folio_entrada']-$array_turno1[1]['folio_entrada'],
                    'res_emisor'=>$array_turno1[2]['emisor_entrada']-1,
                    'res_difemisor'=>$array_turno1[2]['emisor_entrada']-$array_turno1[1]['emisor_entrada'],
                    'res_contador'=>$array_turno1[2]['contador']-1,
                    'res_difcontador'=>$array_turno1[2]['contador']-$array_turno1[1]['contador'],
                    'res_coches'=>$array_turno1[1]['coches_dentro']+$array_turno1[1]['tarjetas']+($array_turno1[2]['folio_entrada']-$array_turno1[1]['folio_entrada'])+$array_turno1[1]['salidas_totales'],
                ),
                array(
                    'res_rojos'=>$array_siguiente[0]['rojo_sig']-1,
                    'res_difrojos'=>$array_siguiente[0]['rojo_sig']-$array_turno1[2]['folio_entrada'],
                    'res_emisor'=>$array_siguiente[0]['emisor_sig']-1,
                    'res_difemisor'=> $array_siguiente[0]['emisor_sig']-$array_turno1[2]['emisor_entrada'],
                    'res_contador'=>$array_siguiente[0]['contador_sig']-1,
                    'res_difcontador'=>$array_siguiente[0]['contador_sig']-$array_turno1[2]['contador'],
                    'res_coches'=>$array_turno1[2]['coches_dentro']+$array_turno1[2]['tarjetas']+($array_siguiente[0]['rojo_sig']-$array_turno1[2]['folio_entrada'])+$array_turno1[2]['salidas_totales']
                )
                );

                
               /* $actualizar_rojos="UPDATE folios_rojos
                SET folio_salida=
                    CASE
                        WHEN idfolios_rojos=$array_turno1[0]['folio_entrada'] then $array_resultados[0]['res_rojos'],
                        WHEN idfolios_rojos=$array_turno1[1]['folio_entrada'] then $array_resultados[1]['res_rojos'],
                        WHEN idfolios_rojos=$array_turno1[2]['folio_entrada'] then $array_resultados[2]['res_rojos']
                    END
                    WHERE idfolios_rojos IN($array_turno1[0]['folio_entrada'],$array_turno1[1]['folio_entrada'],$array_turno1[2]['folio_entrada'])";
                    $resultdo_updaterojos=$cone->ExecuteQuery($actualizar_rojos) or die ("ERROR EN EL UPDATE ROJOS");  */ 
        ////////////////////////////////////TURNO 1//////////////////////////////////////////////////////////////////77
            //echo "Turno 1, FOLIOS emisor <br>";
           // echo $array_turno1[1]['emisor_entrada']-1; echo "<br>" ;//Primera columna,
            //echo $array_turno1[1]['emisor_entrada']-$array_turno1[0]['emisor_entrada'];
              //  echo "<br>";
            //////////////////////////FOLIOS ROJOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOS /////////////////////////////////////
            //$t1_rojos=$array_turno1[1]['folio_entrada']-1;//FOLIOS ROJOSSS, SALIDA,
            //$t1diferencia_rojos= $array_turno1[1]['folio_entrada']-$array_turno1[0]['folio_entrada'];
                
            ////////////////////////////Turno 1, contador///////////////////////////////////////////////////////////7
            //$t1_contador=$array_turno1[1]['contador']-1; ///////MENOS UNO
            //$t1dif_contador=$array_turno1[1]['contador']-$array_turno1[0]['contador'];
            //////////////////////////////Turno 1, coches /////////////////////////////////////////////////////////////
            //$t1suma_coches1= $array_turno1[0]['coches_dentro']+$array_turno1[0]['tarjetas']+$diferencia_rojos+$array_turno1[0]['salidas_totales']; echo "<br>" ;//Primera columna

            ///////////////////////////////////TURNO 2///////////////////////////////////////
            //echo "Turno 2, FOLIOS emisor <br>";
            //echo $array_turno1[2]['emisor_entrada']-1; echo "<br>" ;//Primera columna,
            //echo $array_turno1[2]['emisor_entrada']-$array_turno1[1]['emisor_entrada'];
              //  echo "<br>";
            //echo "Turno 2, FOLIOS rojos <BR>";
            //echo $array_turno1[2]['folio_entrada']-1; echo "<br>" ;//Primera columna,
            //echo $diferencia_rojos= $array_turno1[2]['folio_entrada']-$array_turno1[1]['folio_entrada'];
              //  echo "<br>";
            //echo "Turno 2, contador <BR>";
            //echo $array_turno1[2]['contador']-1; echo "<br>" ;//Primera columna,
            //echo $array_turno1[2]['contador']-$array_turno1[1]['contador'];
               // echo "<br>";
           // echo "Turno 2, coches <BR>";
            //echo $array_turno1[1]['coches_dentro']+$array_turno1[1]['tarjetas']+$diferencia_rojos+$array_turno1[1]['salidas_totales']; echo "<br>" ;//Primera columna,
            //echo $suma_coches1;
            //echo "<br><br>";
            ////////////////////////////////////TURNOO 3////////////////////////////////////////

            /*echo "Turno 3, con fecha dia siguientea<br>";
            //echo $array_siguiente[0]['emisor_sig']-1; echo "<br>";
           // echo $array_siguiente[0]['emisor_sig']-$array_turno1[2]['emisor_entrada'];
            echo "<br>";
            echo "Turno 3, FOLIOS rojos <BR>";
            echo $array_siguiente[0]['rojo_sig']-1; echo "<br>";
            echo $dif_siguiente=$array_siguiente[0]['rojo_sig']-$array_turno1[2]['folio_entrada'];echo "<br>";
            echo "Turno 3, contador <BR>";
            echo $array_siguiente[0]['contador_sig']-1;echo "<br>";
            echo $array_siguiente[0]['contador_sig']-$array_turno1[2]['contador'];
            echo "Turno 3, coches <BR>";
            echo $array_turno1[2]['coches_dentro']+$array_turno1[2]['tarjetas']+$dif_siguiente+$array_turno1[2]['salidas_totales']; echo "<br>";
            */

           
           
    }

    
}


?>