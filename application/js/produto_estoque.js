//AUTOCOMPLETE PESQ_PROD_EST
$('#pesq_prod_est').keyup(function () {

    var query = $(this).val();



    var caractere = query.length;

    if (query !== '' && caractere > 1) {
        $.ajax({
            url: '../php/autocomplete_prod_est.php',
            method: "POST",
            data: {
                'query': query,
                'metodo': "cad_prod_estoque"
            },
            success: function (data) {
                console.log(data);
                $('#lista_prod_est').fadeIn();
                $('#lista_prod_est').html(data);

            }
        });
    } else {
        $('#lista_prod_est').fadeOut();
    }

});

$('#lista_prod_est').on('click', 'li', function () {


    $('#pesq_prod_est').val($(this).text());
    $('#id_prod_estq').val($(this).val());
    $('#pesq_cod_produto').val($(this).val());
    $('#lista_prod_est').fadeOut();

});



//AUTOCOMPLETE PRODUTO
$('#produto').keyup(function () {

    var query = $(this).val();



    var caractere = query.length;

    if (query !== '' && caractere > 1) {
        $.ajax({
            url: '../php/autocomplete_produto.php',
            method: "POST",
            data: {
                'query': query,
                'metodo': "prod_estoque"
            },
            success: function (data) {
                console.log(data);
                $('#listaProduto').fadeIn();
                $('#listaProduto').html(data);

            }
        });
    } else {

        $('#listaProduto').fadeOut();
    }

});

$('#listaProduto').on('click', 'li', function () {


    $('#produto').val($(this).text());

    $('#id_produto').val($(this).val());
    $('#listaProduto').fadeOut();

});




//CADASTRAR
$("#btn_cadastrar").on("click", function (e) {
    if ($(this).val() == "Cadastrar") {
        if ($("#id_produto").val() == '') {
            alert("Preencha o campo PRODUTO para inserir no estoque!");
        } else {
            if ($("#preco").val() <= 3) {
                alert("Preencha com um PREÇO válido para inserir no estoque!");
            } else {
                if ($("#dt_adicao").val() < "2022-10-11") {
                    alert("Preencha com uma DATA válida para inserir no estoque!");
                } else {
                    if ($("#disponivel").val() == '') {
                        alert("Preencha o campo DISPONÍVEL para inserir no estoque!");
                    } else {

                        if (isJSON($("#tamanhos_quantidades").val()) == false) {
                            alert("Preencha TAMANHOS E QUANTIDADES em formato válido para inserir no estoque!");
                        } else {
                            // VALIDAÇÃO COM AJAX
                            $.ajax({
                                method: "POST",
                                url: "../php/cadastrar_prod_estoque.php",
                                dataType: "HTML",
                                data: {
                                    metodo: "cad_prod_estq",
                                    id: $("#id_produto").val(),
                                    preco: $("#preco").val(),
                                    dt_adicao: $("#dt_adicao").val(),
                                    disponivel: $("#disponivel").val(),
                                    tamanhos: $("#tamanhos_quantidades").val()
                                }
                            }).done(function (data) {
                                console.log(data);
                                if (data !== "Sucesso") {
                                    alert("Erro: " + data);
                                } else {
                                    alert("Cadastro realizado com sucesso!");
                                    limpar();
                                }
                            });
                        }
                    }

                }

            }

        }
    } else if ($(this).val() == "Alterar") {
        if ($("#id_produto").val() == '') {
            alert("Preencha o campo PRODUTO para inserir no estoque!");
        } else {
            if ($("#preco").val() <= 3) {
                alert("Preencha com um PREÇO válido para inserir no estoque!");
            } else {
                if ($("#dt_adicao").val() < "2022-10-11") {
                    alert("Preencha com uma DATA válida para inserir no estoque!");
                } else {
                    if ($("#disponivel").val() == '') {
                        alert("Preencha o campo DISPONÍVEL para inserir no estoque!");
                    } else {

                        if (isJSON($("#tamanhos_quantidades").val()) == false) {
                            alert("Preencha TAMANHOS E QUANTIDADES em formato válido para inserir no estoque!");
                        } else {


                            $.ajax({
                                method: "POST",
                                url: "../php/cadastrar_prod_estoque.php",
                                dataType: "HTML",
                                data: {
                                    metodo: "alt_prod_estq",
                                    id: $("#id_produto").val(),
                                    preco: $("#preco").val(),
                                    dt_adicao: $("#dt_adicao").val(),
                                    disponivel: $("#disponivel").val(),
                                    tamanhos: $("#tamanhos_quantidades").val()
                                }
                            }).done(function (data) {
                                console.log(data);
                                if (data !== "Sucesso") {
                                    alert("Erro: " + data);
                                } else {
                                    alert("Alteração realizada com sucesso!");
                                    limpar();
                                }
                            });

                        }

                    }

                }

            }
        }
    }
});


//BUSCAR
$("#btn_pesquisar").on("click", function (e) {
    if ($('#pesq_prod_est').val() == "" && $('#pesq_cod_produto').val() == '') {
        alert("Escolha um dos itens do estoque para prosseguir!");
    } else {
        $.ajax({
            method: "POST",
            url: "../php/pesquisa_prod_estq.php",
            dataType: "HTML",
            data: {
                metodo: "cad_prod_estq",
                nome_prod: $('#pesq_prod_est').val(),
                id_prod: $('#pesq_cod_produto').val()
            }
        }).done(function (data) {
            console.log(data);
            var vetor = data.split("##");
            if (vetor[0] !== "Sucesso") {
                alert("Erro: " + data);
            } else {
                $('#pesq_cod_produto').val(vetor[1]);
                $('#pesq_prod_est').val(vetor[2]);
                $("#produto").val(vetor[2]);
                $("#id_produto").val(vetor[1]);
                $("#preco").val(vetor[3]);
                $("#dt_adicao").val(vetor[4]);
                $("#disponivel").val(vetor[5]);
                $("#tamanhos_quantidades").val(vetor[6]);
                $("#btn_cadastrar").val("Alterar");
                $('#pesq_cod_produto').prop('disabled', true);
                $('#pesq_prod_est').prop('disabled', true);
            }
        });
    }
});

//BTN_LIMPAR
$("#btn_limpar").on("click", function (e) {
    e.preventDefault();
    limpar();
});

//LIMPAR

function limpar() {
    $('#pesq_prod_est').val('');
    $('#pesq_cod_produto').val('');
    $("#produto").val('');
    $("#id_produto").val('');
    $("#preco").val('');
    $("#dt_adicao").val('');
    $("#disponivel").val('');
    $("#tamanhos_quantidades").val('');
    $("#btn_cadastrar").val("Cadastrar");
    $('#pesq_cod_produto').prop('disabled', false);
    $('#pesq_prod_est').prop('disabled', false);
}


//isJSON
function isJSON(str) {
    try {
        JSON.parse(str);
        return true;
    } catch (e) {
        return false;
    }
}