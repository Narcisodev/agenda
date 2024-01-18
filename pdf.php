<?php

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once './config/connection.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT id, name, phone, observations, date FROM contacts";

// Prepara a QUERY
$result_usuarios = $conn->prepare($query_usuarios);

// Executar a QUERY
$result_usuarios->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<title>PDF</title>";
$dados .= "<style>";
$dados .= "   table { width: 100%; border-collapse: collapse; margin-top: 20px; }";
$dados .= "   th, td { padding: 10px; text-align: left; }";
$dados .= "   th { background-color: #f2f2f2; }";
$dados .= "   td.vertical-line { border-right: 1px solid #000; }";
$dados .= "</style>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Lista de Clientes</h1>";

$dados .= "<table>";
$dados .= "<tr>";
$dados .= "<th>ID</th>";
$dados .= "<th>Nome do Cliente</th>";
$dados .= "<th>CNPJ</th>";
$dados .= "<th>Observações</th>";
$dados .= "<th>Data</th>";
$dados .= "</tr>";

// Ler os registros retornados do BD
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $dados .= "<tr>";
    $dados .= "<td class='vertical-line'>$id</td>";
    $dados .= "<td class='vertical-line'>$name</td>";
    $dados .= "<td class='vertical-line'>$phone</td>";
    $dados .= "<td class='vertical-line'>$observations</td>";
    $dados .= "<td class='vertical-line'>" . date('d-m-Y', strtotime($date)) . "</td>";
    $dados .= "</tr>";
    
    $dados .= "<tr><td colspan='5'><hr></td></tr>";
}

$dados .= "</table>";
$dados .= "</body>";
$dados .= "</html>";

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o método loadHtml e enviar o conteúdo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
