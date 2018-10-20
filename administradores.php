<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>< / DashPark ></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php')?>
</head>

<body class="bg_content"> 
    <?php include('nav.php')?>
    <?php include('Editar_datos.php'); ?>

   <div class="main">
       <div class="content">
       <h4>Información de los administradores</h4>
        <form action="" method="POST">
            <div class="row">
                <div class="card w-100 mb-2 padcar">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="p_card">Seleccionar administrador para visualizar sus datos</p>
                              <?php editar_bd::MostrarAdministradores();?>                           
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <p class="p_card">Ver información del administrador</p>
                            <button type="submit" name="verAdmin" class="btn btn-success btn-sm shadows btn-block">Ver</button>                      
                        </div><!--fin col-md-4-->

                        <div class="col-md-3">
                            <p class="p_card">Dar de alta a un nuevo administrador</p>
                            <button type="submit" name="anadirAdmin" class="btn btn-dark btn-sm shadows btn-block">Añadir nuevo</button>                      
                        </div><!--fin col-md-4-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card header -->

                <div class="card w-100 mb-2 padcar"> <!--Card del formulario-->
                    <div class="">
                        <?php
                        if(isset($_POST['verAdmin']))
                        {
                            $idAdmin=$_POST['idAmin'];
                            editar_bd::mostrarDatosAdmin($idAdmin);
                        }else if(isset($_POST['anadirAdmin']))
                        {
                            editar_bd::MostrarFormAdmin();
                        }
                        if(isset($_POST['guardarAdmin']))
                        {
                            if(empty($_POST['idAmin']))
                            {
                               $nomb=$_POST['nombreAdmin'];
                               $apellidos=$_POST['apellidosAdmin'];
                               $usuario=$_POST['usuarioAdmin'];
                               $password=$_POST['passwordAdmin'];
                               editar_bd::InsertarNuevoAdmin($nomb,$apellidos,$usuario,$password);
                            }else {
                                
                                $id=$_POST['idAmin'];
                                $nomb=$_POST['nomAdmin'];
                                $apellidos=$_POST['apeAdmin'];
                                $usuario=$_POST['usuAdmin'];
                                $password=$_POST['passAdmin'];
                                editar_bd::ModificarAdmin($id,$nomb,$apellidos,$usuario,$password);
                            }
                        }else if(isset($_POST['eliminarAdmin']))
                        {
                            $id=$_POST['idAmin'];
                            editar_bd::EliminarAdmin($id);
                        }                       
                        ?>
                    </div>
                </div> <!--Fin card de formulario-->


            </div><!--Fin row-->
        </form>   
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
<?php ob_end_flush(); ?>