<?php
include("../../conexoes/conexao_bd.php");
$rotulo_relatorio = "Relatório Fornecedores";	

//SELECT CAD_USUARIOS
$sql = "SELECT * FROM tb_fornecedor;";

//Definir cabeçalhos das colunas
            //DADOS BASE
            $colunas = array(
            'ID',
            'RAZAO SOCIAL',
            'CNPJ',
            'EMAIL',
            'TELEFONE',
            'PAIS',
            'CIDADE',
            'LOGRADOURO',
            'ESTADO',
            'COMPLEMENTO',
            'NUMERO'
           // 'CUSTO HORA',
           // 'DEPARTAMENTO',
            //'NIVEL HIERARQUICO',
            //'STATUS'
            );



// Executar a consulta SQL e obter os resultados
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {

// Definir o nome do arquivo
$arquivo = 'relatorio_fornecedores.xls';

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
    <Worksheet ss:Name="FORNECEDORES">
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
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['id_fornecedor'].'</Data></Cell>'; 
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['razao_social'].'</Data></Cell>'; 
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['cnpj'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['email'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['telefone'].'</Data></Cell>';

                $query_pais = "SELECT nome_pt FROM tb_pais WHERE id_pais = ".$tbl['id_pais']." LIMIT 1;";
                $result_pais = mysqli_query($conn, $query_pais);
                if($result_pais->num_rows > 0){
                    $tbl_pais = $result_pais->fetch_assoc();
                    $pais = $tbl_pais['nome_pt'];
                }else{
                    $pais = "";
                }

                $conteudo .= '<Cell><Data ss:Type="String">'.$pais.'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['cidade'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['logradouro'].'</Data></Cell>';


                $query_estado = "SELECT nome FROM tb_estado_br WHERE id_estado = ".$tbl['id_estado']."";
                $result_estado = mysqli_query($conn,$query_estado);
                if($result_estado->num_rows > 0){
                    $tbl_estado = $result_estado->fetch_assoc();
                    $estado = $tbl_estado['nome'];
                }else{
                    $estado = "";
                }
                $conteudo .= '<Cell><Data ss:Type="String">'.$estado.'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['complemento'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['num_endereco'].'</Data></Cell>';
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