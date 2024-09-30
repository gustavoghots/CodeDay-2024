<?php
session_start();
include_once '../../class/DAO/documento.DAO.class.php';
$objDocumentoDAO = new Documento_DAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura e atualização das questões
    $questaoId = $_POST['questaoId'];
    $texto = $_POST['texto'];

    $objDocumentoDAO->atualizarQuestao($questaoId, $texto); // Método que você precisa implementar

    header('Location: index.php?atualizado=true'); // Redireciona após a atualização
    exit;
}

$questao = $objDocumentoDAO->getQuestao($_GET['id']); // Método que você precisa implementar para pegar a questão
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Questão</title>
    <link rel="stylesheet" href="../../scss/formulario/estiloForm.css">
</head>
<body>
    <header>
        <h2>Editar Questão</h2>
    </header>
    <main>
        <form action="editar_questao.php" method="POST">
            <input type="hidden" name="questaoId" value="<?= $questao['idResposta'] ?>">
            <textarea name="texto" class="inputs" maxlength="255"><?= htmlspecialchars($questao['texto']) ?></textarea>
            <button type="submit">Salvar</button>
        </form>
    </main>
</body>
</html>
