$(function () {
	$("#tabela input").keyup(function () {

		var index = $(this).parent().index();
		var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
		var valor = $(this).val().toUpperCase();
		/* Pega o conte[udo referenciado pelo ID tabela passado pelos input e pegado na ordem adicionada*/
		$("#tabela tbody tr").show();
		$(nth).each(function () {
			if ($(this).text().toUpperCase().indexOf(valor) < 0) {
				$(this).parent().hide();
			}
		});
	});
	/* Passa a marcação para a tabela */
	$("#tabela input").blur(function () {
		$(this).val("");
	});
});