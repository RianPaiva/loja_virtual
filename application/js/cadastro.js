$(document).ready(function () {




    $("#btn_login").on('click', function () {
        window.location.href = "../pages/login.php";
    });

    $("#btn_cadastrar").on('click', function (e) {
        e.preventDefault();


        genero = "";
        $('input:radio[name=gender]').each(function () {
            //Verifica qual está selecionado
            if ($(this).is(':checked')) {
                genero = ($(this).val());
            }
        });


        if ($("#firstname").val() === null || $("#firstname").val().length < 2) {
            alert("Preencha Corretamente o PRIMEIRO NOME!");
        } else {
            if ($("#lastname").val() === null || $("#lastname").val().length < 2) {
                alert("Preencha Corretamente o SOBRENOME!");
            } else {
                if ($("#email").val() === null || $("#email").val().length < 2) {
                    alert("Preencha Corretamente o EMAIL!");
                } else {
                    if ($("#number").val() === null || $("#number").val().length < 2) {
                        alert("Preencha Corretamente o TELEFONE!");
                    } else {
                        if ($("#password").val() === null || $("#password").val().length < 2) {
                            alert("Preencha Corretamente a SENHA!");

                        } else {



                            if ($("#password_conf").val() === null || $("#password_conf").val().length < 2) {
                                alert("Confirme Corretamente a SENHA!");
                            } else {

                                if (genero === null || genero === "") {
                                    alert("Preencha corretamente o GÊNERO")

                                } else {
                                    //CADASTRO
                                    $.ajax({
                                        method: "POST",
                                        url: "../php/cadastrar_cliente.php",
                                        dataType: "HTML",
                                        data: {
                                            metodo: "cad_cliente",
                                            primeiro_nome: $("#firstname").val(),
                                            sobrenome: $("#lastname").val(),
                                            email: $("#email").val(),
                                            celular: $("#number").val(),
                                            senha: $("#password").val(),
                                            conf_senha: $("#password_conf").val(),
                                            genero: genero
                                        }
                                    }).done(function (data) {
                                        if (data !== "Sucesso") {
                                            alert("Erro: " + data);
                                        } else {
                                            alert("Cadastro efetuado com sucesso!\nVocê receberá um EMAIL para ATIVAR sua CONTA.");
                                            window.location.href = "../pages/index.php";
                                        }
                                    });
                                }
                            }




                        }
                    }
                }
            }


        }

    });


});





