function excluir(id) {
    if (confirm("Deseja realmente fazer esta exclusão ?")) {
        $.ajax({
            url: '/control/fornecedorControl.php',
            type: 'POST',
            data: {
                'id': id,
                'metodo': 'excluir'
            },
            success: function (data) {
                if (data.tipo == 'error') {
                    alert("ERROR: sem id");
                } else {
                    alert('Fornecedor excluido com sucesso!!');
                    window.location.reload();
                }
            }
        });
    } else {
        alert("Exclusão cancelada ! :(");
        window.location.reload();
    }
}