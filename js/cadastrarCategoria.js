$('#formularioCategoria').submit(function () {
    // var formulario = $('#formularioCategoria').serializeArray();
    // console.log(formulario.split('&'));
    $.ajax({
        url: '/control/categoriaControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'novaCategoria': $('input[name="novaCategoria"]').val(),
            'metodo': 'cadastrarCategoria'
        },
        success: function (data) {
            // console.log(data);
            // return false;
            var dados = JSON.parse(data);
            if (dados.tipo == 'erro') {
                alert("ERRO: sem dados !");
            } else {
                alert("Cadastro realizado com sucesso");
                window.location.href = "../espacos/espacoCategoria.php";
            }
        }
    });
});