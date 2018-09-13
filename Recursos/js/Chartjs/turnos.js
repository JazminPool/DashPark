function mostrar_turnos(){
    document.getElementById('selec_ano').style.display = 'none';
    document.getElementById('selec_mes').style.display = 'none';
    document.getElementById('selec_turno').style.display = 'inline';

    var select_op_turno = document.getElementById('selec_turno');
    select_op_turno.addEventListener('change',
    function(){
        var selec_opcion = this.options[select_op_turno.selectedIndex];
        console.log(selec_opcion.text);
        if(selec_opcion.text){
            
        }
    });
}