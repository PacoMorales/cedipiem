/*function carga_dependencias(ESTRUCGOB){
	if(! ESTRUCGOB){
		$('#dep').html('<option value="">SELECCIONE LOCALIDAD</option>');
	}
	// AJAX
	$.get('/dependencias/'+ESTRUCGOB, function (data){ 
	var html_select = '<option value="">SELECCIONE DEPENDENCIA</option>';
	for (var i=0; i<data.length ;++i)
		html_select += '<option value="'+data[i].depen_id+'">'+data[i].depen_desc+'</option>';
		$('#dep').html(html_select);
	});
}*/
function carga_estructuras(sector_id){
	//alert(sector_id);
	if(! sector_id){
		//alert('Viene vacio');
		$('#estruc').html('<option value="">SELECCIONE ESTRUCTURA</option>');
	}
	// AJAX
	//alert('llega a AJAX');
	$.get('/sedesem/padrino/estructura/'+sector_id, function (data){ 
	var html_select = '<option value="">SELECCIONE ESTRUCTURA</option>';
	for (var i=0; i<data.length ;++i)
		html_select += '<option value="'+data[i].estrucgob_id+'">'+data[i].estrucgob_desc+'</option>';
		$('#estruc').html(html_select);
	});
}
$(document).ready(function(){
	/*$("#ESTRUCGOB").change(function(){
		carga_dependencias($("#ESTRUCGOB").val());
	});*/
	$("#select_dep").change(function(){
		carga_estructuras($("#select_dep").val());
	});
	/*$("#municipio2").change(function(){
		carga_secciones($("#municipio").val());
	});*/

	/*document.getElementById("habla-lengua-no").checked=true;
	$("#habla-lengua-si").change(function(){
		$("#habla-lengua").load("/js/apartado_a/Contenido/contenido-lengua.php");
	});	
	$("#habla-lengua-no").change(function(){
		$("#habla-lengua").html("");///abre
	});*/
});