<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>< / DashPark ></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php');?>
    <?php include('DatosBd.php'); ?>
</head>
<body class="bg_content">
    <form action="definir_accion.php" method="POST">
    <div class="side_card">
        <div class="card card_bg_side w-100 mb-2 padcar">
            <?php $fecha=$_GET['date']; ?>
            <div class="row padcar">
                <label class="text-center text-light"> <?php echo $fecha; ?> </label>
            </div><!--Fin row de fecha-->
            <div class="row padcar">
                <button type="submit" name="guardar_admin" class="btn btn-info btn-block shadows">Guardar</button>
            </div><!--Fin de btn guardar-->
            <div class="row padcar">
                <button type="submit" name="cancelar_admin" class="btn btn-dark btn-block shadows">Cancelar</button>
            </div><!--Fin de btn cancelar-->
             
        </div> <!--Fin card-->
    </div> <!--Fin del side card-->

   <div class="main">
       <div class="content">
            <div class="row"> <!--Row para editar valores de las tablas-->
                <div class="card w-100 mb-2 padcar">
                    <h4>Editar valores</h4>                 
                    <?php 
                     BD::mostrar_cortefinal($fecha)
                    ?>
                </div> <!--Fin card-->
            </div><!--Fin row card tablas-->
        </form>
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
<?php ob_end_flush(); ?>
