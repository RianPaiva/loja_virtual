$(document).ready(function () {

    $("#btn_cadastrar").on('click', function (e) {
        e.preventDefault();

        if ($("#btn_cadastrar").val() === "Cadastrar") {


            if ($("#email").val() === null || $("#email").val().length < 2) {
                alert("Preencha o EMAIL!")
            } else {

                if ($("#nome").val() === null || $("#nome").val().length < 2) {
                    alert("Preencha o NOME!")
                } else {


                    if ($("#sobrenome").val() === null || $("#sobrenome").val().length < 2) {
                        alert("Preencha o SOBRENOME!")

                    } else {



                        if ($("#status").val() === "") {
                            alert("Preencha o STATUS!")
                        } else {

                            if ($("#acesso").val() === "") {
                                alert("Preencha o NÍVEL DE ACESSO")
                            } else {
                                $.ajax({
                                    method: "POST",
                                    url: "../php/cadastrar_usuario.php",
                                    dataType: "HTML",
                                    data: {
                                        metodo: "cad_usuario",
                                        email: $("#email").val(),
                                        nome: $("#nome").val(),
                                        sobrenome: $("#sobrenome").val(),
                                        status: $("#status").val(),
                                        acesso: $("#acesso").val(),
                                    }
                                }).done(function (data) {

                                    console.log(data);

                                    if (data !== "True") {
                                        alert(data)
                                    } else {
                                        alert("Seu cadastro foi realizado com sucesso!")
                                        limpar()
                                    }
                                })

                            }


                        }




                    }

                }



            }




        } else if ($("#btn_cadastrar").val() === "Alterar") {


            if ($("#email").val() === null || $("#email").val().length < 2) {
                alert("Preencha o EMAIL!")
            } else {

                if ($("#nome").val() === null || $("#nome").val().length < 2) {
                    alert("Preencha o NOME!")
                } else {


                    if ($("#sobrenome").val() === null || $("#sobrenome").val().length < 2) {
                        alert("Preencha o SOBRENOME!")

                    } else {



                        if ($("#status").val() === "") {
                            alert("Preencha o STATUS!")
                        } else {

                            if ($("#acesso").val() === "") {
                                alert("Preencha o NÍVEL DE ACESSO")
                            } else {
                                $.ajax({
                                    method: "POST",
                                    url: "../php/cadastrar_usuario.php",
                                    dataType: "HTML",
                                    data: {
                                        metodo: "alt_usuario",
                                        id_usuario: $("#id_usuario").val(),
                                        email: $("#email").val(),
                                        nome: $("#nome").val(),
                                        sobrenome: $("#sobrenome").val(),
                                        status: $("#status").val(),
                                        acesso: $("#acesso").val()
                                    }
                                }).done(function (data) {

                                    console.log(data);

                                    if (data !== "True") {
                                        alert(data)
                                    } else {
                                        alert("Alteração foi realizado com sucesso!")
                                        limpar()
                                    }
                                })

                            }


                        }




                    }

                }



            }




        }


    });


    $("#btn_pesquisar").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "../php/pesquisa_usuario.php",
            dataType: "HTML",
            data: {
                metodo: "cad_usuario",
                id_usuario: $("#id_usuario").val(),
                nome: $("#pesquisa_nome").val(),
                email: $("#pesquisa_email").val()
            }
        }).done(function (data) {

            vetor = data.split("##");

            console.log(vetor);
            if (vetor[0] == "\r\nSucesso") {

                $("#btn_cadastrar").val("Alterar");
                // $("#id_usuario").val(vetor[1]);
                // $("#pesquisa_nome").val(vetor[2]);
                $("#pesquisa_email").val(vetor[1]);
                $("#email").val(vetor[1]);
                $("#nome").val(vetor[2]);
                $("#sobrenome").val(vetor[3]);
                $("#status").val(vetor[4]);
                $("#acesso").val(vetor[5]);
                $('#pesquisa_nome').prop('disabled', true);
                $('#pesquisa_email').prop('disabled', true);

            } else {
                alert("Erro");
            }

        });

    });

    $("#btn_limpar").on("click", function (e) {
        e.preventDefault();
        limpar();
    });

});



function limpar() {
    $("#btn_cadastrar").val("Cadastrar");
    $("#pesquisa_email").val('');
    $("#pesquisa_nome").val('');
    $("#nome").val('');
    $("#sobrenome").val('');
    $("#email").val('');
    $("#senha").val('');
    $("#status").val('');
    $("#acesso").val('');
    $('#pesquisa_nome').prop('disabled', false);
    $('#pesquisa_email').prop('disabled', false);
}