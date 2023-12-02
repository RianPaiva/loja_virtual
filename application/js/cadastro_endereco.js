$(document).ready(function () {

    $("#btn_cadastrar").on("click", function (e) {
        e.preventDefault();

        if ($("#btn_cadastrar").val() == "Cadastrar") {
            if ($("#rua").val() === null || $("#rua").val().length < 2) {
                alert("Preencha a RUA");
            } else {
                if ($("#bairro").val() === null || $("#bairro").val().length < 2) {
                    alert("Preencha o BAIRRO");
                } else {
                    if ($("#cidade").val() === null || $("#cidade").val().length < 2) {
                        alert("Preencha a CIDADE");
                    } else {
                        if ($("#estado").val() === null){
                            alert("Preencha o ESTADO");
                        } else {
                            if ($("#numero").val() === null || $("#numero").val().length < 2) {
                                alert("Preencha o NÚMERO")
                            } else {
{

                                    $.ajax({

                                        method: "POST",
                                        url: "../php/cadastrar_endereco.php",
                                        DataType: "HTML",
                                        data: {
                                            metodo: "cad_endereco",
                                            id_cliente: 1,
                                            rua: $("#rua").val(),
                                            bairro: $("#bairro").val(),
                                            cidade: $("#cidade").val(),
                                            numero: $("#numero").val(),
                                            complemento: $("#complemento").val(),
                                            estado: $("#estado").val()
                                        }

                                    }).done(function (data) {
                                        console.log(data);
                                        if (data !== "True") {
                                            alert("Erro: " + data);
                                        }else{
                                            alert("Novo endereço cadastrado com sucesso!");
                                            limpar();
                                        }
                                    })
                                };
                            }
                        }
                    }
                }
            }
        }
    })
})


function limpar() {
    $("#btn_cadastrar").val("Cadastrar");
    $("#rua").val('');
    $("#bairro").val('');
    $("#cidade").val('');
    $("#numero").val('');
    $("#complemento").val('');
    $("#estado").val('');
}