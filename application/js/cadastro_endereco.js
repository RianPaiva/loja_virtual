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
                        if ($("#estado").val() === null) {
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
                                        } else {
                                            updateList(1);
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
        } else if ($("#btn_cadastrar").val() == "Alterar") {
            if ($("#rua").val() === null || $("#rua").val().length < 2) {
                alert("Preencha a RUA");
            } else {
                if ($("#bairro").val() === null || $("#bairro").val().length < 2) {
                    alert("Preencha o BAIRRO");
                } else {
                    if ($("#cidade").val() === null || $("#cidade").val().length < 2) {
                        alert("Preencha a CIDADE");
                    } else {
                        if ($("#estado").val() === null) {
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
                                            metodo: "alterar_endereco",
                                            rua: $("#rua").val(),
                                            bairro: $("#bairro").val(),
                                            cidade: $("#cidade").val(),
                                            numero: $("#numero").val(),
                                            complemento: $("#complemento").val(),
                                            id_endereco: $("#id_end_edit").val(),
                                            estado: $("#estado").val()
                                        }

                                    }).done(function (data) {
                                        console.log(data);
                                        if (data !== "True") {
                                            alert("Erro: " + data);
                                        } else {
                                            alert("Endereço alterado com sucesso!");
                                            updateList(1);
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
});


function editarEndereco(id_endereco) {
    $.ajax({

        method: "POST",
        url: "../php/cadastrar_endereco.php",
        DataType: "HTML",
        data: {
            metodo: "buscar_endereco",
            id_endereco: id_endereco
        }
    }).done(function (data) {
        console.log(data);
        vetor = data.split("##");
        if (vetor[0] == "Sucesso") {
            $("#btn_cadastrar").val("Alterar");
            $("#multiCollapseExample1").collapse('show');
            $("#rua").val(vetor[1]);
            $("#bairro").val(vetor[2]);
            $("#cidade").val(vetor[3]);
            $("#estado").val(vetor[4]);
            $("#numero").val(vetor[5]);
            $("#complemento").val(vetor[6]);
            $("#id_end_edit").val(id_endereco);

        } else {
            alert(data);
        }

    });
}



function limpar() {
    $("#btn_cadastrar").val("Cadastrar");
    $("#rua").val('');
    $("#bairro").val('');
    $("#cidade").val('');
    $("#numero").val('');
    $("#complemento").val('');
    $("#estado").val('');
}


function updateList(id_cliente){
    $.ajax({
        method: "POST",
        url: "../php/lista_endereco.php",
        DataType: "HTML",
        data: {
            metodo: "buscar_enderecos",
            id_cliente: id_cliente
        }
    }).done(function (data) {
        $("#list_enderecos").empty();
        $("#list_enderecos").append(data);
    });
}