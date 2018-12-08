<?php
    include('../conexion.php');
    /*reporte mensual, esto depende del año se mostrará mes con mes*/
    
    class Consultas extends Conneciones{
    
        /* Consulta anual: */    
            public function chart_anual_boltot($ano_Actual){
                $cone = new Conneciones(); //llamo a la clase de la conexion
                $cone->Conectar();  //llamo al metodo de la clase donde esta la conexion mediante su objeto

                $boletos_totales_anual = array();
                for ($i=0; $i <5 ; $i++) { 
                    $ano = $i+$ano_Actual;
                    $sql = $cone->ExecuteQuery("SELECT SUM(boletos_totales) AS boltotan 
                                                FROM reportes_cortes INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos 
                                                WHERE YEAR(fecha_corte)= '$ano'");
                    $boletos_totales_anual[$i]=0;
                    foreach($sql as $param_anual){
                        $boletos_totales_anual[$i]=($param_anual['boltotan']==null)? 0 : $param_anual['boltotan'];
                    }
                }
                $cone->Cerrar();
                return $boletos_totales_anual;
            }

        /* Consulta mensual: */
            public function chart_mensual_boltot($year){
                $cone = new Conneciones(); //llamo a la clase de la conexion
                $cone->Conectar();  //llamo al metodo de la clase donde esta la conexion mediante su obje
                $boletos_totales_mensual = array();
                for ($i=0; $i < 12; $i++) { 
                    $mes = $i+1;
                    $sql = $cone->ExecuteQuery("SELECT SUM(boletos_totales) AS boltot FROM reportes_cortes 
                                                INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos 
                                                WHERE MONTH(fecha_corte)= '$mes' AND YEAR(fecha_corte)='$year'");
                    $boletos_totales_mensual[$i]=0;
                    foreach ($sql as $param){ $boletos_totales_mensual[$i] = ($param['boltot'] == null)? 0 : $param['boltot']; }
                }
                $cone->Cerrar();
                return $boletos_totales_mensual;
            }
        /* Consulta diaria: */    
            public function chart_diario_boltot($month, $year){
                $cone = new Conneciones();
                $cone->Conectar();

                $boletos_totales_diarios= array();
                for ($i=0; $i <=31 ; $i++) { 
                    $dia =$i+1;
                    $sql = $cone->ExecuteQuery("SELECT SUM(boletos_totales) AS boltotdia FROM reportes_cortes 
                                                INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos 
                                                WHERE DAY(fecha_corte)='$dia' AND MONTH(fecha_corte)='$month' AND YEAR(fecha_corte)='$year'");
                    $boletos_totales_diarios[$i]=0;
                    foreach ($sql as $param_dia){ $boletos_totales_diarios[$i] = ($param_dia['boltotdia'] == null)? 0 : $param_dia['boltotdia']; }
                }
                $cone->Cerrar();
                return $boletos_totales_diarios;
            }


    }
    //Mensual:
    if (isset($_POST['year'])) {
        $class = new Consultas;
        $exClase = $class->chart_mensual_boltot($_POST['year']);
        exit(json_encode($exClase));
    }
    
    //anual:
    if(isset($_POST['btn'])){
        $classan = new Consultas;
        $exClase_anual = $classan->chart_anual_boltot(2018);
        exit(json_encode($exClase_anual));
    }

    //diario:
    if(isset($_POST['month'])&&isset($_POST['year'])){
        $classdi = new Consultas;
        $exClase_diar = $classdi->chart_diario_boltot(8,2018);
        exit(json_encode($exClase_diar));
    }


    /**
     * consulta anual:
     * SELECT boletos_totales AS boltot FROM reportes_cortes INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos WHERE YEAR(fecha_corte)= 2018
     * consulta mensual:
     * SELECT boletos_totales FROM reportes_cortes INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos WHERE MONTH(fecha_corte)=1 AND YEAR(fecha_corte)='$año'"
     * consulta diaria:
     * SELECT boletos_totales FROM reportes_cortes INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos WHERE DAY(fecha_corte)=18 AND MONTH(fecha_corte)=8 AND YEAR(fecha_corte)=2018
    */
?>