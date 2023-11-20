//AUTOCOMPLETE PESQ_PROD_EST
$('#pesq_prod_est').keyup(function () {

    var query = $(this).val();



    var caractere = query.length;

    if (query !== '' && caractere > 1) {
        $.ajax({
            url: '../php/autocomplete_prod_est.php',
            method: "POST",
            data: {
                'query': query,
                'metodo': "cad_prod_estoque"
            },
            success: function (data) {
                console.log(data);
                $('#lista_prod_est').fadeIn();
                $('#lista_prod_est').html(data);

            }
        });
    } else {
        $('#lista_prod_est').fadeOut();
    }

});

$('#lista_prod_est').on('click', 'li', function () {


    $('#pesq_prod_est').val($(this).text());
    $('#id_prod_estq').val($(this).val());
    $('#pesq_cod_produto').val($(this).val());
    $('#lista_prod_est').fadeOut();

});



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
                'metodo': "prod_estoque"
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




//CADASTRAR


//BUSCAR
$("#btn_pesquisar").on("click", function (e) {
   if($('#pesq_prod_est').val() == "" && $('#pesq_cod_produto').val() == ''){
        alert("Escolha um dos itens do estoque para prosseguir!");
   }else{
    $.ajax({
        method: "POST",
        url: "../php/pesquisa_prod_estq.php",
        dataType: "HTML",
        data: {
            metodo: "cad_prod_estq",
            nome_prod: $('#pesq_prod_est').val(),
            id_prod: $('#pesq_cod_produto').val()           
        }
    }).done(function (data) {
        console.log(data);
        var vetor = data.split("##");
        if (vetor[0] !== "Sucesso") {
            alert("Erro: " + data);
        } else {
            
        }
    });
   }
});

//BTN_LIMPAR
$("#btn_limpar").on("click", function (e) {
    e.preventDefault();
    limpar();
});

//LIMPAR

function limpar(){
    $('#pesq_prod_est').val('');
    $('#pesq_cod_produto').val('');
    $("#produto").val('');
    $("#id_produto").val('');
    $("#preco").val('');
    $("#dt_adicao").val('');
    $("#disponivel").val('');
    $("#tamanhos_quantidades").val('');
    $("#btn_cadastrar").val("Cadastrar");
}

