<?php
include("../../conexoes/conexao_bd.php");
$rotulo_relatorio = "Relatório Produtos";	

//SELECT CAD_USUARIOS
$sql = "SELECT * FROM tb_produto;";

//Definir cabeçalhos das colunas
            //DADOS BASE
            $colunas = array(
            'ID',
            'NOME',
            'FORNECEDOR',
            'CATEGORIA',
            'GENERO',
            'DESCRICAO'
           // 'CUSTO HORA',
           // 'DEPARTAMENTO',
            //'NIVEL HIERARQUICO',
            //'STATUS'
            );



// Executar a consulta SQL e obter os resultados
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {

// Definir o nome do arquivo
$arquivo = 'relatorio_produtos.xls';

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
    <Worksheet ss:Name="PRODUTOS">
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
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['nome_produto'].'</Data></Cell>'; 
                
                
                $query_estado = "SELECT razao_social FROM tb_fornecedor WHERE id_fornecedor = ".$tbl['id_fornecedor']."";
                $result_fornecedor = mysqli_query($conn,$query_estado);
                if($result_fornecedor->num_rows > 0){
                    $tbl_fornecedor = $result_fornecedor->fetch_assoc();
                    $fornecedor = $tbl_fornecedor['razao_social'];
                }else{
                    $fornecedor = "";
                }
                $conteudo .= '<Cell><Data ss:Type="String">'.$fornecedor.'</Data></Cell>';

                $query_categoria = "SELECT categoria FROM tb_categoria WHERE id_categoria = ".$tbl['id_categoria']."";
                $result_categoria = mysqli_query($conn,$query_categoria);
                if($result_categoria->num_rows > 0){
                    $tbl_categoria = $result_categoria->fetch_assoc();
                    $categoria = $tbl_categoria['categoria'];
                }else{
                    $categoria = "";
                
                }
                $conteudo .= '<Cell><Data ss:Type="String">'.$categoria.'</Data></Cell>';

                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['genero'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['descricao'].'</Data></Cell>'; 
                $conteudo .= '</Row>';
            }


        // Finalizar o conteúdo do arquivo Excel
            $conteudo .= '</Table>
    </Worksheet>
</Workbook>';
    
}else{
    $conteudo = "Nenhum registro encontrado";
}

echo $conteudo;


?>