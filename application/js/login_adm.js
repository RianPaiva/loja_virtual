$(document).ready(function () {

    $("#btn_login").on('click', function (e) {


        e.preventDefault();


        if ($("#email").val() === null || $("#email").val().length < 2) {
            alert("Preencha o EMAIL!");

        } else {

            if ($("#password").val() === null || $("#password").val().length < 2) {
                alert("Preencha a SENHA!");
            } else {

                $.ajax({


                    method: "POST",
                    url: "../php/logar_adm.php",
                    datatype: "HTML",
                    data: {
                        metodo: "cad_adm",
                        email: $("#email"),
                        senha: $("#password"),

                    }

                }).done(function(data){

                    console.log(data);
                    if(data !== 'True'){
                        alert("Erro: " + data)
                    }else{
                        alert("ADM");
                    }
                })
            }

        }
    }

    )
})
