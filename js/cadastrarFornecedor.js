$('#formularioFornecedor').submit(function () {
    $.ajax({
        url: '/control/fornecedorControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'novoFornecedor': $('input[name="novoFornecedor"]').val(),
            'metodo': 'cadastrarFornecedor'
        },
        success: function (data) {
            data = JSON.parse(data);
            confirm("Realmente deseja fazer este cadastro?");
            alert(data.message);

            if (!data.tipo !== 'erro') {
                window.location.href = "../espacos/espacoFornecedor.php";
            }
        }
    });
});