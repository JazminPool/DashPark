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

            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="p_card">Seleccionar cajero</p>
                            <select class="form-control form-control-sm" id="">
                                <option>Cajero 1</option>
                                <option>Cajero 2</option>
                                <option>Cajero 3</option>
                            </select>                                
                        </div><!--fin cardbody-->
                        <div class="col-md-4">
                            <p class="p_card">Seleccionar fecha</p>
                            <input id="date" class="form-control form-control-sm" type="date">                         
                        </div><!--fin cardbody-->
                        <div class="col-md-4">
                            <p class="p_card">Ver corte del cajero seleccionado</p>
                            <button type="button" class="btn btn-sm btn-primary btn-block">Corte</button>
                        </div><!--fin cardbody-->
                    </div><!--fin row de select y date-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->

            <div class="row">
                <div class="card w-100 mb-2 padcar shadows">
                    <div class="row">

                        <!-- Reporte -->
                        <div class="col">
                            <table class="table table-hover table-sm text_table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan=2>Reporte de cajero: (Nombre del cajero)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Folio emisor</th>
                                            <td>1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>4242</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Entradas con tarjeta</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos cobrados</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos tolerancia</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cortesías</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">GUADA</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos perdidos</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Boletos totales</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas con tarjeta</th>
                                            <td>6935</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salidas totales</th>
                                            <td>6935</td>
                                    </tr>
                                </tbody>
                                </table>

                                <table class="table">
                            </table>
                        </div><!--fin de columna t1-->


                    </div><!--fin row de tablas -->

       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>