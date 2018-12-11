<?php ob_start(); 
session_start();
if(!isset($_SESSION['Admin'])){
	header('Location:index.php');}
	else{?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>< / DashPark ></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php'); include('DatosBd.php');?>
</head>

<body class="bg_content">    
    <?php include('nav.php')?>
   <div class="main">
       <div class="content">
       <h4>Información de los cajeros</h4>
        <form action="" method="POST">       
            <div class="row">        
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="p_card">Seleccionar cajero para visualizar sus datos</p>
                            <?php BD::mostrar_cajeros(); ?>                               
                        </div><!--fin col-md-8-->
                        <div class="col-md-3">
                            <p class="p_card">Visualizar información del cajero</p>
                            <button type="submit" class="btn btn_main btn-sm shadows btn-block" name="verCajero">Ver</button>                      
                        </div><!--fin col-md-4-->
                        <div class="col-md-3">
                            <p class="p_card">Dar de alta a un nuevo cajero</p>
                            <button type="submit" class="btn btn_add btn-sm shadows btn-block" name="anadirCajero">Añadir nuevo</button>                      
                        </div><!--fin col-md-4-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card header -->     
                </form>         
                <div class="card w-100 mb-2 padcar shadows"> <!--Card del formulario-->
                    <div class="">
                        <?php
                            if(isset($_POST['verCajero']))
                            {
                                $idCajero=$_POST['id_empleado'];
                            BD::mostrarDatosCajeros($idCajero);
                            }else if(isset($_POST['anadirCajero']))
                            {
                              BD::MostrarFormulario();
                              
                            }
                            if(isset($_POST['guardarCajero']))
                            {
                                if(empty($_POST['idCajero']))
                                {
                                   $nomb=$_POST['nombreCajero'];
                                   $apellidos=$_POST['apellidosCajero'];
                                   $usuario=$_POST['usuarioCajero'];
                                   $password=$_POST['passwordCajero'];
                                   BD::InsertarNuevoCajero($nomb,$apellidos,$usuario,$password);
                                }else {
                                    
                                    $id=$_POST['idCajero'];
                                    $nomb=$_POST['nomCajero'];
                                    $apellidos=$_POST['apeCajero'];
                                    $usuario=$_POST['usuCajero'];
                                    $password=$_POST['passCajero'];
                                   BD::ModificarEmpleado($id,$nomb,$apellidos,$usuario,$password);
                                }
                            }else if(isset($_POST['eliminarUsuario']))
                            {
                                $id=$_POST['idCajero'];
                                BD::EliminarEmpleado($id);
                            }                       
                        ?>
                        
                        </div> <!--Fin row botones-->
                    </div>
                </div> <!--Fin card de formulario-->
            </div><!--Fin row-->
       
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
                        <?php }ob_end_flush(); ?>