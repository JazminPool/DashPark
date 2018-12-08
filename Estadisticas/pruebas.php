<?php  
    include('../conexion.php');

    $cone = new Conneciones();
                $cone->Conectar();
                $dia=0;
                $boletos_totales_diarios= array();
                for ($i=0; $i <=31 ; $i++) { 
                    $dia =$i+1;
                    $sql = $cone->ExecuteQuery("SELECT SUM(boletos_totales) AS boltotdia FROM reportes_cortes 
                                                INNER JOIN boletos_tipos ON idreportes_cortes=idboletos_tipos 
                                                WHERE MONTH(fecha_corte)='8' LIKE DAY('$i') AND YEAR(fecha_corte)='2018'
                                                ");
                    $boletos_totales_diarios[$i]=0;
                    foreach ($sql as $param_dia){echo $boletos_totales_diarios[$i] = ($param_dia['boltotdia'] == null)? 0 : $param_dia['boltotdia']; }
                }
                
                // $cone->Cerrar();
                return $boletos_totales_diarios;
            
    print_r($sql); echo '<br>';
    print_r($boletos_totales_diarios);

?>

<!-- <script>
    $(document).ready(anuales());
        function anuales(){
            $('.anual').html('<canvas id="graficoanual"></canvas>');
            $.ajax({
                // type: 'POST',
                url: 'pruebas.php',
                // data: 'btn',
                dataType: 'JSON',
                success:function(response){
                    alert("estoy empezando");
                    var Datos = {
                            labels : ['2018', '2019', '2020', '2021'],
                            datasets : [
                                {
                                    fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                    strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                    highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                    highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                    data : response
                                }
                            ]
                        }
                    var contexto = document.getElementById('grafico').getContext('2d');
                    window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                    Barra.clear();
                }
            });
            return false;
        }

</script> -->