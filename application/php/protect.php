<?php
$login_feito = "N";
$login_usuario = "N";

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["id_usuario"])){
    $login_usuario = "S";
} else if (isset($_SESSION['id_cliente'])) {
    $login_feito = "S";
}


// Lista de páginas que não exigem autenticação
$paginas_livres = [
    'index.php',
    'carrinho.php',
    'produto.php',
    'produtos.php',
    'login_adm.php' //fica na pasta /adm
];

// Obter o nome da página atual
$pagina_atual = basename($_SERVER['PHP_SELF']);

// Verificar se a página atual está na lista de páginas livres
if (!in_array($pagina_atual, $paginas_livres)) {
    // Verificar se as variáveis de sessão existem
    if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['id_cliente'])) {
        header("location: ../pages/sessao_expirada.php");
        exit();
    }

    // Proteger área administrativa
    $area_adm_paginas = [
        'index_adm.php'
        // adicione outras páginas da área administrativa aqui
    ];

    if (in_array($pagina_atual, $area_adm_paginas) && !isset($_SESSION['id_usuario'])) {
        header("location: ../pages/sessao_expirada.php");
        exit();
    }
}
?>
