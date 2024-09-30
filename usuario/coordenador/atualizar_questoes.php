<?php
session_start();
include_once '../../class/DAO/documento.DAO.class.php';

$objDocumentoDAO = new Documento_DAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDocumento = $_POST['idDocumento'];
    $respostas = $_POST['texto'];

    foreach ($respostas as $questao => $texto) {
        $objDocumentoDAO->atualizarQuestao($questao, $texto);
    }

    header("Location: editar_questao.php?id=$idDocumento&success=1");
    exit();
}
?>
