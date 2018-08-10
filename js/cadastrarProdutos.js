$('#formulario').submit(function () {
    if (confirm("Realmente deseja fazer este cadastro?")) {
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
                if (!data.tipo !== 'erro') {
                    alert("ERROR: cadastro sem dados");
                } else {
                    window.location.href = "../listagem/listagem.php";
                }
            }
        });
    } else {

        alert('Não cadastrado!');
        window.location.href = "../listagem/listagem.php";
    }
});