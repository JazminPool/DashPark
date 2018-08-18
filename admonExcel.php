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
    <?php include('header.php')?>

   <div class="main">
       <div class="content">

            <div class="row"> <!--Row para editar valores de las tablas-->
                <div class="card w-100 mb-2 padcar shadows">
                    <h4>Editar valores</h4>   

                    <div class="row"> <!--Row 1-->
                        <!-- Boletos fisicos -->
                        <div class="col">
                            <table class="table table-bordered table-hover  text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=2>Boletos físicos</th>
                                    <th scope="col">Diferencia</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Turno 1</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese valor" type="text">
                                            </td>
                                            <td>0</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese valor" type="text">
                                            </td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese valor" type="text">
                                            </td>
                                            <td>1</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Total</th>
                                        <th scope="row">180</th>
                                        <th scope="row">0</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna editar boletos fisicos-->

                        <!-- Efectivo y Tarjeta -->
                        <div class="col">
                            <table class="table  table-bordered table-hover text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=3>Efectivo y Tarjeta</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Turno 1</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Total</th>
                                        <th scope="row">$545</th>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div><!--fin de columna editar Efectivo y tarjetas-->

                    </div><!--fin del row 1-->

                    <div class="row"> <!--Row 2-->
                        
                        <!-- Dia siguiente -->
                        <div class="col">
                            <table class="table table-hover table-bordered text_table_pq">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" colspan=4>Día siguiente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Folios emisor</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>
                                                <input name="" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td>23</td>
                                            <td>23</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna Dia sifuiente-->

                    </div><!--fin del row 2-->

                </div> <!--Fin card-->

            </div><!--Fin row card tablas-->

            <div class="row"> <!--Row para editar comentarios y resumen del dia-->
                <div class="card w-100 mb-2 padcar shadows">
                    <h5>Agregar comentarios/observaciones por cada turno</h5>
                    <div class="row"><!-- Row de comentarios para c/turno-->

                        <div class="col-4">
                            <p class="lead">Turno 1</p>
                            <textarea class="form-control" id="" rows="2"></textarea>
                        </div> <!--Fin de col-->
                        
                        <div class="col-4">
                            <p class="lead">Turno 2</p>
                            <textarea class="form-control" id="" rows="2"></textarea>
                        </div> <!--Fin de col-->
                        
                        <div class="col-4">
                            <p class="lead">Turno 3</p>
                            <textarea class="form-control" id="" rows="2"></textarea>
                        </div> <!--Fin de col-->

                    </div><!--fin row de comentarios -->
                        
                    <hr>
                        
                    <div class="row"> <!--Row de resumen del dia-->
                        <div class="col-8">
                            <h5>Agregar resumen del día</h5>
                            <textarea class="form-control" id="" rows="2"></textarea>
                        </div> <!--Fin de col-->

                    </div><!--fin row de resumen del dia -->
                </div> <!--Fin del card-->
            </div><!--Fin del row card comentarios-->

       </div><!--Fin container-->
   </div><!--Fin main-->


</body>
</html>