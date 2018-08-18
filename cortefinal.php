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
    <?php include('nav.php')?>

   <div class="main">
       <div class="content">

            <div class="row"> <!--Row del ecabezado de opciones-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">

                        <div class="col-md-6">
                            <p class="p_card">Seleccionar la fecha del reporte que desea ver. </p>
                            <input id="date" class="form-control form-control-sm" type="date">                         
                        </div><!--fin cardbody-->
                        
                        <div class="col-md-4">
                            <p class="p_card">Seleccionar fecha</p>
                            <button type="button" class="btn btn-warning btn-block btn-sm">Consultar</button>                        
                        </div><!--fin cardbody-->
                        
                        <div class="col-md-2">
                            <p class="p_card">Editar valores</p>
                            <a href="admonExcel.php" class="btn btn-dark btn-block btn-sm">Administrar</a>                        
                        </div><!--fin cardbody-->

                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:opciones-->

            <div class="row"> <!--Row de tablas-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">

                        <!-- Turno 1 -->
                        <div class="col-4">
                            <table class="table table-hover table-responsive table-sm text_table">
                                <caption> <strong>Observaciones:</strong> 
                                    Aquí irán los comentarios 'personales' de cada cajero
                                </caption>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=2>Reporte final</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Salida</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-active">
                                        <th scope="row">Turno 1</th>
                                            <td>Cajero 3</td>
                                            <td>00:00 am</td>
                                            <td>08:00 am</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folio emisor</th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>4242</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Entradas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos cobrados</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos tolerancia</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cortesías</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>  
                                    </tr>
                                    <tr>
                                        <th scope="row">GUADA</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos perdidos</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna t1-->

                        <!-- Turno 2 -->
                        <div class="col-4">
                            <table class="table table-hover table-responsive table-sm text_table">
                                <caption> <strong>Observaciones:</strong>   
                                    Aquí irán los comentarios 'personales' de cada cajero
                                </caption>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=2>Reporte final</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Salida</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-active">
                                        <th scope="row">Turno 1</th>
                                            <td>Cajero 3</td>
                                            <td>00:00 am</td>
                                            <td>08:00 am</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folio emisor</th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>4242</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Entradas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos cobrados</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos tolerancia</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cortesías</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>  
                                    </tr>
                                    <tr>
                                        <th scope="row">GUADA</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos perdidos</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna t2-->

                        <!-- Turno 3 -->
                        <div class="col-4">
                            <table class="table table-hover table-responsive table-sm text_table">
                                <caption> <strong>Observaciones:</strong> 
                                    Aquí irán los comentarios 'personales' de cada cajero
                                </caption>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=2>Reporte final</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Salida</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-active">
                                        <th scope="row">Turno 1</th>
                                            <td>Cajero 3</td>
                                            <td>00:00 am</td>
                                            <td>08:00 am</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folio emisor</th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>4242</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Entradas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos cobrados</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos tolerancia</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cortesías</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>  
                                    </tr>
                                    <tr>
                                        <th scope="row">GUADA</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos perdidos</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas con tarjeta</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas totales</th>
                                            <td>6935</td>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna t3-->

                    </div><!--fin row de tablas -->

                    <div class="row container">    
                        <h6 class="p_card">
                            <strong>Resumen del día:</strong><br>
                            Aquí irán comentarios del resumen final del día.
                        </h6>
                    </div> <!--Fin del row seccion:resumen-->
                    
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:tablas-->

            <div class="row"> <!--Row de tablitas-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">

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
                                            <td>30</td>
                                            <td>0</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>1</td>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>4242</td>
                                            <td>1</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Total</th>
                                        <th scope="row">180</th>
                                        <th scope="row">0</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna boletos fisicos-->

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
                                            <td>$590</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>$590</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>$590</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Total</th>
                                        <th scope="row">$545</th>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div><!--fin de columna Efectivo y tarjetas-->

                        <!-- Total cobrados -->
                        <div class="col">
                            <table class="table  table-bordered table-hover text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=3>Total cobrados</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Turno 1</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>90</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Total</th>
                                        <th scope="row">545</th>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div><!--fin de columna total cobrados -->

                        <!-- Tabla sin nombre -->
                        <div class="col">
                            <table class="table  table-bordered table-hover text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=3></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos totales</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tarjetas totales</th>
                                            <td>90</td>
                                    </tr>
                                    <tr class="table-info">
                                        <th scope="row">Total</th>
                                            <td>90</td>
                                    </tr>
                                    <tr class="table-success">
                                        <th scope="row">Salidas totales</th>
                                            <td>90</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th scope="row">Coches dentro día siguiente</th>
                                        <th scope="row">545</th>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div><!--fin de columna tabla sin nombre -->

                        <!-- Total total -->
                        <div class="col">
                            <table class="table  table-bordered table-hover text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=3></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Total entradas</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total salidas</th>
                                            <td>90</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total contador</th>
                                            <td>90</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div><!--fin de columna total total -->

                    </div><!--fin row de tablas -->
                    
                </div> <!--Fin card-->
            </div><!--Fin row de seccion:tablas-->

            <div class="row"> <!--Row del dia siguiente-->
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        
                        <!-- Dia siguiente -->
                        <div class="col">
                            <table class="table table-hover text_table_pq">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=4>Día siguiente</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Folios emisor</th>
                                            <td>9603</td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>8944</td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>3300</td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>22</td>
                                            <td>23</td>
                                            <td>23</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--fin de columna Dia sifuiente-->

                    </div><!--fin row de dia sig-->

                </div> <!--Fin card-->
            </div><!--Fin row de seccion:dia siguiente-->

       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>