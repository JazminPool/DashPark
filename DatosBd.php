<?php
include("conexion.php");
include("modales.php");
Class BD{
    public static $array_boletos=null;
    public static $array_dinero=null;
    public static $array_turnos=null;
    public static $boletos_totales=null;
    public static $arraytotales=null;
    public static $arraySiguiente=null;

    public function Obtener_boletos(&$array_boletos,&$array_dinero,&$array_turnos,&$boletos_totales)
     {   //global $array_boletos;
        self::$array_boletos=$array_boletos;
        self::$array_dinero=$array_dinero;
        self::$array_turnos=$array_turnos;
        self::$boletos_totales=$boletos_totales;
    } /*Metodo para obtener boeletos*/

    public function ArrayTotales(&$arraytotales)
    {
        self::$arraytotales=$arraytotales;
    }
    public function DiaSiguiente(&$arraySiguiente)
    {
        self::$arraySiguiente=$arraySiguiente;
    }
  
    
    public function mostrar_cajeros()
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $consulta_cajeros="SELECT * from empledos_cajeros";
        $resultado_cajeros=$cone->ExecuteQuery($consulta_cajeros) or die("Error al consultar cajeros");

        echo "<select class='form-control form-control-sm text-center' name='id_empleado'>";
        while($columna_cajeros=$resultado_cajeros->fetch_array())
        {
           
            echo "<option value='".$columna_cajeros['idempledos_cajeros']."'>".$columna_cajeros['Nombre_cajero']." ".$columna_cajeros['apellido_patCaje']."</option>";          
        }
        echo "</select>"; 
        $cone->Cerrar();
    }
    /*ESTO NO QUEDA :cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc*/
    public function trae_datos($fecha)
    {
        $cone=new Conneciones();
        $cone->Conectar();
       
        $consulta_datos="SELECT folios_rojos.folio_entrada,folios_rojos.diferencia_folio ,folio_emisor.emisor_entrada,coches_dentro.coches_incio,
        contador_est.inicio_contador,tarjetas_control.entrada_tarjeta,reportes_cortes.total_salidas,contador_est.diferencia_contador,
        boletos_tipos.boletos_perdidos, coches_dentro.coches_salida from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
        inner join folios_rojos ON reportes_cortes.idrojos=folios_rojos.idfolios_rojos INNER JOIN contador_est ON reportes_cortes.id_contador=contador_est.idcontador_est
        Inner join folio_emisor ON reportes_cortes.emisor_idfolio=folio_emisor.idfolio_emisor INNER JOIN coches_dentro ON reportes_cortes.coches_idcoches=coches_dentro.idcoches_dentro
        INNER JOIN boletos_tipos ON reportes_cortes.boletos_idboletos=boletos_tipos.idboletos_tipos INNER JOIN tarjetas_control ON
        reportes_cortes.tarjetas_idtarjetas=tarjetas_control.idtarjetas_control
        INNER JOIN turnos_caje ON empledos_cajeros.turnos_caje_idturnos_caje=turnos_caje.idturnos_caje WHERE reportes_cortes.fecha_corte=".$fecha."";
        $resultado_corteFinal=$cone->ExecuteQuery($consulta_datos) or die ("Error al consultar corte final1");

        while($columna_datos=$resultado_corteFinal->fetch_array())
        {
            $array_turno1[]=array(
                
                $columna_datos['folio_entrada'],  //0
                $columna_datos['emisor_entrada'], //1
                $columna_datos['coches_incio'],  //2
                $columna_datos['inicio_contador'],  //3
                $columna_datos['entrada_tarjeta'],  //4 
                $columna_datos['total_salidas'],  //5
                $columna_datos['diferencia_contador'], //6
                $columna_datos['diferencia_folio'], //7
                $columna_datos['boletos_perdidos'], //8
                $columna_datos['coches_salida'] //9
                
        );
            self::ArrayTotales($array_turno1);
        }
        $consulta_diasig="SELECT * from dia_siguiente WHERE fecha_siguiente='$fecha'";
        $resultado_corte=$cone->ExecuteQuery($consulta_diasig) or die("Error al consultar datos siguientes");
        while($columna_sig=$resultado_corte->fetch_array())
        {
            $array_siguiente[]=array(
                $columna_sig['iddia_siguiente'], //0
                $columna_sig['fecha_siguiente'], //1
                $columna_sig['folio_emisor'], //2
                $columna_sig['folios_rojos'], //3
                $columna_sig['contador'], //4
                $columna_sig['coches_dentro'], //5
                $columna_sig['resumen_dia']  //6
            );
        }
        self::DiaSiguiente($array_siguiente);

        $array_resultados=       
            array(
                array( //turno 1, operaciones [0]
                $array_turno1[1][0]-1, //entrada rojos
                $array_turno1[1][0]-$array_turno1[0][0], // diferencia folio rojos
                $array_turno1[1][1]-1, // entrada emisor
                $array_turno1[1][1]-$array_turno1[0][1], //diferencia emisor
                $array_turno1[1][3]-1, //entrada contador
                $array_turno1[1][3]-$array_turno1[0][3], //Diferencia contador
                $array_turno1[0][2]+$array_turno1[0][4]+($array_turno1[1][0]-$array_turno1[0][0])-$array_turno1[0][5] //coches suma
                //2 coches inicio, 4 tarjetas, 0 entradas, 5 salidas totales
                ),

                /*0 FOLIO ENTRADA; 1 FOLIO EMISOR; 2 COCHES DENTRO; 3 CONTADOR; 4 TARJETAS; 5 SALIDAS TOTALES*/
                array( //turno 2, operaciones
                    $array_turno1[2][0]-1, //entrada rojos
                    $array_turno1[2][0]-$array_turno1[1][0], //diferencia folio rojos
                    $array_turno1[2][1]-1, //entrada emisor
                    $array_turno1[2][1]-$array_turno1[1][1], //diferencia emisor
                    $array_turno1[2][3]-1, //entrada contador
                    $array_turno1[2][3]-$array_turno1[1][3], //diferencia contador
                    $array_turno1[1][2]+$array_turno1[1][4]+($array_turno1[2][0]-$array_turno1[1][0])-$array_turno1[1][5],
                ),
                /*FOLIOS ROJOS 3; EMISOR SIGUIENTE 2; CONTADOR SIGUIENTE: 4;*/
                array( //turno 3 operaciones
                    $array_siguiente[0][3]-1, //entrada rojos
                    $array_siguiente[0][3]-$array_turno1[2][0], //diferencia foliios rojos
                    $array_siguiente[0][2]-1, //entrada emisor
                    $array_siguiente[0][2]-$array_turno1[2][1], //diferencia emisor
                    $array_siguiente[0][4]-1, //entrada contador
                    $array_siguiente[0][4]-$array_turno1[2][3], //diferencia contador
                    $array_turno1[2][2]+$array_turno1[2][4]+($array_siguiente[0][3]-$array_turno1[2][0])-$array_turno1[2][5]
                )
                );
 
                
            //folios rojoooooooooooooooooooooooooooooooooooooos
            try {
          $actualizar_rojos="UPDATE folios_rojos
                SET folio_salida=
                    CASE
                        WHEN idfolios_rojos=".$array_turno1[0][0]." then  ".$array_resultados[0][0]."
                        WHEN idfolios_rojos=".$array_turno1[1][0]." then  ".$array_resultados[1][0]."
                        WHEN idfolios_rojos=".$array_turno1[2][0]." then  ".$array_resultados[2][0]."
                    END,
                    diferencia_folio=
                        CASE
                            WHEN idfolios_rojos=".$array_turno1[0][0]." then  ".$array_resultados[0][1]."
                            WHEN idfolios_rojos=".$array_turno1[1][0]." then  ".$array_resultados[1][1]."
                            WHEN idfolios_rojos=".$array_turno1[2][0]." then  ".$array_resultados[2][1]."
                        END
                    WHERE idfolios_rojos IN(".$array_turno1[0][0].",".$array_turno1[1][0].",".$array_turno1[2][0].")";
                   // print_r($actualizar_rojos);
                   $resultado_updaterojos=$cone->ExecuteQuery($actualizar_rojos) or die ("ERROR EN EL UPDATE ROJOS");
                //self::mostrar_cortefinal($fecha);

            //folio emisorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
            $actualizar_emisor="UPDATE folio_emisor SET emisor_salida=
                CASE
                    WHEN idfolio_emisor=".$array_turno1[0][0]." then  ".$array_resultados[0][2]."
                    WHEN idfolio_emisor=".$array_turno1[1][0]." then  ".$array_resultados[1][2]."
                    WHEN idfolio_emisor=".$array_turno1[2][0]." then  ".$array_resultados[2][2]."
                END,
                    diferencia_emisor=
                        CASE
                            WHEN idfolio_emisor=".$array_turno1[0][0]." then  ".$array_resultados[0][3]."
                            WHEN idfolio_emisor=".$array_turno1[1][0]." then  ".$array_resultados[1][3]."
                            WHEN idfolio_emisor=".$array_turno1[2][0]." then  ".$array_resultados[2][3]."
                        END
                WHERE idfolio_emisor IN (".$array_turno1[0][0].",".$array_turno1[1][0].",".$array_turno1[2][0].")";
                $resultado_emisor=$cone->ExecuteQuery($actualizar_emisor) or die ("ERROR EN EL UPDATE EMISOR");

                //CONTADOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOORRRRRR
                $actualizar_contador="UPDATE contador_est SET salida_contador=
                CASE
                    WHEN idcontador_est=".$array_turno1[0][0]." then  ".$array_resultados[0][4]."
                    WHEN idcontador_est=".$array_turno1[1][0]." then  ".$array_resultados[1][4]."
                    WHEN idcontador_est=".$array_turno1[2][0]." then  ".$array_resultados[2][4]."
                END,
                    diferencia_contador=
                        CASE
                            WHEN idcontador_est=".$array_turno1[0][0]." then ".$array_resultados[0][5]."
                            WHEN idcontador_est=".$array_turno1[1][0]." then ".$array_resultados[1][5]."
                            WHEN idcontador_est=".$array_turno1[2][0]." then ".$array_resultados[2][5]."
                        END
        WHERE idcontador_est IN (".$array_turno1[0][0].",".$array_turno1[1][0].",".$array_turno1[2][0].")";
        $resultado_contador=$cone->ExecuteQuery($actualizar_contador) or die ("ERROR EN EL UPDATE CONTADOR");

        $actualizar_cochesdentro="UPDATE coches_dentro SET coches_salida=
        CASE
            WHEN idcoches_dentro=".$array_turno1[0][0]." then  ".$array_resultados[0][6]."
            WHEN idcoches_dentro=".$array_turno1[1][0]." then  ".$array_resultados[1][6]."
            WHEN idcoches_dentro=".$array_turno1[2][0]." then  ".$array_resultados[2][6]."
        END, 
                diferencia_coches=
                    CASE
                        WHEN idcoches_dentro=".$array_turno1[0][0]." then  0
                        WHEN idcoches_dentro=".$array_turno1[1][0]." then  ".$array_turno1[0][9]."
                        WHEN idcoches_dentro=".$array_turno1[2][0]." then  ".$array_turno1[1][9]."
                    END
            WHERE idcoches_dentro IN (".$array_turno1[0][0].",".$array_turno1[1][0].",".$array_turno1[2][0].")";
            $resultado_coches=$cone->ExecuteQuery($actualizar_cochesdentro) or die ("ERROR EN EL UPDATE coches");
                
            }catch(Exception $e)
            {
            echo "ERROR AL INSERTAR";}
            self::mostrar_cortefinal($fecha);
            }  
//esto ya quedooooooooooooooooooooooo
    public function mostrar_reporte($id_empleado,$fecha){
        $cone=new Conneciones();
        $cone->Conectar();


        $consulta_reporte="SELECT * from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
        inner join folios_rojos ON reportes_cortes.idrojos=folios_rojos.idfolios_rojos inner join contador_est ON reportes_cortes.id_contador=contador_est.idcontador_est
        Inner join folio_emisor ON reportes_cortes.emisor_idfolio=folio_emisor.idfolio_emisor INNER JOIN coches_dentro ON reportes_cortes.coches_idcoches=coches_dentro.idcoches_dentro
        INNER JOIN boletos_tipos ON reportes_cortes.boletos_idboletos=boletos_tipos.idboletos_tipos INNER JOIN tarjetas_control ON
        reportes_cortes.tarjetas_idtarjetas=tarjetas_control.idtarjetas_control WHERE reportes_cortes.idcajeros=".$id_empleado." AND reportes_cortes.fecha_corte=".$fecha."";
        $resultado_reporte=$cone->ExecuteQuery($consulta_reporte) or die ("Error al consultar reporte");

        echo "
        <div class='col contenedor'>
        <table class='table table-responsive table-sm table-hover text_table_pq'>
        <thead class='thead-dark'>";
        while($columna_reporte=$resultado_reporte->fetch_array()){
           
        echo 
        " <tr>
            <th scope='col' colspan=2>Reporte de cajero: ".$columna_reporte['Nombre_cajero']." ".$columna_reporte['apellido_patCaje']."</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope='row'>Folio emisor</th>
                    <td>".$columna_reporte['emisor_entrada']."</td>
            </tr>
            <tr>
                <th scope='row'>Folios rojos</th>
                    <td>".$columna_reporte['folio_entrada']."</td>
            </tr>
            <tr>
                <th scope='row'>Contador</th>
                    <td>".$columna_reporte['inicio_contador']."</td>
            </tr>
            <tr>
                <th scope='row'>Coches dentro</th>
                    <td>".$columna_reporte['coches_incio']."</td>
            </tr>
            <tr>
                <th scope='row'>Entradas con tarjeta</th>
                    <td>".$columna_reporte['entrada_tarjeta']."</td>
            </tr>
            <tr>
                <th scope='row'>Boletos cobrados</th>
                    <td>".$columna_reporte['boletos_cobrados']."</td>
            </tr>
            <tr>
                <th scope='row'>Boletos tolerancia</th>
                    <td>".$columna_reporte['boletos_tolerancia']."</td>
            </tr>
            <tr>
                <th scope='row'>Cortesías</th>
                    <td>".$columna_reporte['boletos_cortesia']."</td>
            </tr>
            <tr>
                <th scope='row'>GUADA</th>
                    <td>".$columna_reporte['boletos_guada']."</td>
            </tr>
            <tr>
                <th scope='row'>Boletos perdidos</th>
                    <td>".$columna_reporte['boletos_perdidos']."</td>
            </tr>
            <tr>
                <th scope='row'>Boletos totales</th>
                    <td>".$columna_reporte['boletos_totales']."</td>
            </tr>
            <tr>
                <th scope='row'>Salidas con tarjeta</th>
                    <td>".$columna_reporte['entrada_tarjeta']."</td>
            </tr>
            <tr>
                <th scope='row'>Salidas totales</th>
                    <td>".$columna_reporte['total_salidas']."</td>
            </tr>
        </tbody>";
        }
        echo " 
        </table>
         </div> <!--Fin de columna-->";
        $cone->Cerrar();
    }


    public function mostrar_cortefinal($fecha)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $consulta_corteFinal="SELECT * from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
        inner join folios_rojos ON reportes_cortes.idrojos=folios_rojos.idfolios_rojos inner join contador_est ON reportes_cortes.id_contador=contador_est.idcontador_est
        Inner join folio_emisor ON reportes_cortes.emisor_idfolio=folio_emisor.idfolio_emisor INNER JOIN coches_dentro ON reportes_cortes.coches_idcoches=coches_dentro.idcoches_dentro
        INNER JOIN boletos_tipos ON reportes_cortes.boletos_idboletos=boletos_tipos.idboletos_tipos INNER JOIN tarjetas_control ON
        reportes_cortes.tarjetas_idtarjetas=tarjetas_control.idtarjetas_control
        INNER JOIN turnos_caje ON empledos_cajeros.turnos_caje_idturnos_caje=turnos_caje.idturnos_caje 
        
        WHERE reportes_cortes.fecha_corte=".$fecha."";
        $resultado_corteFinal=$cone->ExecuteQuery($consulta_corteFinal) or die ("Error al consultar corte final");

        $verificador=mysqli_num_rows($resultado_corteFinal) or die("NO HAY NADA PARA MOSTRAR");

        if($verificador>0){
        while($columna_corteFina=$resultado_corteFinal->fetch_array())
        {
        echo "
        <div class='col-4'>
        <table class='table table-hover table-responsive table-sm text_table'>
            <caption> <strong>Observaciones:</strong> 
                ".$columna_corteFina['observacion_cajero']."
            </caption>
            <thead class='thead-dark'>
            <tr>
                <th scope='col' colspan=2>Reporte final</th>
                <th scope='col'>Entrada</th>
                <th scope='col'>Salida</th>
            </tr>
            </thead>
            <tbody>
                <tr class='table-active'>
                    <th scope='row'>".$columna_corteFina['descripcion']."</th>
                        <td>".$columna_corteFina['Nombre_cajero']."</td>
                        <td>00:00 am</td>
                        <td>08:00 am</td>
                </tr>
                <tr>
                    <th scope='row'>Folio emisor</th>
                        <td>".$columna_corteFina['emisor_entrada']."</td>
                        <td>".$columna_corteFina['emisor_salida']."</td>
                        <td>".$columna_corteFina['diferencia_emisor']."</td>
                </tr>
                <tr>
                    <th scope='row'>Folios rojos</th>
                        <td>".$columna_corteFina['folio_entrada']."</td>
                        <td>".$columna_corteFina['folio_salida']."</td>
                        <td>".$columna_corteFina['diferencia_folio']."</td>
                </tr>
                <tr>
                    <th scope='row'>Contador</th>
                        <td>".$columna_corteFina['inicio_contador']."</td>
                        <td>".$columna_corteFina['salida_contador']."</td>
                        <td>".$columna_corteFina['diferencia_contador']."</td>
                </tr>
                <tr>
                    <th scope='row'>Coches dentro</th>
                        <td>".$columna_corteFina['coches_incio']."</td>
                        <td>".$columna_corteFina['coches_salida']."</td>
                        <td>".$columna_corteFina['diferencia_coches']."</td>
                </tr>
                <tr>
                    <th scope='row'>Entradas con tarjeta</th>
                        <td>".$columna_corteFina['entrada_tarjeta']."</td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Boletos cobrados</th>
                        <td>".$columna_corteFina['boletos_cobrados']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Boletos tolerancia</th>
                        <td>".$columna_corteFina['boletos_tolerancia']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Cortesías</th>
                        <td>".$columna_corteFina['boletos_cortesia']."</td>
                        <td></td>
                        <td></td>  
                </tr>
                <tr>
                    <th scope='row'>GUADA</th>
                        <td>".$columna_corteFina['boletos_guada']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Boletos perdidos</th>
                        <td>".$columna_corteFina['boletos_perdidos']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Boletos totales</th>
                        <td>".$columna_corteFina['boletos_totales']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Salidas con tarjeta</th>
                        <td>".$columna_corteFina['salidas_tarjeta']."</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope='row'>Salidas totales</th>
                        <td>".$columna_corteFina['total_salidas']."</td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>
    </div><!--fin de columna t1-->";
        $nuevo[]=$columna_corteFina['boletos_fisicos'];
        $efec_tarje[]=$columna_corteFina['efectivo_tarjeta'];
        $turnos[]=$columna_corteFina['descripcion'];
        $boletos[]=$columna_corteFina['boletos_totales'];
        }
        self::Obtener_Boletos($nuevo,$efec_tarje,$turnos,$boletos);
        $cone->Cerrar();   
    }else {echo "No hay nada para mostrar";}
    
    }
    public function MostrarTablaTotales()
    {
        $TotalSalidas=self::$arraytotales[0][5]+self::$arraytotales[1][5]+self::$arraytotales[2][5];
        $TotalContador=self::$arraytotales[0][6]+self::$arraytotales[1][6]+self::$arraytotales[2][6];
    
        echo "
        <table class='table  table-bordered table-hover text_table_pq'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col' colspan=3></th>
                    </tr>
                </thead>
        <tbody>
            <tr>
                <th scope='row'>Total salidas</th>
                    <td>".$TotalSalidas."</td>
            </tr>
            <tr>
                <th scope='row'>Total contador</th>
                    <td>".$TotalContador."</td>
            </tr>
            
        </tbody>
    </table>";
    
    }

    public function MostrarDatosCuentas()
    {
        $BoletosTotales=self::$arraytotales[0][7]+self::$arraytotales[1][7]+self::$arraytotales[2][7];
        $TotalTarjetas=self::$arraytotales[0][4]+self::$arraytotales[1][4]+self::$arraytotales[2][4];
        $TotalSalidas=self::$arraytotales[0][5]+self::$arraytotales[1][5]+self::$arraytotales[2][5];
        $TotalFinal=$BoletosTotales+$TotalTarjetas;
        $CarrosDiaSiguiente=$TotalFinal-$TotalTarjetas;
        echo "
        <table class='table  table-bordered table-hover text_table_pq'>
        <thead class='thead-dark'>
        <tr>
            <th scope='col' colspan=3></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope='row'>Coches dentro</th>
                    <td>0</td>
            </tr>
            <tr>
                <th scope='row'>Boletos totales</th>
                    <td>".$BoletosTotales."</td>
            </tr>
            <tr>
                <th scope='row'>Tarjetas totales</th>
                    <td>".$TotalTarjetas."</td>
            </tr>
            <tr class='table-info'>
                <th scope='row'>Total</th>
                    <td>".$TotalFinal."</td>
            </tr>
            <tr class='table-success'>
                <th scope='row'>Salidas totales</th>
                    <td>".$TotalSalidas."</td>
            </tr>
            <tr class='table-active'>
                <th scope='row'>Coches dentro día siguiente</th>
                <th scope='row'>".$CarrosDiaSiguiente."</th>
            </tr>
            
        </tbody>
    </table>";
    }

    public function MostrarDiaSiguiente()
    {
        echo "
        <table class='table table-hover text_table_pq'>
        <thead class='thead-dark'>
        <tr>
            <th scope='col' colspan=3>Día siguiente</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope='row'>Folios emisor</th>
                    <td>".self::$arraySiguiente[0][2]."</td>
                    <td></td>
            </tr>
            <tr>
                <th scope='row'>Folios rojos</th>
                    <td>".self::$arraySiguiente[0][3]."</td>
                    <td></td>
            </tr>
            <tr>
                <th scope='row'>Contador</th>
                    <td>".self::$arraySiguiente[0][4]."</td>
                    <td></td>
            </tr>
            <tr>
                <th scope='row'>Coches dentro</th>
                    <td>".self::$arraySiguiente[0][5]."</td>
                    <td>".self::$arraytotales[1][9]."</td>
            </tr>
        </tbody>
    </table>";
    }

    public function boletos_fisico()
    {              
            $nuevo_array=self::$array_boletos;
            $BoletosTotales=self::$arraytotales[0][7]+self::$arraytotales[1][7]+self::$arraytotales[2][7];
            $BoletosPerdidos=self::$arraytotales[0][8]+self::$arraytotales[1][8]+self::$arraytotales[2][8];
            $TotalBoletos= self::sumar_valores($nuevo_array);
            $TotalFinal=$BoletosTotales-$BoletosPerdidos-$TotalBoletos;
            echo "<div class='col'>
            <table class='table table-bordered table-hover  text_table_pq'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col' colspan=2><center>Boletos físicos <button type='submit' class='btn btn-sm btn-light' data-toggle='modal' data-target='#modal_BoletosFisicos'><i class='fas fa-edit'></i></button></center></th>
                 </tr>
            </thead>";
            echo "               
            <tbody>
                <tr>
                 <th scope='row'>TOTAL ENTRADA BOLETOS</th>
              
                        <td>".$BoletosTotales."</td>
                </tr>
                <tr>
                <th scope='row'>BOLETOS PERDIDOS</th>
             
                       <td>".$BoletosPerdidos."</td>
               </tr>
               <tr>
               <th scope='row'>BOLETOS FISICOS</th>
            
                      <td>".$TotalBoletos. "</td>
              </tr>
                ";   
        echo "
        <tr class='table-active'>
            <th scope='row'>BOLETOS FISICOS</th>";
            echo "<th scope='row'>".$TotalFinal. "</th>";
      echo "
        </tr>
    </tbody>
        </table>
        </div>";
    }
    
    public function dinero_turnos()
    {
        $dinero_tarjetas=self::$array_dinero;
        echo "       
        <div class='col'>
        <table class='table  table-bordered table-hover text_table_pq'>
            <thead class='thead-dark'>
            <tr>
                <th scope='col' colspan=2><center>Efectivo y Tarjeta<button type='submit' class='btn btn-sm btn-light' data-toggle='modal' data-target='#modal_EfectivoTarjeta'> Modificar <i class='fas fa-edit'></i></button></center></th>
            </tr>
            </thead>
            <tbody>";
        foreach($dinero_tarjetas as $turno=>$valor_dinero)
        {
       echo "
                <tr>
                    <th scope='row'>".self::$array_turnos[$turno]." </th>
                        <td>$".$valor_dinero."</td>
                </tr>";
        }
        echo "
                <tr class='table-active'>
                    <th scope='row'>Total</th>
                    <th scope='row'>$".self::sumar_valores($dinero_tarjetas);"</th>";
            echo "   </tr>
                
            </tbody>
        </table>
        </div>";
    }
    public function total_cobrados()
    {
        $boletos_cobrados=self::$boletos_totales;
        $turno=self::$array_turnos;

        echo "
        <div class='col'>
        <table class='table  table-bordered table-hover text_table_pq'>
            <thead class='thead-dark'>
            <tr>
                <th scope='col' colspan=2><center>Total cobrados </center></th>
            </tr>
            </thead>
            <tbody>";
            foreach($boletos_cobrados as $num =>$total_cobra)
            {
            echo "    
                <tr>
                    <th scope='row'>".$turno[$num]."</th>
                        <td>".$total_cobra."</td>
                </tr>";
            }
            echo "
                <tr class='table-active'>
                    <th scope='row'>Total</th>
                    <th scope='row'>".self::sumar_valores($boletos_cobrados)."</th>
                </tr>
                
            </tbody>
        </table>
    </div>";
    }

    public function MostrarFormulario()
    {
        echo"
        <form action='cajeros.php' method='POST'>
            <div class='row'>  
                <div class='col-6'>
                    <small> Nombre(s): </small>
                     <input  maxlength='35' class='form-control text-dark' type='text' name='nombreCajero'>                            
                </div>
            </div>
    
    <div class='row'> 
        <div class='col-md-6'>
            <small> Apellidos: </small>
            <input  maxlength='35' class='form-control text-dark' type='text' name='apellidosCajero'>
        </div>
    </div>

    <div class='row'>  
        <div class='col-md-6'>
            <small> Nombre de usuario: </small>
            <input  maxlength='35'  class='form-control text-dark' type='text' name='usuarioCajero'>     
        </div>
    </div> 
    
    <div class='row'>
        <div class='col-md-6'>
            <small> Contraseña: </small>
            <div class='row'>
                <div class='col-10'>
                    <input maxlength='35' id='showpass' class='form-control text-dark' type='password' name='passwordCajero'> 
                </div>
                <div class='col-1'>
                    <i class='al_left far fa-eye see_pwd' onclick='showPass()'></i>
                </div>
            </div>
        </div>
    </div> 
    <div class='row'>
            <div class='card-body al_left'>
                <button type='submit' class='btn btn-info shadows' name='guardarCajero'>Guardar</button>    
            </div>
    </div> 
    </form>
    ";
    }

    public function MostrarDatosCajeros($idCajero)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $mostrarCajeros="SELECT * from empledos_cajeros WHERE idempledos_cajeros=$idCajero";
        $resultadoCajeros=$cone->ExecuteQuery($mostrarCajeros) or die ("ERROR AL MOSTRAR CAJEROS");
        echo "<form action='cajeros.php' method='POST'>";
        while($columnaCajeros=$resultadoCajeros->fetch_array())
        {
        echo "
        <div class='row'>  
        <div class='col-6'>
            <small> Nombre(s): </small>
            <input maxlength='35' name='nomCajero' class='form-control text-dark' type='text' value='".$columnaCajeros['Nombre_cajero']."'>
            <input maxlength='35' name='idCajero' class='form-control text-dark' type='hidden' value='".$columnaCajeros['idempledos_cajeros']."'>                                  
        </div>
    </div> 
    <div class='row'> 
        <div class='col-md-6'>
            <small> Apellidos: </small>
            <input maxlength='35' name='apeCajero' class='form-control text-dark' type='text' value='".$columnaCajeros['apellido_patCaje']."'>
        </div>
    </div>

    <div class='row'>  
        <div class='col-md-6'>
            <small> Nombre de usuario: </small>
            <input maxlength='35'  name='usuCajero' class='form-control text-dark' type='text' value='".$columnaCajeros['usuario_caje']."'>     
        </div>
    </div> 
    
    <div class='row'>
        <div class='col-md-6'>
            <small> Contraseña: </small>
            <div class='row'>
                <div class='col-10'>
                    <input maxlength='35' id='showpass' name='passCajero' class='form-control text-dark' type='password' value='".$columnaCajeros['password_caje']."'> 
                </div>
                <div class='col-1'>
                    <i class='al_left far fa-eye see_pwd' onclick='showPass()'></i>
                </div>
            </div>
        </div>
    </div> 
    <div class='row'>
            <div class='card-body al_left'>
                <button type='submit' class='btn btn-info shadows' name='guardarCajero'>Guardar</button>    
                <button type='submit' class='btn btn-danger shadows' name='eliminarUsuario'>Eliminar usuario</button>  
            </div>
    </div> ";
        }
        echo "</form>";
        $cone->Cerrar();
    }
    public function EliminarEmpleado($idEmpleado)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $eliminarEmpleado="DELETE From empledos_cajeros WHERE idempledos_cajeros=$idEmpleado";
        $resultadoEliminar=$cone->ExecuteQuery($eliminarEmpleado) or die ("Error en eliminar empleados");
        header('Location: cajeros.php');
        $cone->Cerrar();
    }
    public function ModificarEmpleado($idEmpleado,$Nombre,$Apellido,$Usuario,$contrasena)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $modificarEmpleado="UPDATE empledos_cajeros SET Nombre_cajero='$Nombre', apellido_patCaje='$Apellido',
        usuario_caje='$Usuario', password_caje='$contrasena' WHERE idempledos_cajeros=$idEmpleado";
       // print_r($modificarEmpleado);
        $resultadoModif=$cone->ExecuteQuery($modificarEmpleado) or die ("Error al modificar");
        header('Location:cajeros.php');
        $cone->Cerrar();
    }
    public function InsertarNuevoCajero($Nombre,$Apellido,$Usuario,$contrasena){

        $cone= new Conneciones();
        $cone->Conectar();

        $insertarNuevoCajero="INSERT INTO empledos_cajeros (idempledos_cajeros,Nombre_cajero,apellido_patCaje,usuario_caje,password_caje,
        turnos_caje_idturnos_caje) VALUES (null,'$Nombre','$Apellido','$Usuario','$contrasena',1)";
       $resultado_nuevo=$cone->ExecuteQuery($insertarNuevoCajero) or die("ERROR AL INSERTAR NUEVO CAJERO");
        header('Location:cajeros.php');
        $cone->Cerrar();
    }

    public function VerificarEmpleados($idEmpleado,$Nombre,$Apellidos,$Usuario,$contrasena){

        $cone=new Conneciones();
        $cone->Conectar();
        $verificarEmpleado="SELECT * FROM empledos_cajeros WHERE idempledos_cajeros=$id_empleado";
        $resultadoEmpleado=$cone->ExecuteQuery($verificarEmpleado);
        if($resultadoEmpleado)
        {
            $verificador=mysqli_num_rows($resultadoEmpleado) or die("NO SIRVES");
            
            if($verificador>0)
            {  
                self::ModificarEmpleado($id_empleado,$Nombre,$Apellidos,$Usuario,$contrasena);
            }
            else {
                self::InsertarNuevoCajero($Nombre,$Apellidos,$Usuario,$contrasena);
            }
        }


    }
    
    public function sumar_valores($valor)
    {
       return array_sum($valor);    
    }
}

?>