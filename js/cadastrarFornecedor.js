$('#formularioFornecedor').submit(function () {
    if (confirm("Deseja realmente fazer este cadastro ?")) {
        $.ajax({
            url: '/control/fornecedorControl.php',
            type: 'POST',
            datatype: 'json',
            data: {
                'novoFornecedor': $('input[name="novoFornecedor"]').val(),
                'metodo': 'cadastrarFornecedor'
            },
            success: function (data) {
                var dados = JSON.parse(data);
                if (dados.tipo == 'error') {
                    alert("ERROR: Sem dados");
                } else {
                    alert("Cadastro realizado !");
                    window.location.href = "../espacos/espacoFornecedor.php";
                }
            }
        });
    } else {
        alert("Cadastro cancelado ! :(");
        window.location.href = "../espacos/espacoFornecedor.php";
    }
});