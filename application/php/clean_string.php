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