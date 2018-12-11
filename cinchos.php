<?php ob_start();
session_start();
if(!isset($_SESSION['Admin'])){
	header('Location:index.php');}
	else{ ?>
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
    <?php include("Editar_datos.php"); ?>
   <div class="main">
       <div class="content">
        <form action="definir_accion.php" method="POST">       
            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Numero de paquete de cincho -->
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"># Paquete</span>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" name="NumPaquete" onkeypress="return just_numbers(event)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-ticket icon_nav" style="color: #c97490;"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <!-- Desde: -->
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Desde</span>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" name="desdeCinchos" onkeypress="return just_numbers(event)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-ticket icon_nav" style="color: #c97490;"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <!-- Hasta: -->
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Hasta</span>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" name="hastaCinchos" onkeypress="return just_numbers(event)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-ticket icon_nav" style="color: #c97490;"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <button type="submit" name="AgregarCincho" class="btn btn_main btn-sm shadows btn-block">Añadir</button>                      
                        </div><!--fin col-md-4-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->
        </form>
            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col text-center align-self-center">
                           <?php 
                            editar_bd::MostrarCinchos();
                           ?>
                        </div><!--fin col-md-8-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado--> 
           
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
    <?php }ob_end_flush(); ?>