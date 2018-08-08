function excluir(id) {
    $.ajax({
        url: '/control/produtoControl.php',
        type: 'POST',
        data: {
            'id': id,
            'metodo': 'excluir'
        },
        success: function (data) {
            confirm('Realmente deseja fazer essa exclusão? ');
            alert('Produto excluido com sucesso !');
            window.location.reload();
        }
    });
}