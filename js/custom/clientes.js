

$(document).ready(function(){
	//Carregamento Automatico do documento
	
	
	//Campos de pessoa física e pessoa jurídica
	$("#fisica").click(function() {
	    if ($("#fisica").is(':checked')) {
	      $(".pj").hide();
	      $("#lblnome").text("Nome");
	      $("#lbldocumento").text("CPF");
	      $("#txtdocumento").mask("999.999.999-99");
	    }
  	});
  	$("#juridica").click(function() {
	    if ($("#juridica").is(':checked')) {
	      $(".pj").show();
	      $("#lblnome").text("Razão Social");
	      $("#lbldocumento").text("CNPJ");
	      $("#txtdocumento").mask("99.999.999/9999-99");
	    }
  	});
	
	// Mascara para Celular (9 dígitos)
	$("#telefone").focusout(function(){
	        var phone, element;
	        element = $(this);
	        phone = element.val().replace(/\D/g, '');
	        if(phone.length > 10) {
	            element.unmask().mask("(99) 99999-999?9");
	        } else {
	            element.unmask().mask("(99) 9999-9999?9");
	        }
	}).trigger('focusout');
});