function excluir(id) {
    $.ajax({
        url: '/control/categoriaControl.php',
        type: 'POST',
        data: {
            'id': id,
            'metodo': 'excluir'
        },
        success: function (data) {
            confirm('Realmente deseja fazer essa exclusão ?');
            alert('Categoria excluida com sucesso!!');
            window.location.reload();
        }
    });
}