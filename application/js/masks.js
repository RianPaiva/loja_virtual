//PHONE MASK
const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
}

//UPPERCASE
function handleInput(e) {
    var ss = e.target.selectionStart;
    var se = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase();
    e.target.selectionStart = ss;
    e.target.selectionEnd = se;
}

//LOWERCASE
function lowerInput(e) {
    e.target.value = e.target.value.toLowerCase();
}



//CPF CNPJ

function mascara_cpf_cnpj(e) {




    cpf = e.target.value;

    //Remove tudo o que não é dígito

    cpf = cpf.replace(/\D/g, "");

    if ((cpf.length) > 11) {
        //console.log("cnpj");

        //Coloca ponto entre o segundo e o terceiro dígitos
        v = cpf.replace(/^(\d{2})(\d)/, "$1.$2");



        //Coloca ponto entre o quinto e o sexto dígitos

        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");



        //Coloca uma barra entre o oitavo e o nono dígitos

        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");



        //Coloca um hífen depois do bloco de quatro dígitos

        v = v.replace(/(\d{4})(\d)/, "$1-$2");

        //console.log(v);
        e.target.value = v;

    } else {
        //console.log("cpf");

        //Coloca um ponto entre o terceiro e o quarto dígitos

        v = cpf.replace(/(\d{3})(\d)/, "$1.$2");



        //Coloca um ponto entre o terceiro e o quarto dígitos

        //de novo (para o segundo bloco de números)

        v = v.replace(/(\d{3})(\d)/, "$1.$2");



        //Coloca um hífen entre o terceiro e o quarto dígitos

        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        //console.log(v);
        e.target.value = v;

    }





}


