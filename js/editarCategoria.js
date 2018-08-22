$('#formulario').submit(function () {
    $.ajax({
        url: '../../control/categoriaControl.php',
        type: 'POST',
        datatype: 'json',
        data: {
            'descricao': $('input[name="descricao"]').val(),
            'id': $('input[name="id"]').val(),
            'metodo': 'atualizarCategoria'
        },
        success: function (data) {
            confirm("Realmente deseja fazer esta edição ?");
            alert('Editado com sucesso! ');

            if (!data.tipo !== 'erro') {
                window.location.href = "../espacos/espacoCategoria.php";
            }
        }
    });
});