<?php
session_start();
require("conexion.php");
$cone=new conexionbd();
$cone->Conectar_bd();

$usu=$_POST['usuario'];
$pass=$_POST['password'];

$verificarCajero="SELECT * FROM empledos_cajeros WHERE usuario_caje='$usu' AND password_caje='$pass'";
$resultadoCaje=$cone->ExecuteQuery($verificarCajero);
if($verificarCajero)
{
    $verificador=mysqli_num_rows($resultadoCaje) or die ("No jala");
    
    if($verificador>0)
    {
        session_start();   
        $_SESSION['usuario']=$usu;
        header('Location:../DashPark-cajeros/inicio.php');
    }else{echo "no existes";}
}else{
    echo "Error";
}
?>