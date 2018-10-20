<?php
include("Editar_datos.php");
if(isset($_POST['cancelar_admin']))
{header('Location:cortefinal.php');}
else if(isset($_POST['guardar_admin']))
        {
            $fecha=$_POST['fecha'];

            /*ENVIAR TURNO EFECTIVO*/


            /*DIA SIGUIENTE*/


            /*COCHEEES SIGUIENTE*/
            $coches_sig1=$_POST['coches_sig1'];
            $coches_sig2=$_POST['coches_sig2'];

            /*OBSERVACIONES POR TURNO*/
            $ob_turno1=$_POST['turno1_bservacion'];
            $ob_turno2=$_POST['turno2_bservacion'];
            $ob_turno3=$_POST['turno3_bservacion'];

            /*AGREGAR OBSERVACION DEL DIA*/
            $ob_dia=$_POST['resumen_dia'];

        
            editar_bd::enviar_observaciones($fecha,$ob_turno1,$ob_turno2,$ob_turno3);
            editar_bd::dia_siguiente($fecha,$emisor_siguiente,$rojos_siguiente,$contador_siguiente,$coches_siguiente,$ob_dia);
            header('Location:cortefinal.php');


        }
    else if(isset($_POST['ingresarCobrados']))
            {
                $fecha=$_POST['fechaCorte'];
                $totalCobrados=$_POST['boletosTotales'];
                editar_bd::ObtenerFecha($fecha);
                editar_bd::enviar_fisicos($fecha,$totalCobrados);
                header('Location:cortefinal.php');

            }
        else if(isset($_POST['guardarFisicos']))
            {
                $fecha=$_POST['fechaCorte'];
                $turno1_efectivo=$_POST['turno1_efectivo'];
                $turno2_efectivo=$_POST['turno2_efectivo'];
                $turno3_efectivo=$_POST['turno3_efectivo'];
                editar_bd::ObtenerFecha($fecha);
                editar_bd::enviar_efectivo($turno1_efectivo,$turno2_efectivo,$turno3_efectivo);
                //header('Location:cortefinal.php');
                header("Location:cortefinal.php?date=".urlencode($fecha));                 
                
            } 
        else if(isset($_POST['guardarDiaSig']))
            {
                $fecha=$_POST['fechaCorte'];
                $emisor_siguiente=$_POST['emisor_siguiente'];
                $rojos_siguiente=$_POST['rojos_siguiente'];
                $contador_siguiente=$_POST['contador_siguiente'];
                $coches_siguiente=$_POST['coches_siguiente'];
                editar_bd::ObtenerFecha($fecha);
                editar_bd::dia_siguiente($emisor_siguiente,$rojos_siguiente,$contador_siguiente,$coches_siguiente);
                header('Location:cortefinal.php');
            }
        else if(isset($_POST['AgregarCincho']))
            {
                $NumCinchos=$_POST['NumPaquete'];
                $desdeCinchos=$_POST['desdeCinchos'];
                $hastaCinchos=$_POST['hastaCinchos'];             
                editar_bd::InsertarCinchos($NumCinchos,$desdeCinchos,$hastaCinchos);
            }
        else if(isset($_POST['eliminar_cincho']))
            {
                $idCincho=$_POST['idCincho'];
                editar_bd::EliminaCincho($idCincho);
            }
        else if(isset($_POST['nuevoCorte']))
            {
                $cochesNuevo=$_POST['cochesNuevo'];
                $entradasNuevo=$_POST['entradasNuevo'];
                $saltarjeNuevo=$_POST['saltarjeNuevo'];
                $cobradosNuevo=$_POST['cobradosNuevo'];
                $toleranciaNuevo=$_POST['toleranciaNuevo'];
                $guadaNuevo=$_POST['guadaNuevo'];
                $cochesAnterior=$_POST['cochesAnterior'];
                $cortesiaNuevo=$_POST['cortesiaNuevo'];
                $perdidosNuevo=$_POST['perdidosNuevo'];
                $observacionNuevo=$_POST['observacionNuevo'];
                $fecha=$_POST['fechaCorte'];
                $idFolio=$_POST['idFolio'];
                $inicioCorte=$_POST['inicioCorte'];
                $finCorte=$_POST['finCorte'];
                editar_bd::actualizarNuevoCorte($cochesNuevo,$entradasNuevo,$saltarjeNuevo,$cobradosNuevo,$toleranciaNuevo,$guadaNuevo,$cortesiaNuevo,$perdidosNuevo,$fecha,$idFolio,$observacionNuevo,
            $inicioCorte.":00",$finCorte.":00",$cochesAnterior);
            }
?>