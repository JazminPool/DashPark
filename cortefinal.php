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
    <?php include('links.php')?>
    <?php include("DatosBd.php");?>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="js/functions.js"></script>

<script src="js/sweetalert.min.js"></script>

<body class="bg_content">   
    <?php include('nav.php')?>
   <div class="main">
       <div class="content">
       
    <form action="" method="POST">
            <div class="row"> <!--Row del ecabezado de opciones-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                       
                        <div class="col-md-6">
                            <p class="p_card">Seleccionar la fecha del reporte que desea ver. </p>
                            <input id="date" class="form-control form-control-sm" name="date" type="date" required>                         
                        </div><!--fin cardbody-->
                        
                        <div class="col-md-6">
                            <p class="p_card">Seleccionar fecha</p>
                            <button type="submit" name="consultar_cortes" class="btn btn_main btn-block btn-sm">Consultar</button>                        
                        </div><!--fin cardbody-->
                        <?php     
                            if(isset($_POST['consultar_cortes']))
                            { 
                                $fecha_corte=$_POST['date'];
                                $fecha=date("Ymd",strtotime($fecha_corte)); //Debe ser así para que agarre la consulta
                                echo "Estas en el corte\t".$fecha_corte;
                             ?>
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:opciones-->
    </form>
            <div class="row"> <!--Row de tablas-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row"> <!--CRAN AL ALACRAN AQUI-->      
                          <?php     
                                $var=BD::trae_datos($fecha);
                        ?>
                    </div><!--fin row de tablas -->
                    <div class="row container">    
                        <h6 class="p_card">
                        <strong>Resumen del día:</strong><br>
                            <?php BD::MandarResultado(); ?>
                        </h6>
                    </div> <!--Fin del row seccion:resumen-->
                    
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:tablas-->

            <div class="row"> <!--Row de tablitas-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                           <?php                      
                                BD::boletos_fisico();                          
                                BD::dinero_turnos();
                                BD::total_cobrados();

                            ?>
                        <!--fin de columna Efectivo y tarjetas-->

                        <!-- Total cobrados -->
                      <!--fin de columna total cobrados -->

                        <!-- Tabla sin nombre -->
                        <div class="col">
                           <?php BD::MostrarDatosCuentas(); ?>
                        </div><!--fin de columna tabla sin nombre -->

                        <!-- Total total -->
                        <div class="col">
                            <?php BD::MostrarTablaTotales();
                            ?>
                        </div><!--fin de columna total total -->

                    </div><!--fin row de tablas -->
                    
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:tablas-->

            <div class="row"> <!--Row del dia siguiente-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        
                        <!-- Dia siguiente -->
                        <div class="col">
                         <?php BD::MostrarDiaSiguiente(); }
                            }?>
                        </div><!--fin de columna Dia sifuiente-->

                    </div><!--fin row de dia sig-->

                </div> <!--Fin card-->
            </div><!--Fin row de seccion:dia siguiente-->

       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
                        <?php ob_end_flush(); ?>