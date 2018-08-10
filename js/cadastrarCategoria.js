$('#formularioCategoria').submit(function () {
    if (confirm("Deseja realmente fazer este cadastro ?")) {
        $.ajax({
            url: '/control/categoriaControl.php',
            type: 'POST',
            datatype: 'json',
            data: {
                'novaCategoria': $('input[name="novaCategoria"]').val(),
                'metodo': 'cadastrarCategoria'
            },
            success: function (data) {
                var dados = JSON.parse(data);
                if (dados.tipo == 'erro') {
                    alert("ERRO: sem dados !");
                } else {
                    alert("Cadastro realizado com sucesso");
                    window.location.href = "../espacos/espacoCategoria.php";
                }
            }
        });
    } else {
        alert("Cadastro cancelado :(");
        window.location.href = "../espacos/espacoCategoria.php";
    }
});