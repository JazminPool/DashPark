<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estadisticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php');?>
</head>
<body>
    
    <?php include('nav.php'); ?>

    <div class="container-fluid"><br>

    <!-- Chart Anual -->
        <div class="row">
            <div class="col-md-4 text-center">
                <h4>Boletos totales por año</h4>
                <button class="btn" onclick="tareabien();">Tarea hecha</button>
                <button class="btn" onclick="borrar();">Advertencia</button>
                <button class="btn" onclick="errorlogin();">Login</button>
                <button class="btn" onclick="nofound();">No se encontró</button>
            </div><!--Fin col-->
        </div><!--Fin row title anual-->
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-11">
                <div class="anual">
                    <canvas id="graficoanual" height="250"></canvas> <!--grafica-->
                </div>
            </div>
        </div><!--Fin del row grafico anual-->

    

        <br><hr>
    <!-- Chart Mensual -->
        <div class="row">
            <div class="col-md-4 text-center">
                <h4>Boletos totales por meses</h4>
            </div>
            <div class="col-sm-1">
                <select onchange="mensuales(this.value);" class="custom-select custom-select-sm">
                    <?php
                        for ($i=2018; $i<= 2021; $i++) { 
                            if ($i == 2018) {
                                echo '<option value="'.$i.'" selected>' .$i. '</option>';
                            }else{
                                echo '<option value="'.$i.'">' .$i. '</option>';
                            }
                        }
                    ?>
                </select>
            </div> <!--Fin titulo-->
        </div><!--Fin de row title mensual-->
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="mensual">
                    <canvas id="grafico"></canvas> <!--grafica-->
                </div>
            </div>
        </div><!--Fin del row grafico mensual-->
        
        <br><hr>




    <!-- Chart Diario -->
        <div class="row">
            <div class="col-md-4 text-center">
                <h4>Boletos totales diarios</h4>
            </div>
            <div class="col-md-1">
                <!-- meses: -->
                <select id="month" onchange="diario($('#month').val(),$('#year').val());" class="custom-select custom-select-sm">
                    <?php
                        for ($i=1; $i <= 12; $i++) { 
                            if ($i == 1) {
                                echo '<option value="'.$i.'" selected>' .$i. '</option>';
                            }else{
                                echo '<option value="'.$i.'">' .$i. '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-1">
                <!-- años -->
                <select id="year" onchange="diario($('#month').val(),$('#year').val());" class="custom-select custom-select-sm">
                    <?php
                        for ($i=2018; $i<= 2021; $i++) { 
                            if ($i == 2018) {
                                echo '<option value="'.$i.'" selected>' .$i. '</option>';
                            }else{
                                echo '<option value="'.$i.'">' .$i. '</option>';
                            }
                        }
                    ?>
                </select>
            </div><!--Fin del titulo-->
        </div><!--Fin del row title diario-->
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="diario">
                    <canvas id="grafico_diario"></canvas> <!--grafica diaria-->
                </div>
            </div>
        </div><!--Fin del row grafico diario-->

    </div> <!--Fin container-->
</body>
    <script>

    /**Prueba alert */
    function tareabien(){
        //tarea guardada
        swal({
            title: "Tarea realizada", //titulo 
            text: "Se realizó correctamente la tarea!", //texto del alert
            icon: "success", //tipo de icono: success, info, error, warning
            button: "Continuar", //nombre del boton
            //className: "success",  //no sé como se usa
            //closeOnClickOutside: false, //para que no desaparezca cuando se da click afuera
            //timer: 3000, //tiempo para que desaparezca
            });
    }
    function errorlogin(){
        swal({
            title: "Usuario/Contraseña incorrecto", //titulo 
            text: "Ingrese correctamente su nombre de usuario y/o contraseña.", //texto del alert
            icon: "error", //tipo de icono: success, info, error, warning
            button: "Continuar", //nombre del boton
            //className: "success",  //no sé como se usa
            closeOnClickOutside: false, //para que no desaparezca cuando se da click afuera
            timer: 4000, //tiempo para que desaparezca
            });
    }
    function borrar(){
        swal({
            title: "¿Está seguro?", //titulo 
            text: "Estás a punto de borrar el registro, esta accion no podrá revertirse.", //texto del alert
            icon: "warning", //tipo de icono: success, info, error, warning
            buttons: true,
            dangerMode: true,
            //button: "Continuar", //nombre del boton
            //className: "success",  //no sé como se usa
            closeOnClickOutside: false, //para que no desaparezca cuando se da click afuera
            //timer: 3000, //tiempo para que desaparezca
        })
        .then((willDelete) => { 
            if (willDelete) {//si se borra
                swal("Borrado con éxito.", {
                icon: "success",
                });
            } else {//si no se borra
                swal("Has cancelado la acción.");
            }
        });
    }
    function nofound(){
        swal({
            title: "Sin registros", //titulo 
            text: "No se encontraron reportes en esa fecha, selecciona otra fecha.", //texto del alert
            icon: "warning", //tipo de icono: success, info, error, warning
            button: "Aceptar", //nombre del boton
            //className: "success",  //no sé como se usa
            //closeOnClickOutside: false, //para que no desaparezca cuando se da click afuera
            //timer: 3000, //tiempo para que desaparezca
            });
    }

 /*203101*/
    /*Estadisticas Anuales */
        $(document).ready(anuales(2018));

        function anuales(btn){
            $('.anual').html('<canvas id="graficoanual"  width="450"></canvas>');
            $.ajax({
                type: 'POST',
                url: 'consultas.php',
                data: 'btn='+btn,
                dataType: 'JSON',
                success:function(response){
                    var Datos = {
                            labels : ['2018', '2019', '2020', '2021','2022'],
                            datasets : [
                                {
                                    fillColor : '#ff638556', //COLOR DE LAS BARRAS
                                    strokeColor : 'rgb(255, 99, 132)', //COLOR DEL BORDE DE LAS BARRAS
                                    highlightFill : '#ff567a89', //COLOR "HOVER" DE LAS BARRAS
                                    highlightStroke : 'rgb(255, 99, 132)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                    data : response
                                }
                            ]
                        }
                    var contexto = document.getElementById('graficoanual').getContext('2d');
                    window.Barra_an = new Chart(contexto).Bar(Datos, { responsive : true });
                    Barra_an.clear();
                }
            });
            return false;
        }

    /*Estadisticas Mensuales*/
        $(document).ready(mensuales(2018));

        function mensuales(year){
            $('.mensual').html('<canvas id="grafico" width="450"></canvas>');
            $.ajax({
                type: 'POST',
                url:'consultas.php',
                data: 'year='+year,
                dataType: 'JSON',

                success:function(response){
                    var Datos = {
                        labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [
                            {
                                fillColor : '#97bbcd80', //barra
                                strokeColor : '#97bbcdcc', //borde
                                highlightFill: '#97bbcdbf', //hover barra
                                highlightStroke: '#97bbcd', //hover borde
                                data: response
                            }
                        ]
                    }

                    var context = document.getElementById('grafico').getContext('2d');
                    window.Barra = new Chart(context).Bar(Datos, {responsive : true});
                    Barra.clear();
                }
            });
            return false;
        }

    /*Estadisticas Diarias*/
        $(document).ready(diario(8,2018));
        
        function diario(month, year){
            $('.diario').html('<canvas id="grafico_diario" width="450"></canvas>');
            $.ajax({
                type: 'POST',
                url:'consultas.php',
                data: 'month='+month,
                data: 'year='+year,
                dataType: 'JSON',

                success:function(response){
                    var Datos = {
                        labels : ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                                  '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                  '11', '12', '13', '24', '25', '26', '27', '28', '29', '30', '31'],
                        datasets: [
                            {
                                fillColor : '#d89e6f80', //barra
                                strokeColor : '#d4844280', //borde
                                highlightFill: '#d67a2e80', //hover barra
                                highlightStroke: '#d4844280', //hover borde
                                data: response
                            }
                        ]
                    }

                    var context = document.getElementById('grafico_diario').getContext('2d');
                    window.Barra_day = new Chart(context).Bar(Datos, {responsive : true});
                    Barra_day.clear();
                }
            });
            return false;
        }

    </script>
</html>

