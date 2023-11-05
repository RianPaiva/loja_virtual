$(document).ready(function () {

    $("#btn_cadastrar").on("click", function (e) {
        e.preventDefault();

        if ($("#nome_produto").val() === null || $("#nome_produto").val().length < 3) {
            alert("Preencha o NOME DO PRODUTO!");
        } else {
            if ($("#id_fornecedor").val() === null || $("#id_fornecedor").val().length < 2) {
                alert("Preencha o FORNECEDOR!");
            } else {
                if ($("#id_categoria").val() === null || $("#categoria").val() == "") {
                    alert("Preencha a CATEGORIA");
                } else {
                    if ($("#genero").val() === null ) {
                        alert("Preencha o GÊNERO");
                    } else {
                        if ($("#descricao").val() === null || $("#descricao").val().length < 2) {
                            alert("Preencha a DESCRIÇÃO");
                        } else {
                            var campo_img = document.getElementById("imagem");
                            if (campo_img.files.length < 1) {
                                alert("Escolha uma IMAGEM!");
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
                                    if (data !== 'True') {
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

    $("btn_pesquisar").on("click", function(e){
        e.preventDefault();
        $.ajax({

            method: "POST",
            url: "../php/pesquisar_produto.php",
            dataType: HTML,
            data:{
                metodo: "cad_produto",
                id_produto:$("#id_produto").val() ,
                nome_produto:$("#nome_produto").val(),               
                fornecedor: $("#fornecedor").val(),
                categoria: $("#categoria").val(),
                genero: $("#id_genero").val(),
                descricao: $("#descricao").val(),
                imagem: $("#imagem").val()

            }
        }).done(function(data){
            vetor = data.split("##");

            if(vetor[0] === 'Sucesso'){

                $("#btn_cadastrar").val("Alterar");
                $("#id_produto").val(vetor[1])
                $("#produto").val(vetor[2]);
                $("#id_fornecedor").val(vetor[3]);
                $("#fornecedor").val(vetor[4])
                $("#categoria").val(vetor[5]);
                $("#id_genero").val(vetor[6]);
                $("#imagem").val(vetor[7]);
                $("#descricao").val(vetor[8]);


            }else{
                alert('Erro');
            }
            
        })


    })

});


function limpar() {
    $("#id_produto").val('');
    $("#produto").val('');
    $("#id_fornecedor").val('');
    $("#nome_produto").val('');
    $("#descricao").val('');
    $("#fornecedor").val('');
    $("#categoria").val('');
    $("#id_genero").val('');
    $("#imagem").val('');

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
$('#pesquisa_razao').keyup(function(){
           
    $('#pesquisa_cnpj').val('');
   var query = $(this).val();
  
   

   var caractere = query.length;
 
   if(query !== '' && caractere > 1){
       $.ajax({
           url:'../php/autocomplete_fornecedor.php',
           method:"POST",
           data:{
               'query':query,
               'metodo': "cad_fornecedor"
           },
           success:function(data)
           {
            console.log(data);
             $('#listaRazao').fadeIn();
             $('#listaRazao').html(data);
            
           }
       });
   }else{
       
       $('#listaRazao').fadeOut();
   }
   
});

$('#listaRazao').on('click', 'li', function(){
 
     
     $('#pesquisa_razao').val($(this).text());
     $('#id_fornecedor').val($(this).val());
     $('#listaRazao').fadeOut();
     
});







