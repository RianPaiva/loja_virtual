function add_produto(id_prod, id_carrinho, tamanho, qtd_atual, id_cliente) {
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
        if (data !== "Sucesso") {
            alert("Erro: " + data);
        } else {
            window.location.reload();
        }
    });
}


function remove_produto(id_prod, id_carrinho, tamanho, qtd_atual, id_cliente) {
    $.ajax({
        method: "POST",
        url: "../php/carrinho.php",
        dataType: "HTML",
        data: {
            metodo: "remover_produto",
            id_prod: id_prod,
            tamanho: tamanho,
            id_carrinho: id_carrinho,
            qtd_atual: qtd_atual,
            id_cliente: id_cliente
        }
    }).done(function (data) {
        console.log(data);
        if (data !== "Sucesso") {
            alert("Erro: " + data);
        } else {
            window.location.reload();
        }
    });
}


function del_produto(id_prod, id_carrinho, tamanho, id_cliente) {
    $.ajax({
        method: "POST",
        url: "../php/carrinho.php",
        dataType: "HTML",
        data: {
            metodo: "deletar_produto",
            id_prod: id_prod,
            tamanho: tamanho,
            id_carrinho: id_carrinho,
            id_cliente: id_cliente
        }
    }).done(function (data) {
        console.log(data);
        if (data !== "Sucesso") {
            alert("Erro: " + data);
        } else {
            window.location.reload();
        }
    });
}

$("#btn_frete").on('click', function (e) {
    e.preventDefault();
    var qtd_itens = $("#qtd_itens").val();
    var cep = $("#cep").val();

    if (qtd_itens < 1) {
        alert("Adicione produtos para calcular o frete!");
    } else {
        if (cep.length < 9) {
            alert("Informe um CEP Válido");
        } else {
            $.ajax({
                method: "POST",
                url: "../php/calcular_frete.php",
                dataType: "HTML",
                data: {
                    metodo: "calcular_frete",
                    qtd_prod: qtd_itens,
                    cep: cep
                }
            }).done(function (data) {
                vetor = data.split("##");
                if (vetor[0] != "Sucesso") {
                    alert("Erro: " + data);
                } else {

                    $("#valor_frete").text(vetor[1]);

                }
            });
        }


    }


});

