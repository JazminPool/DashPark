<?php
include("Editar_datos.php");
if(isset($_POST['cancelar_admin']))
{header('Location:cortefinal.php');}
else if(isset($_POST['guardar_admin']))
{
    $fecha=$_POST['fecha'];
    /*BOLETOS FISICOS*/
    $fisicos_uno=$_POST['turno1_fisico'];
    $fisicos_dos=$_POST['turno2_fisico'];
    $fisicos_tres=$_POST['turno3_fisico'];

    /*ENVIAR TURNO EFECTIVO*/
    $turno1_efectivo=$_POST['turno1_efectivo'];
    $turno2_efectivo=$_POST['turno2_efectivo'];
    $turno3_efectivo=$_POST['turno3_efectivo'];

     /*DIA SIGUIENTE*/
     $emisor_siguiente=$_POST['emisor_siguiente'];
     $rojos_siguiente=$_POST['rojos_siguiente'];
     $contador_siguiente=$_POST['contador_siguiente'];
     $coches_siguiente=$_POST['coches_siguiente'];

    /*OBSERVACIONES POR TURNO*/
    $ob_turno1=$_POST['turno1_bservacion'];
    $ob_turno2=$_POST['turno2_bservacion'];
    $ob_turno3=$_POST['turno3_bservacion'];

    /*AGREGAR OBSERVACION DEL DIA*/
    $ob_dia=$_POST['resumen_dia'];

    editar_bd::enviar_efectivo($fecha,$turno1_efectivo,$turno2_efectivo,$turno3_efectivo);  
    editar_bd::enviar_fisicos($fecha,$fisicos_uno,$fisicos_dos,$fisicos_tres);
    editar_bd::enviar_observaciones($fecha,$ob_turno1,$ob_turno2,$ob_turno3);
    editar_bd::dia_siguiente($fecha,$emisor_siguiente,$rojos_siguiente,$contador_siguiente,$coches_siguiente,$ob_dia);
    header('Location:cortefinal.php');


}else if(isset($_POST['AgregarCincho']))
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





?>