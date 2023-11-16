<?php
include("../../conexoes/conexao_bd.php");
$rotulo_relatorio = "Relatório Usuários";	

//SELECT CAD_USUARIOS
$sql = "SELECT * FROM tb_usuario;";

//Definir cabeçalhos das colunas
            //DADOS BASE
            $colunas = array(
            'ID',
            'NOME',
            'SOBRENOME',
            'EMAIL',
            'STATUS',
            'NIVEL DE ACESSO'
           // 'CUSTO HORA',
           // 'DEPARTAMENTO',
            //'NIVEL HIERARQUICO',
            //'STATUS'
            );



// Executar a consulta SQL e obter os resultados
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {

// Definir o nome do arquivo
$arquivo = 'relatorio_usuarios.xls';

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
    <Worksheet ss:Name="USUARIOS">
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
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['id_usuario'].'</Data></Cell>'; 
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['nome'].'</Data></Cell>'; 
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['sobrenome'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['email'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['status'].'</Data></Cell>';
                $conteudo .= '<Cell><Data ss:Type="String">'.$tbl['nivel_acesso'].'</Data></Cell>'; 
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