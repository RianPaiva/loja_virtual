function add_produto(id_prod, id_carrinho, tamanho, qtd_atual, id_cliente){
    $.ajax({
        method: "POST",
        url: "../php/carrinho.php",
        dataType: "HTML",
        data: {
            metodo: "incluir_produto",
            id_prod: id_prod,
            tamanho: tamanho,
            id_carrinho: id_carrinho,
            qtd_atual: qtd_atual,
            id_cliente: id_cliente
        }
    }).done(function (data) {
        console.log(data);
        if (data !== "True") {
            alert("Erro: " + data);
        } else {
            alert("Alteração realizada com sucesso!");    
        }
    });
}


function remove_produto(id_prod){
    alert("Remove: " + id_prod);
    window.location.reload()
}


function del_produto(id_prod){
    alert("Apaga: " + id_prod);
}


