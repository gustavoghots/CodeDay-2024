<?php
session_start();
include_once "../../class/DAO/documento.DAO.class.php";

$objDoc = new Documento_DAO();
$query = $objDoc->listarDocumentosProfessor($_SESSION['idUsuario']);
?>

<html>
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
        <h2>Cadastro de Usuario</h2>
    </header>
    <main class="flex-row-space" id="conteudo" style="flex-direction: column; gap: 10px; height: 800px">
    <h1 id="texto-lateral">Cadastro de alunos</h1>
    <form action="cad_aluno_ok.php" method="POST" class='form' style="height: 480px;">
        <label>Login</label>
        <input type='text' name='login' class="inputs"><br>
        <label>Nome</label>
        <input type="text" name="nome"  class="inputs"><br>
        <label>Turma</label>
        <input type="text" name="turma"  class="inputs"><br>
        <label>Matrícula</label>
<input type="text" name="matricula" class="inputs"><br>

        <label>Senha</label>
        <input type="password" name="senha" class="inputs "><br>
        <button type="submit" id='botao'>Cadastrar Aluno</button>
        </form>
    </body>
    <?php
    if(isset($_GET['error'])) 
        echo "não foi possível cadastrar";
        if(isset($_GET['senha_curta']))
        echo 'senha muito curta';
    ?>
    </main>
    <footer class="flex-row-space">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>
</body>
</html>
