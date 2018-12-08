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

    <?php  include("DatosBd.php"); ?>
   
   <div class="main">
       <div class="content">

            <div class="row">
                <div class="card w-100 mb-2 padcar">
                    <div class="row">
                        <div class="col text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="coches_dentro" name="tipo" class="custom-control-input" checked="checked">
                                <label class="custom-control-label" for="coches_dentro">Coches dentro</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="efectivo" name="tipo" class="custom-control-input">
                                <label class="custom-control-label" for="efectivo">Efectivo generado</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="boletos" name="tipo" class="custom-control-input">
                                <label class="custom-control-label" for="boletos">Boletos</label>
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dias" name="tipo_vista" class="custom-control-input" checked="checked" onclick="mostrar_dias()">
                                <label class="custom-control-label" for="dias" onclick="mostrar_dias()">Ver por días</label>
                            </div>
                            <select class="col-2 custom-select cboxRb" id="selec_mes">
                                <option value="" disabled selected>Seleccione el mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                            </select>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="meses" name="tipo_vista" class="custom-control-input" onclick="mostrar_meses()">
                                <label class="custom-control-label" for="meses" onclick="mostrar_meses()">Ver por meses</label>
                            </div>
                            <select class="col-2 custom-select cboxRb" id="selec_ano" style="display:none;">
                                <option value="" disabled selected>Seleccione el año</option>
                                <option value="1">2018</option>
                                <option value="2">2019</option>
                                <option value="3">2020</option>
                            </select>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="turnos" name="tipo_vista" class="custom-control-input" onclick="mostrar_turnos()">
                                <label class="custom-control-label" for="turnos" onclick="mostrar_turnos()">Ver por turnos</label>
                            </div>
                            <select class="col-2 custom-select cboxRb" name="selec_turno" id="selec_turno" style="display:none;">
                                <option value="" disabled selected>Seleccione tipo</option>
                                <option value="ver_meses">Ver por meses</option>
                                <option value="ver_dias">Ver por días</option>
                            </select>


                        </div><!--fin col-md-8-->
                    </div><!--fin row de radios-->
                </div> <!--Fin card-->
            </div><!--Fin row encabezado-->


       </div><!--Fin container-->
   </div><!--Fin main-->


    

</body>
</html>