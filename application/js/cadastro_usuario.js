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




        } else {



        }


    });

    $("#btn_limpar").on("click", function (e) {
        e.preventDefault();
        limpar();
    });

});



function limpar() {
    $("#btn_cadastrar").val("Cadastrar");
    $("#nome").val('');
    $("#sobrenome").val('');
    $("#email").val('');
    $("#senha").val('');
    $("#status").val('');
    $("#acesso").val('');
}