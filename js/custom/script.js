$(function (){
	var base_url = 'http://localhost/evegestor/';
	$.ajax({
		url 	: base_url + 'cliente/deletar',
		data	: {},
		type	: 'post'
	}).done();
});