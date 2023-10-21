$(document).ready(function () {
    //CADASTRO FORNECEDORES
    $("#btn_cadastrar").on('click', function (e) {
        e.preventDefault();

        // CONFERE CAMPOS PREENCHIDOS
        if ($("#razao_social").val() === null || $("#razao_social").val().length < 2) {
            alert("Preencha a RAZÃO SOCIAL");
        } else {
            if ($("#cnpj").val() === null || $("#cnpj").val().length < 2) {
                alert("Preencha o CNPJ");
            } else {
                if ($("#email").val() === null || $("#email").val().length < 2) {
                    alert("Preencha o EMAIL");
                } else {
                    if ($("#telefone").val() === null || $("#telefone").val().length < 2) {
                        alert("Preencha o TELEFONE");
                    } else {
                        if ($("#pais").val() === null || $("#pais").val().length < 2) {
                            alert("Preencha o PAÍS");
                        } else {
                            if ($("#estado").val() === null || $("#estado").val().length < 2) {
                                alert("Preencha o ESTADO");
                            } else {
                                if ($("#cidade").val() === 2 || $("#cidade").val().length < 2) {
                                    alert("Preencha a CIDADE");
                                } else {
                                    if ($("#logradouro").val() === null || $("#logradouro").val().length < 2) {
                                        alert("Preencha o LOGRADOURO");
                                    } else {
                                        if ($("#complemento").val() === null || $("#complemento").val().length < 2) {
                                            alert("Preencha o COMPLEMENTO");
                                        }
                                        else {
                                            // VALIDAÇÃO COM AJAX
                                            $.ajax({
                                                method: "POST",
                                                url: "../php/cadastrar_fornecedor.php",
                                                dataType: "HTML",
                                                data: {
                                                    metodo: "cad_fornecedor",
                                                    razao_social: $("#razao_social").val(),
                                                    cnpj: $("#cnpj").val(),
                                                    email: $("#email").val(),
                                                    telefone: $("#telefone").val(),
                                                    pais: $("#pais").val(),
                                                    estado: $("#estado").val(),
                                                    cidade: $("#cidade").val(),
                                                    logradouro: $("#logradouro").val(),
                                                    complemento: $("#complemento").val(),
                                                    numero: $("#numero").val()
                                                }
                                            }).done(function (data) {
                                                console.log(data);
                                                if (data !== "True") {
                                                    alert("Erro:" + data);
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


                }
            }

        }
    });

    //LIMPAR FORMULÁRIO
    $("#btn_limpar").on('click', function (e) {
        e.preventDefault();
        limpar();
    });

    //PESQUISAR FORNECEDOR
    $("#btn_pesquisar").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            metodo: "POST",
            url: "../php/pesquisar_fornecedor.php",
            dataType: "HTML" ,
            data: {
                metodo: "cad_fornecedor",
                razao_social: $("#pesquisa_razao").val(),
                cnpj: $("#pesquisa_cnpj").val()
            }
        }).done(function(data){
            //o que irá acontecer depois do processamento do backend vulgo php
        });

    });

});

function limpar() {
    $("#pesquisa_razao").val('');
    $("#pesquisa_cnpj").val('');
    $("#razao_social").val('');
    $("#cnpj").val('');
    $("#email").val('');
    $("#telefone").val('');
    $("#pais").val('');
    $("#estado").val('');
    $("#cidade").val('');
    $("#logradouro").val('');
    $("#complemento").val('');
    $("#numero").val('');
}