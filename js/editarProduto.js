$('#formularioEdicao').submit(function () {
    $.ajax({
        url: '/control/produtoControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'nome': $('input[name="nome"]').val(),
            'categoria': $('select[name="categoria"]').val(),
            'fornecedor': $('select[name="fornecedor"]').val(),
            'diaLancamento': $('input[name="diaLancamento"]').val(),
            'precoVenda': $('input[name="precoVenda"]').val(),
            'precoUnitario': $('input[name="precoUnitario"]').val(),
            'id': $('input[name="id"]').val(),
            'metodo': 'atualizar'
        },
        success: function (data) {
            console.log(data);
            confirm("Realmente deseja fazer esta edição ?");
            alert("Editado com sucesso !");

            if (!data.tipo !== 'erro') {
                window.location.href = "../listagem/listagem.php";
            }
        }
    });
});