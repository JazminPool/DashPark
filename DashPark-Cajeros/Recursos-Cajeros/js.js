/*
*
* Funcion de hora y fecha
*
*/ 
function mueveReloj(){
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();

    str_segundo = new String (segundo);
    if (str_segundo.length == 1)
       segundo = "0" + segundo;

    str_minuto = new String (minuto);
    if (str_minuto.length == 1)
       minuto = "0" + minuto;

    str_hora = new String (hora);
    if (str_hora.length == 1)
       hora = "0" + hora; 

    horaImprimible = hora + " : " + minuto + " : " + segundo;

    document.form_reloj.reloj.value = horaImprimible;
    
    //Fecha
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var f=new Date();

    fechaimp = (diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

    document.form_reloj.fecha.value = fechaimp;

    setTimeout("mueveReloj()",1000) ;
}

/*
*
* Funcion para solo numeros
*
*/
function just_numbers(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla==8){return true;}
    if(tecla==9){return true;}
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}