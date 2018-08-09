$('#formulario').submit(function () {
    $.ajax({
        url: '/control/fornecedorControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'nome': $('input[name="nome"]').val(),
            'id': $('input[name="id"]').val(),
            'metodo': 'updateFornecedor'
        },
        success: function (data) {
            confirm("Realmente deseja fazer esta edição ?");
            alert('Editado com sucesso! ');

            if (!data.tipo !== 'erro') {
                window.location.href = "../espacos/espacoFornecedor.php";
            }
        }
    });
});