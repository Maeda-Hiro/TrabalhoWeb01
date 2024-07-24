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
		console.log("Está chegando até aqui")
		window.open('./Cadastro.html', '_self');
		// $("#Titulo").hide();
	})

	$("#cadUsuForm_btProx").on('click', function () {
		$('#Cadastros a[href="#cadPag"]').tab('show')
	})
	$("#cadUsuForm_btVoltar").on('click', function () {
		$('#Cadastros a[href="#cadUsu"]').tab('show')
	})
	$("#cadUsuForm_btProx").on('click', function () {
		// $('#Cadastros a[href="#cadPag"]').tab('show')
	})
}

// .LinksNaoPossuiCadastro{
//     display: flex;
//     justify-content: space-between;
// }
