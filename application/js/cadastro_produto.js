$(document).ready(function () {

    $("#btn_cadastrar").on("click", function (e) {
        e.preventDefault();

        if ($("#nome_produto").val() === null || $("#nome_produto").val().length < 3) {
            alert("Preencha o NOME DO PRODUTO");
        } else {
            if ($("#descricao").val() === null || $("#descricao").val().length < 2) {
                alert("Preencha a DESCRIÇÃO");
            } else {
                if ($("#id_fornecedor").val() === null || $("#id_fornecedor").val() == "") {
                    alert("Preencha o FORNECEDOR");
                } else {
                    if ($("#categoria").val() === null || $("#categoria").val().length < 2) {
                        alert("Preencha a CATEGORIA");
                    } else {
                        if ($("#genero").val() === null) {
                            alert("Preencha o GÊNERO");
                        } else {
                            var campo_img = document.getElementById("imagem");
                            if (campo_img.files.length < 1) {
                                alert("Escolha uma IMAGEM");
                            } else {


                                var formData = new FormData();
                                formData.append("nome_produto", $("#nome_produto").val()); 
                                formData.append("descricao", $("#descricao").val()); 
                                formData.append("id_fornecedor", $("#id_fornecedor").val());
                                formData.append("categoria", $("#categoria").val());  
                                formData.append("id_genero", $("#id_genero").val()); 
                                formData.append("imagem", $("#imagem")[0].files[0]); 

                                $.ajax({
                                    method: "POST",
                                    url: "../php/cadastrar_produto.php",
                                    dataType: "HTML",
                                    data: formData,
                                    contentType: false, 
                                    processData: false, 
                                }).done(function (data) {
                                    console.log(data);
                                    if (data !== "True") {
                                        alert("Erro: " + data);
                                    } else {
                                        alert("Cadastro realizado com sucesso!");
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

});


function limpar() {
    $("#id_fornecedor").val('');
    $("#nome_produto").val('');
    $("#descricao").val('');
    $("#fornecedor").val('');
    $("#categoria").val('');
    $("#genero").val('');
    $("#imagem").val('');

}

//AUTOCOMPLETE FORNECEDOR
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
                $('#listaRazao').fadeIn();
                $('#listaRazao').html(data);

            }
        });
    } else {

        $('#listaRazao').fadeOut();
    }

});

$('#listaRazao').on('click', 'li', function () {


    $('#fornecedor').val($(this).text());
    $('#id_fornecedor').val($(this).val());
    $('#listaRazao').fadeOut();

});







