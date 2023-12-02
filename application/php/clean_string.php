<?php
function RemoveSpecialChar($str)
{
    $res = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>','#','.'), '', $str);
    return $res;
}

function CleanCnpj($str)
{
    $res = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>', '-', '#','.','/'), '', $str);
    return $res;
}

function CleanString($str){
    $res = str_replace(array(
        '#',';' ), ' ', $str);
    return $res;
}

function cleanNumber($string) {
    // Remove todos os caracteres que não são números
    $string = preg_replace('/[^0-9]/', '', $string);
    
    return $string;
}