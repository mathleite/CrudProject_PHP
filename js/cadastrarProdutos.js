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
        },
        success: function (data) {
            confirm("Realmente deseja fazer este cadastro?");
            alert("Cadastro realizado ! ");

            if (!data.tipo !== 'erro') {
                window.location.href = "../listagem/listagem.php";
            }
        }
    });
});