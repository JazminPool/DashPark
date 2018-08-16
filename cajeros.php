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
       <h2>Información de los cajeros</h2>
       <div class="container">
            <div class="row">

                <div class="card w-100 mb-2 padcar">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="lead">Seleccionar cajero para visualizar sus datos</p>
                            <select class="form-control" id="">
                                <option>Cajero 1</option>
                                <option>Cajero 2</option>
                                <option>Cajero 3</option>
                            </select>                                
                        </div><!--fin col-md-6-->

                        <div class="col-md-4">
                            <p class="lead">Dar de alta a un nuevo cajero</p>
                            <button type="button" class="btn btn-warning btn-block">Añadir nuevo</button>                      
                        </div><!--fin col-md-6-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card header -->

                <div class="card w-100 mb-2 padcar">
                    <div class="row">
                        <div class="card-body col-md-6">
                            <small> Nombre(s): </small>
                            <input name="" class="inp_caj text-dark" type="text">                            
                        </div><!--fin col-md-6-->

                        <div class="card-body col-md-6">
                            <small> Apellidos: </small>
                            <input name="" class="inp_caj text-dark" type="text">                      
                        </div><!--fin col-md-6-->
                    </div><!--fin row de nombre y apellido-->
                    <br>
                    <div class="row">
                            <div class="card-body col-md-6">
                                <small> Nombre de usuario: </small>
                                <input name="" class="inp_caj text-dark" type="text">                            
                            </div><!--fin col-md-6-->
    
                            <div class="card-body col-md-6">
                                <small> Contraseña: </small>
                                <input name="" class="inp_caj text-dark" type="text">                      
                            </div><!--fin col-md-6-->
                        </div><!--fin row de nombre y apellido-->
                </div> <!--Fin card de formulario-->

                <div class="card w-100 mb-2 padcar">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead text-primary">Guardar los datos del cajero</p>
                            <button type="button" class="btn btn-primary btn-block">Guardar</button>                                                   
                        </div><!--fin col-md-6-->

                        <div class="col-md-6">
                            <p class="lead text-danger">Eliminar al cajero permanentemente</p>
                            <button type="button" class="btn btn-danger btn-block">Eliminar usuario</button>                      
                        </div><!--fin col-md-6-->
                    </div><!--fin row de botones-->
                </div> <!--Fin card de botones-->

            </div><!--Fin row-->
       </div><!--Fin container-->
   </div><!--Fin main-->


</body>
</html>