function excluir(id) {
    $.ajax({
        url: '/control/fornecedorControl.php',
        type: 'POST',
        data: {
            'id': id,
            'metodo': 'excluir'
        },
        success: function (data) {
            confirm('Realmente deseja fazer essa exclusão ?');
            alert('Fornecedor excluido com sucesso!!');
            window.location.reload();
        }
    });
}