$(document).ready(function () {
	ConfiguraTabs();
	Eventos();
});

function ConfiguraTabs() {
	$(".nav-tabs a").click(function () {
		$(this).tab('show');
	});
	$('.nav-tabs a').on('shown.bs.tab', function (event) {
		var x = $(event.target).text();
		var y = $(event.relatedTarget).text(); -
			$(".act span").text(x);
		$(".prev span").text(y);
	});
};

function Eventos() {
	$("#botaoDeCadastro").on('click', function () {
		window.open('./Cadastro.html', '_self');
	})
	$("#logUsuForm_btPnl").on('click', function () {
		window.open('./Painel.html', '_self');
	})


	$("#cadUsuForm_btProx").on('click', function () {
		let alerta = validaFormCadUsu();
		if (alerta != ""){
			alert(alerta);
		}else{
			$('#cadCadastros a[href="#cadPag"]').tab('show')
		}
	})
	$("#cadUsuForm_btVoltar").on('click', function () {
		$('#cadCadastros a[href="#cadUsu"]').tab('show')
	})
	$("#cadUsuForm_btSalvar").on('click', function () {
		let alerta = validaCadPag();
		if (alerta == ""){
			alert(alerta);
		}else{
			alert("Dados Cadastrados com sucesso.");
			window.open('./Painel.html', '_self');
		}
	})

	$("#altUsuForm_btProx").on('click', function () {
		let alerta = validaFormAltUsu();
		if (alerta != ""){
			alert(alerta);
		}else{
			$('#altCadastros a[href="#altPag"]').tab('show')
		}
	})
	$("#altUsuForm_btVoltar").on('click', function () {
		$('#altCadastros a[href="#altUsu"]').tab('show')
	})
	$("#altUsuForm_btSalvar").on('click', function () {
		let alerta = validaAltPag();
		if (alerta == ""){
			alert(alerta);
		}else{
			alert("Dados Salvos com sucesso.");
			window.open('./Painel.html', '_self');
		}
	})
}


function validaFormCadUsu(){
	if($("#cadUsuForm_Nome").val()  	== "" || $("#cadUsuForm_Nome").val() 	  == null){
		return "Campo Nome Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Rg").val()    	== "" || $("#cadUsuForm_Rg").val() 		  == null){
		return "Campo Rg Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Cpf").val()   	== "" || $("#cadUsuForm_Cpf").val() 	  == null){
		return "Campo Cpf Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Ender").val() 	== "" || $("#cadUsuForm_Ender").val() 	  == null){
		return "Campo Endereço Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Fone").val()  	== "" || $("#cadUsuForm_Fone").val() 	  == null){
		return "Campo Fone Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Email").val() 	== "" || $("#cadUsuForm_Email").val() 	  == null){
		return "Campo Email Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_Senha").val() 	== "" || $("#cadUsuForm_Senha").val() 	  == null){
		return "Campo Senha Deve Ser Preenhido.";
	}

    if($("#cadUsuForm_ConfSenha").val() == "" || $("#cadUsuForm_ConfSenha").val() == null){
		return "Campo Confirmação de Senha Deve Ser Preenhido.";
	}
}

function validaFormAltUsu(){
	if($("#altUsuForm_Nome").val()  	== "" || $("#altUsuForm_Nome").val() 	  == null){
		return "Campo Nome Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Rg").val()    	== "" || $("#altUsuForm_Rg").val() 		  == null){
		return "Campo Rg Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Cpf").val()   	== "" || $("#altUsuForm_Cpf").val() 	  == null){
		return "Campo Cpf Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Ender").val() 	== "" || $("#altUsuForm_Ender").val() 	  == null){
		return "Campo Endereço Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Fone").val()  	== "" || $("#altUsuForm_Fone").val() 	  == null){
		return "Campo Fone Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Email").val() 	== "" || $("#altUsuForm_Email").val() 	  == null){
		return "Campo Email Deve Ser Preenhido.";
	}

    if($("#altUsuForm_Senha").val() 	== "" || $("#altUsuForm_Senha").val() 	  == null){
		return "Campo Senha Deve Ser Preenhido.";
	}

    if($("#altUsuForm_ConfSenha").val() == "" || $("#altUsuForm_ConfSenha").val() == null){
		return "Campo Confirmação de Senha Deve Ser Preenhido.";
	}
}

function validaCadPag(){
	if($("#cadPagForm_NumCartao").val()  == "" || $("#cadPagForm_NumCartao").val()  == null){
		return "Campo Numero do Cartãos Deve ser Preechido.";
	}
	if($("#cadPagForm_NomeCartao").val() == "" || $("#cadPagForm_NomeCartao").val() == null){
		return "Campo Nome no Cartao Deve ser Preechido.";
	}
	if($("#cadPagForm_Ccv").val()        == "" || $("#cadPagForm_Ccv").val()        == null){
		return "Campo Ccv Deve ser Preechido.";
	}
	if($("#cadPagForm_val").val()        == "" || $("#cadPagForm_val").val()        == null){
		return "Campo validade Deve ser Preechido.";
	}
	if($("#cadPagForm_Pix").val()        == "" || $("#cadPagForm_Pix").val()        == null){
		return "Campo Pix Deve ser Preechido.";
	}
}

function validaAltPag(){
	if($("#altPagForm_NumCartao").val()  == "" || $("#altPagForm_NumCartao").val()  == null){
		return "Campo Numero do Cartãos Deve ser Preechido.";
	}
	if($("#altPagForm_NomeCartao").val() == "" || $("#altPagForm_NomeCartao").val() == null){
		return "Campo Nome no Cartao Deve ser Preechido.";
	}
	if($("#altPagForm_Ccv").val()        == "" || $("#altPagForm_Ccv").val()        == null){
		return "Campo Ccv Deve ser Preechido.";
	}
	if($("#altPagForm_val").val()        == "" || $("#altPagForm_val").val()        == null){
		return "Campo validade Deve ser Preechido.";
	}
	if($("#altPagForm_Pix").val()        == "" || $("#altPagForm_Pix").val()        == null){
		return "Campo Pix Deve ser Preechido.";
	}
}
