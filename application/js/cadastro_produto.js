$(document).ready(function () {

    $("#btn_cadastrar").on("click", function (e) {
        e.preventDefault();



        if ($("#btn_cadastrar").val() === "Cadastrar") {
            if ($("#nome_produto").val() === null || $("#nome_produto").val().length < 3) {
                alert("Preencha o NOME DO PRODUTO!");
            } else {
                if ($("#id_fornecedor").val() === null || $("#id_fornecedor").val().length < 2) {
                    alert("Preencha o FORNECEDOR!");
                } else {
                    if ($("#id_categoria").val() === null || $("#categoria").val() == "") {
                        alert("Preencha a CATEGORIA");
                    } else {
                        if ($("#genero").val() === null) {
                            alert("Preencha o GÊNERO");
                        } else {
                            if ($("#descricao").val() === null || $("#descricao").val().length < 2) {
                                alert("Preencha a DESCRIÇÃO");
                            } else {
                                var campo_img = document.getElementById("imagem");
                                var campo_img_2 = document.getElementById("imagem_2");
                                var campo_img_3 = document.getElementById("imagem_3");
                                if (campo_img.files.length < 1) {
                                    alert("Escolha uma IMAGEM!");
                                } else {

                                    if (campo_img_2.files.length < 1) {
                                        alert("Escolha uma SEGUNDA IMAGEM!");

                                    } else {

                                        if (campo_img_3.files.length < 1) {
                                            alert("Escolha a TERCEIRA IMAGEM!")


                                        }
                                    }


                                    var formData = new FormData();
                                    formData.append("metodo", 'cadastrar');
                                    formData.append("nome_produto", $("#nome_produto").val());
                                    formData.append("descricao", $("#descricao").val());
                                    formData.append("id_fornecedor", $("#id_fornecedor").val());
                                    formData.append("id_categoria", $("#categoria").val());
                                    formData.append("genero", $("#genero").val());
                                    formData.append("imagem", $("#imagem")[0].files[0]);
                                    formData.append("imagem_2", $("#imagem_2")[0].files[0]);
                                    formData.append("imagem_3", $("#imagem_3")[0].files[0]);

                                    $.ajax({
                                        method: "POST",
                                        url: "../php/cadastrar_produto.php",
                                        dataType: "HTML",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                    }).done(function (data) {
                                        console.log(data);
                                        if (data !== 'True') {
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

            }
        } else if ($("#btn_cadastrar").val() === "Alterar") {
            if ($("#nome_produto").val() === null || $("#nome_produto").val().length < 3) {
                alert("Preencha o NOME DO PRODUTO!");
            } else {
                if ($("#id_fornecedor").val() === null || $("#id_fornecedor").val().length < 2) {
                    alert("Preencha o FORNECEDOR!");
                } else {
                    if ($("#id_categoria").val() === null || $("#categoria").val() == "") {
                        alert("Preencha a CATEGORIA");
                    } else {
                        if ($("#genero").val() === null) {
                            alert("Preencha o GÊNERO");
                        } else {
                            if ($("#descricao").val() === null || $("#descricao").val().length < 2) {
                                alert("Preencha a DESCRIÇÃO");
                            } else {
                                var campo_img = document.getElementById("imagem");
                                if (campo_img.files.length < 1) {
                                    var altera_img = 0;
                                } else {
                                    var altera_img = 1;
                                }
                                var campo_img_2 = document.getElementById("imagem_2");
                                if (campo_img_2.files.length < 1) {
                                    var altera_img_2 = 0;

                                } else {
                                    var altera_img_2 = 1;
                                }
                                var campo_img_3 = document.getElementById("imagem_3");
                                if (campo_img_3.files.length < 1) {
                                    var altera_img_3 = 0;

                                } else {
                                    var altera_img_3 = 1;
                                }


                                var formData = new FormData();
                                formData.append("metodo", 'alterar');
                                formData.append("id_produto", $("#id_produto").val());
                                formData.append("nome_produto", $("#nome_produto").val());
                                formData.append("descricao", $("#descricao").val());
                                formData.append("id_fornecedor", $("#id_fornecedor").val());
                                formData.append("id_categoria", $("#categoria").val());
                                formData.append("genero", $("#genero").val());
                                if (altera_img === 1) {
                                    formData.append("imagem", $("#imagem")[0].files[0]);
                                    formData.append("fl_altera_img", '1');
                                } else {
                                    formData.append("fl_altera_img", '0');
                                }
                                if (altera_img_2 === 1) {
                                    formData.append("imagem_2", $("#imagem_2")[0].files[0]);
                                    formData.append("fl_altera_img_2", '1');
                                } else {
                                    formData.append("fl_altera_img_2", '0');
                                }
                                if (altera_img_3 === 1) {
                                    formData.append("imagem_3", $("#imagem_3")[0].files[0]);
                                    formData.append("fl_altera_img_3", '1');
                                } else {
                                    formData.append("fl_altera_img_3", '0');
                                }


                                $.ajax({
                                    method: "POST",
                                    url: "../php/cadastrar_produto.php",
                                    dataType: "HTML",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                }).done(function (data) {
                                    console.log(data);
                                    if (data !== 'True') {
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

    $("#btn_limpar").on("click", function (e) {
        e.preventDefault();
        limpar();
    });

    $("#btn_pesquisar").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "../php/pesquisar_produto.php",
            dataType: 'HTML',
            data: {
                metodo: "cad_produto",
                id_produto: $("#id_produto").val(),
                nome_produto: $("#produto").val()
            }
        }).done(function (data) {
            console.log(data);
            vetor = data.split("##");

            if (vetor[0] === 'Sucesso') {
                $("#btn_cadastrar").val("Alterar");
                $("#id_produto").val(vetor[1])
                $("#produto").val(vetor[2]);
                $("#nome_produto").val(vetor[2]);
                $("#fornecedor").val(vetor[3]);
                $("#id_fornecedor").val(vetor[4]);
                $("#categoria").val(vetor[5]);
                $("#genero").val(vetor[6]);
                $("#descricao").val(vetor[7]);
                $('#produto').prop('disabled', true);
                $("#img_prod").attr("src", vetor[8]);
                $("#img_prod_2").attr("src", vetor[9]);
                $("#img_prod_3").attr("src", vetor[10]);


            } else {
                alert('Erro');
            }

        })


    })

});


function limpar() {
    $("#btn_cadastrar").val("Cadastrar");
    $("#id_produto").val('');
    $("#produto").val('');
    $("#id_fornecedor").val('');
    $("#nome_produto").val('');
    $("#descricao").val('');
    $("#fornecedor").val('');
    $("#categoria").val('');
    $("#genero").val('');
    $("#imagem").val('');
    $("#img_prod").attr("src", '');
    $("#imagem_2").val('');
    $("#img_prod").attr("src", '');
    $("#imagem_3").val('');
    $("#img_prod_3").attr("src", '');
    $('#produto').prop('disabled', false);

}

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
                'metodo': "cad_produto"
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




// AUTOCOMPLETE FORNECEDOR
$('#fornecedor').keyup(function () {


    var query = $(this).val();



    var caractere = query.length;

    if (query !== '' && caractere > 1) {
        $.ajax({
            url: '../php/autocomplete_fornecedor.php',
            method: "POST",
            data: {
                'query': query,
                'metodo': "cad_produto"
            },
            success: function (data) {
                console.log(data);
                $('#listaFornecedor').fadeIn();
                $('#listaFornecedor').html(data);

            }
        });
    } else {

        $('#listaFornecedor').fadeOut();
    }

});

$('#listaFornecedor').on('click', 'li', function () {


    $('#fornecedor').val($(this).text());
    $('#id_fornecedor').val($(this).val());
    $('#listaFornecedor').fadeOut();

});







