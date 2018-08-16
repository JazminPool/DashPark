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

   <div class="main">
       <h2>Reporte de cajeros</h2>
       <div class="container">
            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="card-body col-md-4">
                            <p class="lead">Seleccionar cajero</p>
                            <select class="form-control" id="">
                                <option>Cajero 1</option>
                                <option>Cajero 2</option>
                                <option>Cajero 3</option>
                            </select>                                
                        </div><!--fin cardbody-->
                        <div class="card-body col-md-4">
                            <p class="lead">Seleccionar fecha</p>
                            <input id="date" class="form-control" type="date">                         
                        </div><!--fin cardbody-->
                        <div class="card-body col-md-4">
                            <p class="lead">Ver corte del cajero seleccionado</p>
                            <button type="button" class="btn btn-primary btn-block">Corte</button>
                        </div><!--fin cardbody-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row-->
       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>