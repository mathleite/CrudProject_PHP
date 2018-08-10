function excluir(id) {
    if (confirm("Deseja realmente fazer esta exclusão ?")) {
        $.ajax({
            url: '/control/categoriaControl.php',
            type: 'POST',
            data: {
                'id': id,
                'metodo': 'excluir'
            },
            success: function (data) {
                if (data.tipo == 'error'){
                    alert("ERROR: dado sem ID");
                } else {
                    alert('Categoria excluida com sucesso!!');
                    window.location.reload();
                }
            }
        });
    } else {
        alert("Exclusão cancelada ! :(");
        window.location.reload();
    }
}