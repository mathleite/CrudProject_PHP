$('#formulario').submit(function () {
    $.ajax({
        url: '/control/produtoControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'nomeProduto': $('input[name="nomeProduto"]').val(),
            'categoria': $('select[name="categoria"]').val(),
            'fornecedor': $('select[name="fornecedor"]').val(),
            'diaLancamento': $('input[name="diaLancamento"]').val(),
            'precoVenda': $('input[name="precoVenda"]').val(),
            'precoUnitario': $('input[name="precoUnitario"]').val(),
            'metodo': 'cadastrar'
        }, success: function (data) {
            var dados = JSON.parse(data);

            if (dados.tipo == 'error') {
                alert("ERROR: cadastro sem dados");
            } else {
                alert("Cadastro realizado com sucesso !");
                window.location.href = "../listagem/listagem.php";
            }
        }
    });
});