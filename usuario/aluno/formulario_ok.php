<?php
session_start();
include_once "../../class/DAO/documento.DAO.class.php";
include_once "../../class/documento.class.php";

// Crie um objeto do tipo Documento
$objDocumento = new Documento();

// Receber os dados do formulário
$objDocumento->setId($_POST['idDocumento']);
$objDocumento->setRepresentantes($_POST['Representantes'] ?? '');
$objDocumento->setConselheiro($_POST['Conselheiros'] ?? '');

// Loop para coletar os valores e motivos das perguntas
$respostas = []; // Array para armazenar as respostas

for ($i = 1; $i <= 8; $i++) {
    $valorKey = "valor$i";
    $motivoKey = "motivo$i";

    // Verifica se os campos não estão vazios antes de adicionar ao array
    if (!empty($_POST[$valorKey]) || !empty($_POST[$motivoKey])) {
        $resposta = []; // Cria um novo array para a resposta atual

        if (!empty($_POST[$valorKey])) {
            $resposta['valor'] = $_POST[$valorKey]; // Adiciona o valor ao array
        }

        if (!empty($_POST[$motivoKey])) {
            $resposta['texto'] = $_POST[$motivoKey]; // Adiciona o motivo ao array
        }

        $resposta['questao'] = $i; // Adiciona a questão (índice) ao array

        $respostas[] = $resposta; // Adiciona a resposta ao array de respostas
    }
}

// Define o array de respostas no objeto Documento
$objDocumento->setRespostas($respostas);

// Adiciona os participantes
$objDocumento->setParticipantes($_POST['Participantes'] ?? '');

// Crie um objeto do DAO para atualização
$objDocumentoDAO = new Documento_DAO();
$objDocumentoDAO->AtualizarForm($objDocumento);

// Redirecionar ou retornar uma mensagem de sucesso
//header("Location: sucesso.php");
//exit();
