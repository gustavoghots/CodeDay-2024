<?php
session_start();
include_once '../../class/DAO/documento.DAO.class.php';

$objDocumentoDAO = new Documento_DAO();

// Supondo que você tenha o ID do documento
$idDocumento = $_GET['id'];
$questoes = $objDocumentoDAO->Dados($idDocumento);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Questões</title>
</head>
<body>
    <h1>Editar Questões</h1>
    <form action="atualizar_questoes.php" method="POST">
        <input type="hidden" name="idDocumento" value="<?= $idDocumento; ?>">
        <?php foreach ($questoes as $questao): ?>
            <div>
                <label>Questão <?= htmlspecialchars($questao['questao']); ?></label>
                <textarea name="texto[<?= $questao['questao']; ?>]"><?= htmlspecialchars($questao['texto']); ?></textarea>
            </div>
        <?php endforeach; ?>
        <button type="submit">Atualizar Questões</button>
    </form>
</body>
</html>
