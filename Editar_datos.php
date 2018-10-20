<?php
include("conexion.php");

Class editar_bd {

    public static $id_array;
    public static $fecha;
    public function mostrar_id(&$id_array,$fecha)
    {
        self::$id_array=$id_array;
        self::$fecha=$fecha;
        
    }

    public function ObtenerFecha($fecha)
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
        self::mostrar_id($array_id,$fecha);
    }

    public function enviar_efectivo($efectivo1,$efectivo2,$efectivo3)
    {
        $cone=new Conneciones();
        $cone->Conectar();
            $array_nuevo=self::$id_array;
            $envia_efe="UPDATE reportes_cortes
                        SET efectivo_tarjeta = 
                            CASE 
                            WHEN idreportes_cortes = $array_nuevo[0] THEN $efectivo1
                            WHEN idreportes_cortes = $array_nuevo[1] THEN $efectivo2
                            WHEN idreportes_cortes = $array_nuevo[2] THEN $efectivo3
                            END
                        WHERE idreportes_cortes IN ($array_nuevo[0],$array_nuevo[1],$array_nuevo[2])
                        ";
    $resultdo_update=$cone->ExecuteQuery($envia_efe) or die ("ERROR EN EL UPDATE");       
    } 

    public function enviar_fisicos($fecha,$fisico1)
    {
        $array_id=self::$id_array;

        $cone=new Conneciones();
        $cone->Conectar(); 
            $envia_fisco="UPDATE boletos_tipos
                        SET boletos_fisicos = 
                            CASE 
                            WHEN idboletos_tipos = $array_id[0] THEN $fisico1
                            WHEN idboletos_tipos = $array_id[1] THEN $fisico1
                            WHEN idboletos_tipos = $array_id[2] THEN $fisico1
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

    public function dia_siguiente($em_sig,$rojo_sig,$conta_sig,$coches_sig)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $fechadeSig=self::$fecha;
        $insertarDiaSiguiente="INSERT INTO dia_siguiente (iddia_siguiente,fecha_siguiente,folio_emisor,folios_rojos,
        contador,coches_dentro,resumen_dia) VALUES ($rojo_sig,$fechadeSig,$em_sig,$rojo_sig,$conta_sig,$coches_sig,null)";
        $resultadoSiguiente=$cone->ExecuteQuery($insertarDiaSiguiente) or die ("ERROR AL INSERTAR DIA SIGUIENTE");
        $cone->Cerrar();
        
    }

    public function MostrarAdministradores()
    {
        try{
            $cone=new Conneciones();
            $cone->Conectar();
    
            $MostrarAdministradores="SELECT * from administrados_caje";
            $resultadoAdministrados=$cone->ExecuteQuery($MostrarAdministradores) or die ("ERROR AL CONSULTAR ADMIN");
            echo "<select class='form-control form-control-sm text-center' name='idAmin'>";
                while($columnaAdmin=$resultadoAdministrados->fetch_array())
                {
                    echo "<option value='".$columnaAdmin['idadministrados_caje']."'>".$columnaAdmin['nombre_admin']." ".$columnaAdmin['apellido_pat_admin']."</option>";
                }
           echo "</select>";   
           //$cone->Cerrar();    
        }catch(mysqli_sql_exception $e){
           echo $e->getMessage();
        }
                      
    }
    public function mostrarDatosAdmin($idAdmin)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $MostrarDatosAdmin="SELECT * from administrados_caje WHERE idadministrados_caje=$idAdmin";
        $resultadoAdmin=$cone->ExecuteQuery($MostrarDatosAdmin) or die ("NO SE HA PODIDO VER ADMIN");
        echo "<form action='administradores.php' method='POST'>";
        While($colAdmin=$resultadoAdmin->fetch_array())
        {
    echo"<div class='row'>  
        <div class='col-6'>
            <small> Nombre(s): </small>
            <input name='nomAdmin' maxlength='35' class='form-control text-dark' type='text' value=".$colAdmin['nombre_admin'].">
            <input name='idAmin' maxlength='35' class='form-control text-dark' type='hidden' value=".$colAdmin['idadministrados_caje'].">                              
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>
            <small> Apellidos: </small>
            <input name='ApeAdmin' maxlength='35' class='form-control text-dark' type='text' value=".$colAdmin['apellido_pat_admin'].">
        </div>
    </div> 

    <div class='row'>  
        <div class='col-md-6'>
            <small> Nombre de usuario administrador: </small>
            <input name='usuAdmin' maxlength='35'  class='form-control text-dark' type='text' value=".$colAdmin['usuario_admin'].">     
        </div>
    </div> 
    
    <div class='row'> 
        <div class='col-md-6'>
            <small> Contraseña de administrador: </small>
            <div class='row'>
                <div class='col-10'>
                    <input name='passAdmin' maxlength='35' id='showpass' class='form-control text-dark' type='password' value=".$colAdmin['password_admin']."> 
                </div>
                <div class='col-1'>
                    <i class='al_left far fa-eye see_pwd' onclick='showPass()'></i>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='card-body al_left'>
            <button type='submit' name='guardarAdmin' class='btn btn-info shadows'>Guardar</button>    
            <button type='submit' name='eliminarAdmin' class='btn btn-danger shadows'>Eliminar usuario</button>  
        </div>
    </div>";
    }
    echo "</form>";
    }
    public function MostrarFormAdmin()
    {
        echo"
        <form action='administradores.php' method='POST'>
            <div class='row'>  
                <div class='col-6'>
                    <small> Nombre(s): </small>
                     <input  maxlength='35' class='form-control text-dark' type='text' name='nomAdmin'>        
                     <input  maxlength='35' class='form-control text-dark' type='hidden' name='idAmin'>                            
                </div>
            </div>
    
    <div class='row'> 
        <div class='col-md-6'>
            <small> Apellidos: </small>
            <input  maxlength='35' class='form-control text-dark' type='text' name='ApeAdmin'>
        </div>
    </div>

    <div class='row'>  
        <div class='col-md-6'>
            <small> Nombre de usuario de administrador: </small>
            <input  maxlength='35'  class='form-control text-dark' type='text' name='usuAdmin'>     
        </div>
    </div> 
    
    <div class='row'>
        <div class='col-md-6'>
            <small> Contraseña de administrador: </small>
            <div class='row'>
                <div class='col-10'>
                    <input maxlength='35' id='showpass' class='form-control text-dark' type='password' name='passAdmin'> 
                </div>
                <div class='col-1'>
                    <i class='al_left far fa-eye see_pwd' onclick='showPass()'></i>
                </div>
            </div>
        </div>
    </div> 
    <div class='row'>
            <div class='card-body al_left'>
                <button type='submit' class='btn btn-info shadows' name='guardarAdmin'>Guardar</button>    
            </div>
    </div> 
    </form>
    ";
    }
    public function InsertarNuevoAdmin($nomb,$apellidos,$usuario,$password)
    {
        $cone= new Conneciones();
        $cone->Conectar();
        $insertarNuevoAdmin="INSERT INTO administrados_caje (idadministrados_caje,nombre_admin,apellido_pat_admin,usuario_admin,password_admin)
         VALUES (null,'$nomb','$apellidos','$usuario','$password')";
       $resultado_nuevo=$cone->ExecuteQuery($insertarNuevoAdmin) or die("ERROR AL INSERTAR NUEVO ADMINISTRADOR");
        header('Location:administradores.php');
        $cone->Cerrar();
    }
    public function ModificarAdmin($idAdmin,$Nombre,$Apellido,$Usuario,$contrasena)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $modificarAdmin="UPDATE empledos_cajeros SET Nombre_cajero='$Nombre', apellido_patCaje='$Apellido',
        usuario_caje='$Usuario', password_caje='$contrasena' WHERE idempledos_cajeros=$idAdmin";
       // print_r($modificarEmpleado);
        $resultadoModif=$cone->ExecuteQuery($modificarAdmin) or die ("Error al modificar administrador");
        header('Location:administradores.php');
        $cone->Cerrar();
    }
    public function EliminarAdmin($idAdmin)
    {
        $cone=new Conneciones();
        $cone->Conectar();
        $eliminarAdmin="DELETE From administrados_caje WHERE idadministrados_caje=$idAdmin";
        $resultadoEliminar=$cone->ExecuteQuery($eliminarAdmin) or die ("Error en eliminar Admin");
        header('Location: administradores.php');
        $cone->Cerrar();
    }

    public function actualizarNuevoCorte($cochesNuvo,$entradasNuevo,$saltarjeNuevo,$cobradosNuevo,$toleranciaNuevo,$guadaNuevo,$cortesiaNuevo,$perdidosNuevo,$fecha,$idFolio,$observacionNuevo,
    $inicioCorte,$finCorte,$cochesAnterior)
    {
        $resultadoBoletos=$cobradosNuevo+$toleranciaNuevo+$guadaNuevo+$cortesiaNuevo+$perdidosNuevo;
        $resultadoTotales=$resultadoBoletos+$saltarjeNuevo;
        $cone=new Conneciones();
        $cone->Conectar();

        $actualizarCoches="UPDATE coches_dentro SET coches_incio=".$cochesNuvo.", diferencia_coches=".$cochesAnterior." WHERE idcoches_dentro=".$idFolio."";
        $resultadoCoches=$cone->ExecuteQuery($actualizarCoches) or die ("ERROR EN COCHES");

        $actualizarTarjetas="UPDATE tarjetas_control SET entrada_tarjeta=".$entradasNuevo.", salidas_tarjeta=".$saltarjeNuevo."
        WHERE idtarjetas_control=".$idFolio."";
        $resultadoTarjetas=$cone->ExecuteQuery($actualizarTarjetas) or die ("ERROR TARJETAS");
        
        $actualizarBoletos="UPDATE boletos_tipos SET boletos_cobrados=".$cobradosNuevo.", boletos_tolerancia=".$toleranciaNuevo.",
        boletos_guada=".$guadaNuevo.", boletos_cortesia=".$cortesiaNuevo.", boletos_perdidos=".$perdidosNuevo.", boletos_totales=".$resultadoBoletos." 
        WHERE idboletos_tipos=".$idFolio."";
        $resultadoBoletos=$cone->ExecuteQuery($actualizarBoletos) or die ("Error boletos");
        
        $actualizarSalidas="UPDATE reportes_cortes SET total_salidas=".$resultadoTotales.", observacion_cajero='".$observacionNuevo."',
        inicio_corte='".$inicioCorte."', fin_corte='".$finCorte."' WHERE idreportes_cortes=".$idFolio."";
        $resultadoSalidas=$cone->ExecuteQuery($actualizarSalidas) or die ("ERROR salidas reportes");
        header('Location:cortefinal.php');
    }
      
}          
    
?>