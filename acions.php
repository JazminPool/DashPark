<?php 
session_start();
if(isset($_SESSION['Admin']))
{
    unset($_SESSION['Admin']);
    session_destroy();
    echo'<script type="text/javascript">
    alert("Sesion Terminada");
    window.location.href="index.php";
    </script>';
}

?>