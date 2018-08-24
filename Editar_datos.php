<?php
require("conexion.php");

Class editar_bd{

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
            $envia_efe="UPDATE reportes_cortes
                        SET efectivo_tarjeta = 
                            CASE 
                            WHEN idreportes_cortes = $array_id[0] THEN $efectivo1
                            WHEN idreportes_cortes = $array_id[1] THEN $efectivo2
                            WHEN idreportes_cortes = $array_id[2] THEN $efectivo3
                            END
                        WHERE idreportes_cortes IN ($array_id[0],$array_id[1],$array_id[2])
                        AND fecha_corte = $fecha";
    $resultdo_update=$cone->ExecuteQuery($envia_efe) or die ("ERROR EN EL UPDATE");       
    } 

    public function enviar_fisicos($fecha,$fisico1,$fisico2,$fisico3)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $trae_ids="SELECT idreportes_cortes FROM reportes_cortes WHERE fecha_corte=$fecha";
        $resultado_ids=$cone->ExecuteQuery($trae_ids) or die("Error al traer turnos");
        while($columa_res=$resultado_ids->fetch_array())
        {
            $array_id[]=$columa_res['idreportes_cortes'];
        }   
            $envia_efe="UPDATE boletos_tipos
                        SET boletos_fisicos = 
                            CASE 
                            WHEN idboletos_tipos = $array_id[0] THEN $fisico1
                            WHEN idboletos_tipos = $array_id[1] THEN $fisico2
                            WHEN idboletos_tipos = $array_id[2] THEN $fisico3
                            END
                        WHERE idboletos_tipos IN ($array_id[0],$array_id[1],$array_id[2])";
    $resultdo_update=$cone->ExecuteQuery($envia_efe) or die ("ERROR EN EL UPDATE");       
    }

    public function enviar_observaciones($fecha,$ob1,$ob2,$ob3)
    {

    }

    public function dia_siguiente($fecha,$em_sig,$rojo_sig,$conta_sig,$coches_sig,$resumen)
    {

    }

    
}


?>