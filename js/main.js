$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url:'php/buscar.php',
		type:'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#datos").html(respuesta);
	})
}

$(document).ready(function(){
	$('#buscar').click(function(){
		var valor = $('#inbusqueda').val();
		if (valor != "") {
			buscar_datos(valor);
		} else{
			buscar_datos();
		}
	})
	
})