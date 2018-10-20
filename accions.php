<?php
session_start();
require("conexion.php");
$cone=new Conneciones();
$cone->Conectar();

$usu=$_POST['usuAdmin'];
$pass=$_POST['passAdmin'];

$verificarCajero="SELECT * FROM administrados_caje WHERE usuario_admin='$usu' AND password_admin='$pass'";
$resultadoCaje=$cone->ExecuteQuery($verificarCajero);
if($verificarCajero)
{
    $verificador=mysqli_num_rows($resultadoCaje) or die ("No salio");
    
    if($verificador>0)
    {
        session_start();   
        $_SESSION['Admin']=$usu;
        header('Location:inicio.php');
    }else{echo "No existes";}
}else{
    echo "Error";
}

?>