function excluir(id) {
    if (confirm("Deseja realmente fazer esta exclusão ?")) {
        $.ajax({
            url: '../../control/produtoControl.php',
            type: 'POST',
            data: {
                'id': id,
                'metodo': 'excluir'
            },
            success: function (data) {
                if (data.tipo == 'error') {
                    alert("ERROR: Sem dados");
                } else {
                    alert('Produto excluido com sucesso !');
                    window.location.reload();
                }
            }
        });
    } else {
        alert("Exclusão cancelada ! :(");
        window.location.href = "../listagem/listagem.php";
    }
}