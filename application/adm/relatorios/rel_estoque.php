<?php
include("../../conexoes/conexao_bd.php");
$rotulo_relatorio = "Relatório Estoque";	

//SELECT CAD_USUARIOS
$sql = "SELECT * FROM tb_item_estoque;";

//Definir cabeçalhos das colunas
            //DADOS BASE
            $colunas = array(
            'ID',
            'PRODUTO',
            'PRECO',
            'DATA',
            'QUANTIA'
           // 'CUSTO HORA',
           // 'DEPARTAMENTO',
            //'NIVEL HIERARQUICO',
            //'STATUS'
            );



// Executar a consulta SQL e obter os resultados
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {

// Definir o nome do arquivo
$arquivo = 'relatorio_estoque.xls';

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
    <Worksheet ss:Name="ESTOQUE">
        <Table>';
        
        //TITULO DA PLANILHA
        $conteudo .= '<Row>
            <Cell ss:StyleID="celulaCentralizada" ss:MergeAcross="'.(count($colunas) - 1).'"><Data ss:Type="String">'.$rotulo_relatorio.'</Data></Cell>
        </Row>';
        
         $conteudo .= '<Row>';
        foreach ($colunas as $coluna) {
            $conteudo .= '<Cell><Data ss:Type="String">'.$coluna.'</Data></Cell>';
        }
        $conteudo .= '</Row>';
        
        //Preencher os dados dos colaboradores
          
            while ($tbl = $result->fetch_assoc()) {
                $conteudo .= '<Row>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['id_produto'].'</Data></Cell>';
                
                

                $query_produto = "SELECT nome_produto FROM tb_produto WHERE id_produto = ".$tbl['id_produto']."";
                $result_produto = mysqli_query($conn,$query_produto);
                if($result_produto->num_rows > 0){
                    $tbl_produto = $result_produto->fetch_assoc();
                    $produto = $tbl_produto['nome_produto'];
                }else{
                    $produto = "";
                }
                $conteudo .= '<Cell><Data ss:Type="String">'.$produto.'</Data></Cell>';

                
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['valor_compra'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['dt_hr_entrada'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['qtd_disponivel'].'</Data></Cell>'; 
                $conteudo .= '</Row>';
            }


        // Finalizar o conteúdo do arquivo Excel
            $conteudo .= '</Table>
    </Worksheet>
</Workbook>';
    
}

echo $conteudo;


?>