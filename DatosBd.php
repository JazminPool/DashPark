<?php
include("conexion.php");
Class BD{
    public static $array_boletos=null;
    public static $array_dinero=null;
    public static $array_turnos=null;
    public static $boletos_totales=null;
    public static $arraytotales=null;
    public static $arraySiguiente=null;
    public static $fecha=null;
    public static $Datos=null;

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
    public function FechaCorte($fecha)
    {
        self::$fecha=$fecha;
    }
    public function DatosCambiar($Datos)
    {
        self::$Datos=$Datos;
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
    public function trae_datos($fecha)
    {
        $cone=new Conneciones();
        $cone->Conectar();
       
        $consulta_datos="SELECT folios_rojos.folio_entrada,folios_rojos.diferencia_folio ,folio_emisor.emisor_entrada,coches_dentro.coches_incio,
        contador_est.inicio_contador,tarjetas_control.entrada_tarjeta,reportes_cortes.total_salidas,contador_est.diferencia_contador,
        boletos_tipos.boletos_perdidos, coches_dentro.coches_salida, boletos_tipos.boletos_fisicos from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
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
                $columna_datos['coches_salida'], //9
                $columna_datos['boletos_fisicos'] //10
                
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
        self::FechaCorte($fecha);

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

    /**
    *  Método mostrar_reporte ya quedó
    *  Muestra el reporte de la fecha de un cajero en especifico 
    * Última modificación: 18/08/18 ; GLoria Aguilar
    **/
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

    /*
    * Método con modal ya quedó
    *Última modificación: Gloria Aguilar 27/09/18
    *Se agrego el método swithc
    */
    public function mostrar_cortefinal($fecha)
    {
        $editar_turno="editar";
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
                <th scope='col' colspan=2>
                    <button type='submit' class='btn btn-sm btn-light' style='float:left;' data-toggle='modal' 
                    data-target='#editar".$columna_corteFina['folio_entrada']."'>
                        <i class='fas fa-edit'></i>
                    </button>
                    <center>Reporte final </center>
                </th>  
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
    </div>";
        self::Swithc($columna_corteFina['folio_entrada'],$fecha);
        $nuevo[]=$columna_corteFina['boletos_fisicos'];
        $efec_tarje[]=$columna_corteFina['efectivo_tarjeta'];
        $turnos[]=$columna_corteFina['descripcion'];
        $boletos[]=$columna_corteFina['boletos_totales'];
        }
        self::Obtener_Boletos($nuevo,$efec_tarje,$turnos,$boletos);     
        $cone->Cerrar();   
    }else {echo "No hay nada para mostrar";}
    }

    /**
    *Método Swithc ya quedó
    *se manda a llamar los datos conforme fecha y el idfoliorojo
    *Última modificación: Gloria Aguilar 27/09/18
    */
    public function Swithc($id,$fecha)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $consulta_datosFinal="SELECT folios_rojos.folio_entrada,folios_rojos.folio_salida, folios_rojos.diferencia_folio,
        folio_emisor.emisor_entrada,folio_emisor.emisor_salida,folio_emisor.diferencia_emisor,contador_est.inicio_contador,
        contador_est.salida_contador,contador_est.diferencia_contador, coches_dentro.coches_incio,coches_dentro.coches_salida,
        coches_dentro.diferencia_coches, tarjetas_control.entrada_tarjeta, tarjetas_control.salidas_tarjeta,
        boletos_tipos.boletos_cobrados,boletos_tipos.boletos_tolerancia, boletos_tipos.boletos_guada,boletos_tipos.boletos_cortesia,
        boletos_tipos.boletos_perdidos,boletos_tipos.boletos_totales,reportes_cortes.total_salidas, empledos_cajeros.Nombre_cajero,
        reportes_cortes.observacion_cajero from reportes_cortes inner join empledos_cajeros ON reportes_cortes.idcajeros=empledos_cajeros.idempledos_cajeros
        inner join folios_rojos ON reportes_cortes.idrojos=folios_rojos.idfolios_rojos inner join contador_est ON 
        reportes_cortes.id_contador=contador_est.idcontador_est Inner join folio_emisor ON 
        reportes_cortes.emisor_idfolio=folio_emisor.idfolio_emisor INNER JOIN coches_dentro ON reportes_cortes.coches_idcoches=coches_dentro.idcoches_dentro
        INNER JOIN boletos_tipos ON reportes_cortes.boletos_idboletos=boletos_tipos.idboletos_tipos INNER JOIN tarjetas_control ON
        reportes_cortes.tarjetas_idtarjetas=tarjetas_control.idtarjetas_control
        INNER JOIN turnos_caje ON empledos_cajeros.turnos_caje_idturnos_caje=turnos_caje.idturnos_caje    
        WHERE reportes_cortes.fecha_corte=".$fecha." AND reportes_cortes.idreportes_cortes=".$id."";
        $resultadoDatos=$cone->ExecuteQuery($consulta_datosFinal) or die ("Error en Datos Final");
        while($columnaRes=$resultadoDatos->fetch_array())
        {
            $arrayDatos[]=array(
                $columnaRes['folio_entrada'], //0
                $columnaRes['folio_salida'], //1
                $columnaRes['diferencia_folio'], //2
                $columnaRes['emisor_entrada'], //3
                $columnaRes['emisor_salida'], //4
                $columnaRes['diferencia_emisor'], //5
                $columnaRes['inicio_contador'], //6
                $columnaRes['salida_contador'], //7
                $columnaRes['diferencia_contador'], //8
                $columnaRes['coches_incio'], //9
                $columnaRes['coches_salida'], //10
                $columnaRes['diferencia_coches'], //11
                $columnaRes['entrada_tarjeta'], //12
                $columnaRes['salidas_tarjeta'], //13
                $columnaRes['boletos_cobrados'], //14
                $columnaRes['boletos_tolerancia'], //15
                $columnaRes['boletos_guada'], //16
                $columnaRes['boletos_cortesia'], //17
                $columnaRes['boletos_perdidos'], //18
                $columnaRes['boletos_totales'], //19
                $columnaRes['total_salidas'], //20
                $columnaRes['Nombre_cajero'], //21
                $columnaRes['observacion_cajero'] //22
            );

            self::ModalEditarTurnos($id,$arrayDatos,$fecha);
        }
        $cone->Cerrar();   
    }

    /**
    *ESTE MÉTODO YA QUEDO
    *Última modificación: Gloria Aguilar 27/09/18
    *Modal con array, ya actualiza
    **/
    public function ModalEditarTurnos($id,$array,$fecha)
    {   
        echo "
        <form action='definir_accion.php' method='POST'>
        <div class='modal fade' id='editar".$id."' tabindex='-1' role='dialog' aria-labelledby='modal_EditTurnosTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-body bg-light'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button><h4>Turno 1</h4>
                        <div class='row'>
                            <div class='col-md-12'>
                                <table class='table table-hover table-responsive table-sm text_table'>
                                    <caption> <strong>Observaciones:</strong> 
                                        <input type='text' name='observacionNuevo' value='".$array[0][22]."' class='inp_editTurn font500'>
                                    </caption>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th scope='col' colspan=2>
                                                <center>Reporte final </center>
                                            </th>  
                                            <th scope='col'>Entrada</th>
                                            <th scope='col'>Salida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='table-active'>
                                            <th scope='row'>turno</th>
                                                <td>".$array[0][21]."</td>
                                                <td><input type='text' name='' value='' class='inp_editTurn font500'></td>
                                                <td><input type='text' name='' value='' class='inp_editTurn font500'></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Folio emisor</th>
                                                <td class='inp_textCenter'>".$array[0][3]."</td>
                                                <td>".$array[0][4]."</td>
                                                <td>".$array[0][5]."</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Folios rojos</th>
                                                <td>".$array[0][0]."</td>
                                                <td>".$array[0][1]."</td>
                                                <td>".$array[0][2]."</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Contador</th>
                                                <td>".$array[0][6]."</td>
                                                <td>".$array[0][7]."</td>
                                                <td>".$array[0][8]."</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Coches dentro</th>
                                                <td><input type='text' name='cochesNuevo' class='inp_editTurn font500' value=".$array[0][9]."></td>
                                                <td>".$array[0][10]."</td>
                                                <td>".$array[0][11]."</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Entradas con tarjeta</th>
                                                <td><input type='text' name='entradasNuevo' class='inp_editTurn font500' value=".$array[0][12]."></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Boletos cobrados</th>
                                                <td><input type='text' name='cobradosNuevo' value='".$array[0][14]."' class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Boletos tolerancia</th>
                                                <td><input type='text' name='toleranciaNuevo' value=".$array[0][15]." class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Cortesías</th>
                                                <td><input type='text' name='cortesiaNuevo' value=".$array[0][17]." class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>  
                                        </tr>
                                        <tr>
                                            <th scope='row'>GUADA</th>
                                                <td><input type='text' name='guadaNuevo' value=".$array[0][16]." class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Boletos perdidos</th>
                                                <td><input type='text' name='perdidosNuevo' value=".$array[0][18]." class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Boletos totales</th>
                                                <td>".$array[0][19]."</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Salidas con tarjeta</th>
                                                <td><input type='text' name='saltarjeNuevo' value=".$array[0][13]." class='inp_editTurn font500'></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Salidas totales</th>
                                                <td>".$array[0][20]."</td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type='hidden' name='fechaCorte' value='".$fecha."'>
                                <input type='hidden' name='idFolio' value='".$array[0][0]."'>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer bg-light'>
                        <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Cancelar</button> 
                        <button type='submit' class='btn btn-info btn-sm' name='nuevoCorte'>Guardar</button>
                    </div> 
                </div>
            </div>
        </div>
        </form>";
    
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
            <th scope='col' colspan=3>Día siguiente 
                <button type='submit' class='btn btn-sm btn-light' style='float: right;' data-toggle='modal' data-target='#modal_DiaSig".self::$fecha."'>
                    Modificar <i class='fas fa-edit'></i>
                </button>
            </th>
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
    self::modal_DiaSig();
    }

    public function boletos_fisico()
    {              
            $nuevo_array=self::$arraytotales[0][10];
            $BoletosTotales=self::$arraytotales[0][7]+self::$arraytotales[1][7]+self::$arraytotales[2][7];
            $BoletosPerdidos=self::$arraytotales[0][8]+self::$arraytotales[1][8]+self::$arraytotales[2][8];
            $TotalFinal=$BoletosTotales-$BoletosPerdidos-$nuevo_array;
            echo "<div class='col'>
            <table class='table table-bordered table-hover  text_table_pq'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col' colspan=2><center>Boletos físicos <button type='submit' class='btn btn-sm btn-light' 
                    data-toggle='modal' data-target='#modal_BoletosFisicos".self::$fecha."'><i class='fas fa-edit'></i></button></center></th>
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
            
                      <td>".$nuevo_array. "</td>
              </tr>
                ";   
        echo "
        <tr class='table-active'>
            <th scope='row'>TOTAL FALTANTE</th>";
            echo "<th scope='row'>".$TotalFinal. "</th>";
      echo "
        </tr>
    </tbody>
        </table>
        </div>";
        self::ModalTotalCobrados();
    }

    public function ModalTotalCobrados()
    {
        
        echo "
    <form action='definir_accion.php' method='POST'>
        <div class='modal fade' id='modal_BoletosFisicos".self::$fecha."' tabindex='-1' role='dialog' aria-labelledby='modal_BoletosFisicosTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
          <div class='modal-content'>
            <div class='modal-body bg-light'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button><h2>Boletos físicos</h2> <br>
              <div class='row'>
                  <div class='col-md-12'>
                      <h5>Boletos físicos:</h5>
                      <input type='text' name='boletosTotales' value='".self::$arraytotales[0][10]  ."' class='form-control'><br>
                      <input type='hidden' name='fechaCorte' value='".self::$fecha."'>
                  </div>
              </div>
            </div>
            <div class='modal-footer bg-light'>
              <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Cancelar</button> 
              <button type='submit' class='btn btn-info btn-sm' name='ingresarCobrados'>Guardar</button>
            </div> 
          </div>
        </div>
      </div>
    </form>";
    
    }
    
    public function dinero_turnos()
    {
        $dinero_tarjetas=self::$array_dinero;
        $Fecha=self::$fecha;
        echo "       
        <div class='col'>
        <table class='table  table-bordered table-hover text_table_pq'>
            <thead class='thead-dark'>
            <tr>
                <th scope='col' colspan=2><center>Efectivo y Tarjeta<button type='submit' class='btn btn-sm btn-light' data-toggle='modal' 
                data-target='#modal_EfectivoTarjeta".$Fecha."'> Modificar <i class='fas fa-edit'></i></button></center></th>
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
        self::ModalEfectivoyTarjeta();
    }

    public function ModalEfectivoyTarjeta()
    {
        $Fecha=self::$fecha;
        echo "
    <form action='definir_accion.php' method='POST'>    
        <div class='modal fade' id='modal_EfectivoTarjeta".$Fecha."' tabindex='-1' role='dialog' aria-labelledby='modalTabla_totalesTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
          <div class='modal-content'>
            <div class='modal-body bg-light'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button><h2>Efectivo y tarjeta</h2> <br>
              <div class='row'>
                  <div class='col-md-12'>
                      <h5>Total 1:</h5>
                      <input type='text' name='turno1_efectivo' value='".self::$array_dinero[0]."' class='form-control'><br>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-12'>
                      <h5>Total 2:</h5>
                      <input type='text' name='turno2_efectivo' value='".self::$array_dinero[1]."' class='form-control'><br>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-12'>
                      <h5>Total 3:</h5>
                      <input type='text' name='turno3_efectivo' class='form-control' value='".self::$array_dinero[2]."'><br>
                      <input type='hidden' name='fechaCorte' value='".self::$fecha."'>
                  </div>
              </div>
            </div>
            <div class='modal-footer bg-light'>
              <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Cancelar</button> 
              <button type='submit' class='btn btn-info btn-sm' name='guardarFisicos'>Guardar</button>
          </div>
          </div>
        </div>
      </div>
    </form>";
    }
    public function modal_DiaSig(){
        echo "
    <form action='definir_accion.php' method='POST'>
          <div class='modal fade' id='modal_DiaSig".self::$fecha."' tabindex='-1' role='dialog' aria-labelledby='modal_DiaSigTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
              <div class='modal-content'>
                <div class='modal-body bg-light'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button><h2>Día siguiente</h2> <br>
                  <div class='row'>
                      <div class='col-md-12'>
                          <h5>Folio emisor: </h5>
                          <input type='text' name='emisor_siguiente' class='form-control'><br>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-md-12'>
                          <h5>Folios rojos: </h5>
                          <input type='text' name='rojos_siguiente' class='form-control'><br>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-md-12'>
                          <h5>Contador: </h5>
                          <input type='text' name='contador_siguiente' class='form-control' value=''><br>
                      </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-12'>
                        <h5>Coches dentro: </h5>
                        <input type='text' name='coches_siguiente' class='form-control' value=''><br>
                        <input type='hidden' name='fechaCorte' value='".self::$fecha."'>
                    </div>
                  </div>  
                </div>
                <div class='modal-footer bg-light'>
                  <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Cancelar</button> 
                  <button type='submit' class='btn btn-info btn-sm' name='guardarDiaSig'>Guardar</button>
              </div>
              </div>
            </div>
          </div>
    </form>";   

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