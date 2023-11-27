
function change_image(img) {
    var allImages = document.querySelectorAll('.line-check.radio');
    allImages.forEach(function (image) {
        image.classList.remove('thumbnail-active');
    });

    img.classList.add('thumbnail-active');

    var container = document.getElementById("main-image");
    container.src = img.src;
}


$(document).ready(function () {
    $("#btn_cadastro").on('click', function (e) {
        if ($('input[name="size"]:checked').val() == null) {
            alert("Escolha um TAMANHO para prosseguir!");
        } else {
            $.ajax({
                method: "POST",
                url: "../php/carrinho.php",
                dataType: "HTML",
                data: {
                    metodo: "incluir_carrinho",
                    id_prod: $("#id_prod").val(),
                    tamanho: $('input[name="size"]:checked').val(),
                    id_cliente: 1
                }
            }).done(function (data) {
                console.log(data);
                if (data !== "Sucesso") {
                    alert("Erro: " + data);
                } else {
                    alert("Produto dicionado ao carrinho!");
                }
            });

        }

    });


});




