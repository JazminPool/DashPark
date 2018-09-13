<?php
include("conexion.php");

Class editar_bd {

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
        print_r($trae_ids);
        echo "<br><br>";
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
    public function InsertarCinchos($NumCincho,$desdeCincho,$hastaCincho)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $insertarCinchos="INSERT INTO tabla_cinchos (idtablas_cinchos,numero_inicio,numero_fin)
        VALUES ($NumCincho,$desdeCincho,$hastaCincho)";
        $resultadoCinchos=$cone->ExecuteQuery($insertarCinchos) or die ("ERROR AL INSERTAR CINCHOS");
        header('Location:cinchos.php');
        $cone->Cerrar();
    }

    public function MostrarCinchos()
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $mostrarCinchos="SELECT * FROM tabla_cinchos";
        $resultadoCinchos=$cone->ExecuteQuery($mostrarCinchos) or die ("NO SE PUDO MOSTRAR CINCHOS");
        $eliminar='delete_aliado';
    echo "<table class='table table-responsive table-hover text_table_md'>
            <thead class='thead-light'>
                <tr>
                    <th scope='col'>Número de cincho</th>
                    <th scope='col'>Desde</th>
                    <th scope='col'>Hasta</th>
                    <th scope='col'>Acción</th>
                </tr>
            </thead>";
        while($columnaCinchos=$resultadoCinchos->fetch_array())
        {
  echo "<tbody>
            <tr>
                <th scope='row'>".$columnaCinchos['idtablas_cinchos']."</th>
                    <td>".$columnaCinchos['numero_inicio']."</td>
                    <td>".$columnaCinchos['numero_fin']."</td>
                    <td class='text-center'>
                        <button type='submit'  data-toggle='modal' 
                        data-target='#".$eliminar.$columnaCinchos['idtablas_cinchos']."' class='btn btn-danger btn-sm'>Eliminar</button>                      
                    </td>
            </tr>
        </tbody>";
        self::ModalEliminaCincho($columnaCinchos['idtablas_cinchos'],$eliminar);
        }
        
   echo "</table>";
   $cone->Cerrar();
    }
    public static function ModalEliminaCincho($idCincho,$eliminar)
    {
      echo "
      <form method=POST action='definir_accion.php'>
      <div class='modal fade bd-example-modal-sm' id='".$eliminar.$idCincho."' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
      <div class='modal-dialog modal-sm'>
        <div class='modal-content'>
        <input type='hidden' name='idCincho' value='$idCincho'>
          ¿Seguro que desea eliminar cincho ".$idCincho." ?, esta acción no puede revertirse.
          <button type='submit' name='eliminar_cincho' class='fuente-monse btn btn-danger align-derecha'>Borrar</button>
        </div>
      </div>
    </div>
    </form>";
    
    }

    public function EliminaCincho($idCincho)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $eliminaCincho="DELETE FROM tabla_cinchos WHERE idtablas_cinchos=$idCincho";
        $resultadoCincho=$cone->ExecuteQuery($eliminaCincho) or die ("ERROR AL ELIMINAR CINCHO");
        header('Location:cinchos.php');
        $cone->Cerrar();
    }

    public function dia_siguiente($fecha,$em_sig,$rojo_sig,$conta_sig,$coches_sig,$resumen)
    {
        $cone=new Conneciones();
        $cone->Conectar();

        $insertarDiaSiguiente="INSERT INTO dia_siguiente (iddia_siguiente,fecha_siguiente,folio_emisor,folios_rojos,
        contador,coches_dentro,resumen_dia) VALUES ($rojo_sig,$fecha,$em_sig,$rojo_sig,$conta_sig,$coches_sig,'$resumen')";
        print_r($insertarDiaSiguiente);
        $resultadoSiguiente=$cone->ExecuteQuery($insertarDiaSiguiente) or die ("ERROR AL INSERTAR DIA SIGUIENTE");
        
    }

      
    }
           
    

?>