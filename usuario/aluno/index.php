<?php
    include_once '../../class/DAO/documento.DAO.class.php';
    session_start();
    $objDocumentoDAO = new Documento_DAO();
    $idDocumento = $objDocumentoDAO->documentoValidoAluno($_SESSION['idUsuario']);
    if($idDocumento){
        header("Location: formulario.php?id=".$idDocumento['idDocumento']);
        exit();
    }
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
    <main class="flex-row" id="conteudo" style="flex-direction: column;">
        <h1 class="texto-atencao" style="color:white; background-color: red; border-radius: 5px; padding: 8px">Atenção</h1>
        <h2 class="texto-atencao">Não temos nenhum formulário cadastrado vinculado ao seu usuário dentro do prazo</h2>
        <h2 class="texto-atencao">Por favor retorne a tela de login.</h2>
        <button id="botao" style="padding: 5px; font-size: 16px;" onclick="window.location.href= '../login/login.php'">Retornar</button>
    </main>
        <footer class="flex-row-space">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>
</body>
</html>