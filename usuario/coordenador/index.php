<?php
session_start();
include_once "../../class/DAO/documento.DAO.class.php";

$objDoc = new Documento_DAO();
$query = $objDoc->listarDocumentosProfessor($_SESSION['idUsuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../scss/login/estilo.css">
</head>
<body>
    <header class="flex-row-space">
    <img src="../../imagens/IFSUL.svg" width="350">
        <h2>Sistema para Gestão de Conselho</h2>
    </header>
    <main class="flex-row" id="conteudo" style="flex-direction: column; gap: 10px;">
    <h1 id="texto-lateral">Tabela dos conselhos</h1>
    <table id="tabela-p">
        <thead id="tabela-p-h">
            <tr>
                <th>Disciplina</th>
                <th>Turma</th>
                <th>Trimestre</th>
                <th>Prazo_A</th>
                <th>Prazo_P</th>
                <th>Visualizar</th>
            </tr>
        </thead>
        <tbody id="tabela-p-b">
            <?php
            foreach($query as $resposta){?>
            <tr>
               <td><?=$resposta['disciplina']?></td>
               <td><?=$resposta['turma']?></td>
               <td><?=$resposta['trimestre']?></td>
               <td><?=$resposta['prazo_A']?></td>
               <td><?=$resposta['prazo_P']?></td>
               <td><a href="../aluno/formulario.php?id=<?=$resposta['idDocumento']?>">Visualizar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div id="funcoesCoord">
        <a href="cadAluno.php">Cadastrar Aluno</a>
        <a href="cadProf.php">Cadastrar Professor</a>
        <a href="listarProf.php">Listar Professores</a>
    </div>
    </main>
    <footer class="flex-row-space">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>
</body>
</html>
