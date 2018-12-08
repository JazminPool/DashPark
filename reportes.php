<?php
session_start();
if(!isset($_SESSION['Admin'])){
	header('Location:index.php');}
	else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DashPark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php')?>
</head>
<body class="bg_content">
    
    <?php include('nav.php')?>
    <?php  include("DatosBd.php"); ?>
   
   <div class="main">
       <div class="content">
        <form action="" method="POST">
            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="p_card">Seleccionar cajero</p>
                            <?php  BD::mostrar_cajeros();?>                               
                        </div><!--fin cardbody-->
                        <div class="col-md-4">
                            <p class="p_card">Seleccionar fecha</p>
                            <input id="date" class="form-control form-control-sm text-center" name="date" type="date">                         
                        </div><!--fin cardbody-->
                        <div class="col-md-4">
                            <p class="p_card">Ver corte del cajero seleccionado</p>
                            <button type="submit" name="ver_empleado" class="btn btn-sm shadows btn-info btn-block">Corte</button>
                        </div><!--fin cardbody-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->
            </form>
            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <!-- Reporte -->                            
                        <?php     
                            if(isset($_POST['ver_empleado']))
                            {
                                $id_empleado=$_POST['id_empleado'];
                                $fecha_empleado=$_POST['date'];
                                $fecha=date("Ymd",strtotime($fecha_empleado)); //Debe ser así para que agarre la consulta
                                BD::mostrar_reporte($id_empleado,$fecha);
                                
                                
                             }
                        ?>
                    </div><!--Fin de row-->
                </div> <!--Fin de card-->
            </div><!--fin row de tablas -->
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
                            <?php } ?>