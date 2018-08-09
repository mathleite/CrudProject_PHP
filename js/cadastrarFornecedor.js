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
            confirm("Realmente deseja fazer este cadastro?");
            alert("Cadastro realizado !");

            if (!data.tipo !== 'erro') {
                window.location.href = "../espacos/espacoFornecedor.php";
            }
        }
    });
});