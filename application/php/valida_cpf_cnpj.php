<?php
function validarCpfCnpj($cpfCnpj) {
    $cpfCnpj = preg_replace('/[^0-9]/', '', $cpfCnpj);

    // Verifica se é CPF (11 dígitos)
    if (strlen($cpfCnpj) == 11) {
        if (preg_match('/(\d)\1{10}/', $cpfCnpj)) {
            return false; // CPF inválido
        }

        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpfCnpj[$i] * (10 - $i);
        }

        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;

        if ($digito1 != $cpfCnpj[9]) {
            return false; // CPF inválido
        }

        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpfCnpj[$i] * (11 - $i);
        }

        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;

        return ($digito2 == $cpfCnpj[10]) ? $cpfCnpj : false;
    }

    // Verifica se é CNPJ (14 dígitos)
    elseif (strlen($cpfCnpj) == 14) {
        $soma = 0;
        $multiplicador = 5;

        for ($i = 0; $i < 12; $i++) {
            $soma += $cpfCnpj[$i] * $multiplicador;
            $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
        }

        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;

        if ($digito1 != $cpfCnpj[12]) {
            return false; // CNPJ inválido
        }

        $soma = 0;
        $multiplicador = 6;

        for ($i = 0; $i < 13; $i++) {
            $soma += $cpfCnpj[$i] * $multiplicador;
            $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
        }

        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;

        return ($digito2 == $cpfCnpj[13]) ? $cpfCnpj : false;
    }

    return false; // Tamanho inválido para CPF ou CNPJ
}


?>