<?php
date_default_timezone_set('America/Lima');
session_start();
require("BDconexiones.php");
if(isset($_POST['generarReporte']))
{
    $id=$_SESSION['usuario'];
    $fecha=date("Ymd");
    $idCajero=consultas::VerificaCajeros($id);
    $horaInicio=$_POST['horaInicio'];
    $horaSalida=$_POST['horaSalida'];
    $folioEmisor=$_POST['folioEmisor'];
    $folioRojo=$_POST['folioRojo'];
    $contador=$_POST['contador'];
    $cochesDentro=$_POST['cochesDentro'];
    $entradasTarjeta=$_POST['entradaTarjeta'];
    $salidaTarjetas=$_POST['salidaTarjeta'];
    $boletosCobrados=$_POST['boletosCobrados'];
    $boletosTolerancia=$_POST['boletosTolerancia'];
    $boletosCortesia=$_POST['boletosCortesia'];
    $boletosGuada=$_POST['boletosGuada'];
    $boletosPerdidos=$_POST['boletosPerdidos'];

    consultas::insertar_datos($folioRojo, $folioEmisor, $contador, $cochesDentro, $entradasTarjeta, $salidaTarjetas, $boletosCobrados,
    $boletosTolerancia, $boletosCortesia, $boletosGuada, $boletosPerdidos,$fecha,$horaInicio.":00",$horaSalida.":00",$idCajero);
    unset($_SESSION['usuario']);
    session_destroy();
    echo'<script type="text/javascript">
    alert("Tarea Guardada");
    window.location.href="index.php";
    </script>';
    
}else if(isset($_POST['cerrarSesion']))
{
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location:index.php');
}


?>