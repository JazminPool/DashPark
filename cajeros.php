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
    <?php include('header.php')?>
    <?php include('nav.php')?>

   <div class="main">
       <div class="content">
       <h4>Información de los cajeros</h4>
            <div class="row">

                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="p_card">Seleccionar cajero para visualizar sus datos</p>
                            <select class="form-control form-control-sm text-center" id="">
                                <option>Cajero 1</option>
                                <option>Cajero 2</option>
                                <option>Cajero 3</option>
                            </select>                                
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <p class="p_card">Visualizar información del cajero</p>
                            <button type="button" class="btn btn-success btn-sm shadows btn-block">Ver</button>                      
                        </div><!--fin col-md-4-->

                        <div class="col-md-3">
                            <p class="p_card">Dar de alta a un nuevo cajero</p>
                            <button type="button" class="btn btn-dark btn-sm shadows btn-block">Añadir nuevo</button>                      
                        </div><!--fin col-md-4-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card header -->

                <div class="card w-100 mb-2 padcar shadows"> <!--Card del formulario-->
                    <div class="">
                        <div class="row">  <!--row de nombre-->
                            <div class="col-6">
                                <small> Nombre(s): </small>
                                <input name="" maxlength="35" class="form-control text-dark" type="text" required>                            
                            </div><!--fin col-md-6-->
                        </div><!--fin row de nombre-->
                        
                        <div class="row"> <!--row de apellido-->
                            <div class="col-md-6">
                                <small> Apellidos: </small>
                                <input name="" maxlength="35" class="form-control text-dark" type="text" required>
                            </div><!--fin col-md-6-->
                        </div> <!--Fin row apellido-->

                        <div class="row">  <!--row de usuario-->
                            <div class="col-md-6">
                                <small> Nombre de usuario: </small>
                                <input name="" maxlength="35"  class="form-control text-dark" type="text" required>     
                            </div><!--fin col-md-6-->
                        </div> <!--Fin row nombre usuario-->
                        
                        <div class="row"> <!--row de contraseña-->
                            <div class="col-md-6">
                                <small> Contraseña: </small>
                                <div class="row">
                                    <div class="col-10">
                                        <input name="" maxlength="35" id="showpass" class="form-control text-dark" type="password" required> 
                                    </div>
                                    <div class="col-1">
                                        <i class="al_left far fa-eye see_pwd" onclick="showPass()"></i>
                                    </div>
                                </div><!--Fin del row-->
                            </div><!--fin col-md-6-->
                        </div> <!--Fin row contraseña-->

                        <div class="row">
                            <div class="card-body al_left">
                                <button type="button" class="btn btn-info shadows">Guardar</button>    
                                <button type="button" class="btn btn-danger shadows">Eliminar usuario</button>  
                            </div><!--Fin columna botones-->
                        </div> <!--Fin row botones-->
                    </div>
                </div> <!--Fin card de formulario-->


            </div><!--Fin row-->
       </div><!--Fin container-->
   </div><!--Fin main-->


</body>
</html>