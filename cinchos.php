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
    <?php  include("DatosBd.php"); ?>
   
   <div class="main">
       <div class="content">

            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="p_card">Número de paquete de cinchos</p>
                            <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" onkeypress="return just_numbers(event)" required>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <p class="p_card">Desde:</p>
                            <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" onkeypress="return just_numbers(event)" required>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <p class="p_card">Hasta:</p>
                            <input type="text" class="form-control form-control-sm text-center text-danger" maxlength="7" onkeypress="return just_numbers(event)" required>
                        </div><!--fin col-md-8-->

                        <div class="col-md-3">
                            <p class="p_card">Agregar nuevo paquete de cinchos</p>
                            <button type="button" class="btn btn-dark btn-sm shadows btn-block">Añadir</button>                      
                        </div><!--fin col-md-4-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->

            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col contenedor">
                            <table class="table table-responsive table-hover text_table_md">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Número de cincho</th>
                                    <th scope="col">Desde</th>
                                    <th scope="col">Hasta</th>
                                    <th scope="col">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">15796</th>
                                            <td>302</td>
                                            <td>0421</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm">Eliminar</button>                      
                                            </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">85972</th>
                                            <td>14312</td>
                                            <td>1321312</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm">Eliminar</button>                      
                                            </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin col-md-8-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado--> 

       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>