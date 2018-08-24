<?php
require("conexion.php");

Class BD{
    public static $array_boletos=null;
    public static $array_dinero=null;
    public static $array_turnos=null;
    public static $boletos_totales=null;

    public function Obtener_boletos(&$array_boletos,&$array_dinero,&$array_turnos,&$boletos_totales)
     {   //global $array_boletos;
        self::$array_boletos=$array_boletos;
        self::$array_dinero=$array_dinero;
        self::$array_turnos=$array_turnos;
        self::$boletos_totales=$boletos_totales;
    } /*Metodo para obtener boeletos*/
  
    
    public function mostrar_cajeros()
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $consulta_cajeros="SELECT * from empledos_cajeros";
        $resultado_cajeros=$cone->ExecuteQuery($consulta_cajeros) or die("Error al consultar cajeros");

        echo "<select class='form-control form-control-sm' name='id_empleado'>";
        while($columna_cajeros=$resultado_cajeros->fetch_array())
        {
           
            echo "<option value='".$columna_cajeros['idempledos_cajeros']."'>".$columna_cajeros['Nombre_cajero']." ".$columna_cajeros['apellido_patCaje']."</option>";          
        }
        echo "</select>"; 
    }

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
        <div class='col'>
        <table class='table  table-bordered table-hover text_table_pq'>
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
        <table class='table'>
        </table>
         </div>";
        
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
        INNER JOIN turnos_caje ON empledos_cajeros.turnos_caje_idturnos_caje=turnos_caje.idturnos_caje WHERE reportes_cortes.fecha_corte=".$fecha."";
        $resultado_corteFinal=$cone->ExecuteQuery($consulta_corteFinal) or die ("Error al consultar corte final");

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
                        <td>".$columna_corteFina['salidas_tarjeta']."</td>
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
    }

    public function boletos_fisico()
    {
        
       

        
            $turnos_todos=self::$array_turnos;
            $nuevo_array=self::$array_boletos;
            echo "<div class='col'>
            <table class='table table-bordered table-hover  text_table_pq'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col' colspan=2>Boletos físicos</th>
                     <th scope='col'>Diferencia</th>
                 </tr>
            </thead>";
            foreach($nuevo_array as $valores =>$valor)
            {
        echo "               
        <tbody>
            <tr>
             <th scope='row'>".$turnos_todos[$valores]."</th>
          
                    <td>".$valor."</td>
                    <td>0</td>
            </tr>
            ";   
            }
        echo 
       "
        <tr class='table-active'>
            <th scope='row'>Total</th>";
            echo "<th scope='row'>". BD::sumar_valores($nuevo_array); "</th>";
        echo    "<th scope='row'>0</th>
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
                <th scope='col' colspan=3>Efectivo y Tarjeta</th>
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
        </div>
  ";
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
                <th scope='col' colspan=3>Total cobrados</th>
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

    
    public function sumar_valores($valor)
    {
       return array_sum($valor);    
    }
}

?>