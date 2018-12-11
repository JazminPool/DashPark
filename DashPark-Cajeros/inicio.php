<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header('Location:index.php');}
	else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAJEROS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./Recursos-Cajeros/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./Recursos-Cajeros/styleCajeros.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500|Raleway:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="./Recursos-Cajeros/js.js"></script>
    <script src="./Recursos-Cajeros/bootstrap/bootstrapjs/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Alerts sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onload="mueveReloj()" class="bg_main">
    <?php include('BDconexiones.php'); ?>
<!-- Header -->
    <div class="jumbotron bordernone">
        <div class="container">
        <form action="acciones.php" Method="POST">    
            <div class="row">
                <div class="col-md-1 text-center col-sm-12">
                    <i class="fas fa-user-alt icon_cajero"></i>
                </div> <!--Fin de icono-->
                <div class="col-md-3 text-center">
                    <h1><?php echo $_SESSION['usuario'];?></h1>
                    <?php consultas::trae_turnos(); ?>
                </div> <!--Fin del nombre cajero-->
                <div class="col-md-3"></div>
                <div class="col-md-4 right text-center">
                    <div class="row">
                        <div class="col-6">
                            <h5>Hora entrada:</h5>
                            <input type="time" name="horaInicio" required>
                        </div>
                        <div class="col-6">
                            <h5>Hora salida:</h5>
                            <input type="time" name="horaSalida" required>
                        </div>
                    </div><!--Fin del row-->
                </div> <!--Fin de las horas-->
            </div><!--Fin del row-->

        </div><!--Fin del container-->
    </div> <!--Fin del (Header) jumbotron-->

<!-- CUERPO -->
    <div class="container-fluid">
    <!-- ROW MEGA PRINCIPAL -->
        <div class="row">

        <!-- CONTENEDOR UNO -->
            <div class="col-lg-10">

                <div class="container">

                <!-- COMIENZA ROW FORMULARIO -->
                    <div class="row">
                    
                    <!--  COMIENZA COLUMNA 1 -->
                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Folio emisor</h5>
                                    <input type="text" name="folioEmisor" minlength="7" maxlength="7" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                                <div class="col-lg-6">
                                    <h5>Folio rojo</h5>
                                    <input type="text" name="folioRojo"  minlength="6" maxlength="6" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                            </div><!--Fin del row Folios-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Contador</h5>
                                    <input type="text" name="contador" minlength="8" maxlength="8" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                            </div> <!--Fin del row Contador-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Coches dentro</h5>
                                    <input type="text" name="cochesDentro" maxlength="3" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                            </div> <!--Fin del row Coches dentro -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Entradas con tarjeta</h5>
                                    <input type="text" name="entradaTarjeta" maxlength="3" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                            </div> <!--Fin del row Entr. Tarjeta-->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Salidas con tarjeta</h5>
                                    <input type="text" name="salidaTarjeta" maxlength="3" required class="form-control form-control-sm" onkeypress="return just_numbers(event)">
                                </div>
                            </div> <!--Fin del row Sal. Tarjeta-->

                        </div><!--Fin de la columna 1 principal-->

                    <!-- COMIENZA COLUMNA 2  -->
                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Boletos cobrados</h5>
                                    <input type="text" name="boletosCobrados" maxlength="3" onkeypress="return just_numbers(event)" required class="form-control form-control-sm">
                                </div>
                            </div> <!--Fin del row Boletos cobrados-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Boletos tolerancia</h5>
                                    <input type="text" name="boletosTolerancia" maxlength="3" onkeypress="return just_numbers(event)" required class="form-control form-control-sm">
                                </div>
                            </div> <!--Fin del row Boletos tolerancia -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Boletos cortesía</h5>
                                    <input type="text" name="boletosCortesia" maxlength="3" onkeypress="return just_numbers(event)" required class="form-control form-control-sm">
                                </div>
                            </div> <!--Fin del row Boletos cortesía-->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Boletos GUADA</h5>
                                    <input type="text" name="boletosGuada" maxlength="3" onkeypress="return just_numbers(event)" required class="form-control form-control-sm">
                                </div>
                            </div> <!--Fin del row Boletos GUADA-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Boletos perdidos</h5>
                                    <input type="text" name="boletosPerdidos" maxlength="3" onkeypress="return just_numbers(event)" required class="form-control form-control-sm">
                                </div>
                            </div> <!--Fin del row Boletos perdidos-->

                        </div><!--Fin de la columna 2 principal-->

                    </div><!--Fin del row principal-->

                    <br>

                </div><!--Fin del container-->
            
            </div> <!--Fin columna main 1-->
            
        <!-- CONTENEDOR DOS (botones) -->
            <div class="col-lg-2">
                <button type="submit" name='generarReporte' class="btn btn-dark btn-block">Generar reporte</button>
            </form> <br>
            <form action="acciones.php" Method="POST">
                <button type="submit" name="cerrarSesion" class="btn btn-block bg-warning">Cerrar sesión</button>
                <br>
            </div> <!--Fin de columna main 2 (botones)-->
            </form><br>
        </div> <!--Fin del row mega principal-->
    </div> <!--Fin de cuerpo-->
    
    <!-- Footer -->
    <footer class="foot">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form role="form" name="form_reloj">
                        <h1><input type="text" class="reloj" name="reloj" onfocus="window.document.form_reloj.reloj.blur()"></h1>
                        <h5><input type="text" class="reloj" name="fecha" onfocus="window.document.form_reloj.fecha.blur()"></h5>
                    </form>
                </div>
            </div>
            
        </div>
    </footer>
       
    <!-- Fin del footer -->
   
    <!-- MODAL CAMBIO BOLETOS -->
    <div class="modal fade" id="cambioBoletos" tabindex="-1" role="dialog" aria-labelledby="cambioBoletosTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevos boletos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!--Fin del headermodal-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            Desde:
                            <input type="text" name="" class="form-control form-control-sm">                            
                        </div>
                        <div class="col-lg-6">
                            Hasta:
                            <input type="text" name="" class="form-control form-control-sm">                            
                        </div>
                    </div> <br>
                    Sobrantes físicos:
                    <input type="text" name="" class="form-control form-control-sm">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div><!--Fin modal content-->
        </div>
    </div> <!--Fin modal-->

</body>
</html>
    <?php }?>