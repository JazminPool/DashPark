<?php ob_start(); ?>
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
                <buttont type="submit" name="cancelar_admin" class="btn btn-dark btn-block shadows">Cancelar</button>
            </div><!--Fin de btn cancelar-->
             
        </div> <!--Fin card-->
    </div> <!--Fin del side card-->

   <div class="main">
       <div class="content">
            <div class="row"> <!--Row para editar valores de las tablas-->
                <div class="card w-100 mb-2 padcar">
                    <h4>Editar valores</h4>   
                    <input name="fecha" class="inp_login text-dark" type="hidden" value="<?php echo $fecha; ?>">
                    <div class="row"> <!--Row 1-->
                        <!-- Boletos fisicos -->
                        <div class="col">
                            <table class="table table-bordered table-hover  text_table_pq">
                                <thead class="thead-dark">                 
                                <tr>
                                    <th scope="col" colspan=2>Boletos físicos</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">BOLETOS FÍSICOS</th>
                                            <td>
                                                <input name="turno1_fisico" class="inp_login text-dark" placeholder="Ingrese valor" type="text">
                                            </td>
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
                                                <input name="turno1_efectivo" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 2</th>
                                            <td>
                                                <input name="turno2_efectivo" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Turno 3</th>
                                            <td>
                                                <input name="turno3_efectivo" class="inp_login text-dark" placeholder="Ingrese cantidad $" type="text">
                                            </td>
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
                                                <input name="emisor_siguiente" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folios rojos</th>
                                            <td>
                                                <input name="rojos_siguiente" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contador</th>
                                            <td>
                                                <input name="contador_siguiente" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Coches dentro</th>
                                            <td>
                                                <input name="coches_siguiente" class="inp_login text-dark" placeholder="Ingrese cantidad" type="text">
                                            </td>
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
                            <textarea class="form-control" name="turno1_bservacion" rows="2"></textarea>
                        </div> <!--Fin de col-->
                        
                        <div class="col-4">
                            <p class="lead">Turno 2</p>
                            <textarea type="text" class="form-control" name="turno2_bservacion" rows="2"></textarea>
                        </div> <!--Fin de col-->
                        
                        <div class="col-4">
                            <p class="lead">Turno 3</p>
                            <textarea class="form-control" name="turno3_bservacion" rows="2"></textarea>
                        </div> <!--Fin de col-->

                    </div><!--fin row de comentarios -->
                        
                    <hr>
                        
                    <div class="row"> <!--Row de resumen del dia-->
                        <div class="col-8">
                            <h5>Agregar resumen del día</h5>
                            <textarea class="form-control" name="resumen_dia" rows="2"></textarea>
                        </div> <!--Fin de col-->
                    </div><!--fin row de resumen del dia -->
                      
                </div> <!--Fin del card-->
            </div><!--Fin del row card comentarios-->
        </form>
       </div><!--Fin container-->
   </div><!--Fin main-->
</body>
</html>
<?php ob_end_flush(); ?>
