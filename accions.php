<?php
session_start();
require("conexion.php");
include('links.php');
$cone=new Conneciones();
$cone->Conectar();

$usu=$_POST['usuAdmin'];
$pass=$_POST['passAdmin'];

$verificarCajero="SELECT * FROM administrados_caje WHERE usuario_admin='$usu' AND password_admin='$pass'";
$resultadoCaje=$cone->ExecuteQuery($verificarCajero) or die ("Error en la consulta");
$verificador=mysqli_num_rows($resultadoCaje);
    
    if($verificador>0)
    {
        session_start();   
        $_SESSION['Admin']=$usu;
        header('Location:inicio.php');
    }else{
    echo  "'<script type='text/javascript'>
    swal({
        title: 'Usuario/Contraseña incorrecto', //titulo 
        text: 'Ingrese correctamente su nombre de usuario y/o contraseña.', //texto del alert
        icon: 'error', //tipo de icono: success, info, error, warning
        button: 'Continuar', //nombre del boton
        //className: 'success',  //no sé como se usa
        closeOnClickOutside: false, //para que no desaparezca cuando se da click afuera
        timer: 10000, //tiempo para que desaparezca
        }).then((value)=>{
            window.location.href='index.php';
        });
  
    </script>'";}



?>