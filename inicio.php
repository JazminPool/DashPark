<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>< / DashPark ></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php')?>
</head>
<body class="bg_content" onload="mueveReloj()">
    
    <?php include('nav.php')?>
    <?php  include("DatosBd.php"); ?>
   
   <div class="main">
       <div class="content">

            <div class="row">
                <div class="card w-100 mb-2">
                    <div class="card-header"><h1 class="display-3">Bienvenid@s</h1></div>
                    <div class="card-body">
                        <label> 
                            < / DashPark > en versión Administradores.  <i class="fas fa-car-alt"></i>
                        </label>
                        <form role="form" name="form_reloj" class="form-group">
                            <br><h1>
                                <input type="text" class="display-2 reloj" name="reloj" onfocus="window.document.form_reloj.reloj.blur()">
                                <input type="text" class="reloj" name="fecha" onfocus="window.document.form_reloj.fecha.blur()">
                            </h1>
                        </form>
                    </div> <!--Fin del card body-->
                    <div class="card-footer text-center">
                        <p class="text_table_md">Desarrollado por </p>
                    </div><!--Fin del card footer-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->

       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>