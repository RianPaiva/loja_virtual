<?php
include("../../conexoes/conexao_bd.php");
$rotulo_relatorio = "Relatório Vendas";

//SELECT CAD_USUARIOS

// Valor total, nome cliente, endereco completo, 
$sql = "SELECT a.*, b.id_produto, b.valor_venda, b.qtd, b.tamanho, c.rua, c.bairro, c.cidade, c.estado, c.numero FROM tb_pedido AS a
INNER JOIN tb_item_pedido AS b ON a.id_pedido = b.id_pedido
INNER JOIN tb_endereco AS c ON a.id_endereco = c.id_endereco; ";

//Definir cabeçalhos das colunas
//DADOS BASE
$colunas = array(
    'ID_PRODUTO',
    'NOME',
    'QTD',
    'TOTAL',
    'ID_CLIENTE',
    'CLIENTE',
    'RUA',
    'BAIRRO',
    'CIDADE',
    'ESTADO',
    'N°'
);



// Executar a consulta SQL e obter os resultados
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {

    // Definir o nome do arquivo
    $arquivo = 'relatorio_vendas.xls';

    // Iniciar a saída do arquivo Excel
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=\"$arquivo\"");

    // Iniciar o conteúdo do arquivo Excel
    $conteudo = '<?xml version="1.0" encoding="UTF-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
    xmlns:html="http://www.w3.org/TR/REC-html40">
    <Styles>
        <Style ss:ID="celulaCentralizada">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
        </Style>
    </Styles>
    <Worksheet ss:Name="VENDAS">
        <Table>';

    //TITULO DA PLANILHA
    $conteudo .= '<Row>
            <Cell ss:StyleID="celulaCentralizada" ss:MergeAcross="' . (count($colunas) - 1) . '"><Data ss:Type="String">' . $rotulo_relatorio . '</Data></Cell>
        </Row>';

    $conteudo .= '<Row>';
    foreach ($colunas as $coluna) {
        $conteudo .= '<Cell><Data ss:Type="String">' . $coluna . '</Data></Cell>';
    }
    $conteudo .= '</Row>';

    //Preencher os dados dos colaboradores

    while ($tbl = $result->fetch_assoc()) {
        $conteudo .= '<Row>';


        $conteudo .= '<Cell><Data ss:Type="Number">' . $tbl['id_produto'] . '</Data></Cell>';

        $query_produto = "SELECT nome_produto FROM tb_produto WHERE id_produto = " . $tbl['id_produto'] . " LIMIT 1;";
        $result_produto = mysqli_query($conn, $query_produto);
        $tbl_produto = $result_produto->fetch_assoc();
        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl_produto['nome_produto'] . '</Data></Cell>';


        $conteudo .= '<Cell><Data ss:Type="Number">' . $tbl['qtd'] . '</Data></Cell>';

        $valor_total = $tbl['valor_venda'] * $tbl['qtd'];
        $conteudo .= '<Cell><Data ss:Type="Number">' . $valor_total . '</Data></Cell>';



        $conteudo .= '<Cell><Data ss:Type="Number">' . $tbl['id_cliente'] . '</Data></Cell>';

        $query_cliente = "SELECT nome, sobrenome FROM tb_cliente WHERE id_cliente = " . $tbl['id_cliente'] . " LIMIT 1;";
        $result_cliente = mysqli_query($conn, $query_cliente);
        $tbl_cliente = $result_cliente->fetch_assoc();
        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl_cliente['nome'] . ' ' . $tbl_cliente['sobrenome'] . '</Data></Cell>';

        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl['rua'] . '</Data></Cell>';

        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl['bairro'] . '</Data></Cell>';

        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl['cidade'] . '</Data></Cell>';

        $query_estado = "SELECT nome FROM tb_estado_br WHERE id_estado = " . $tbl['estado'] . " LIMIT 1;";
        $result_estado = mysqli_query($conn, $query_estado);
        $tbl_estado = $result_estado->fetch_assoc();
        $conteudo .= '<Cell><Data ss:Type="String">' . $tbl_estado['nome'] . '</Data></Cell>';

        $conteudo .= '<Cell><Data ss:Type="Number">' . $tbl['numero'] . '</Data></Cell>';
        $conteudo .= '</Row>';
    }


    // Finalizar o conteúdo do arquivo Excel
    $conteudo .= '</Table>
    </Worksheet>
</Workbook>';
}

echo $conteudo;
