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
    <main class="flex-row-space" id="conteudo">
        <div id="div-left">
            <h1 id="texto-lateral-titulo-alt">Seja Bem Vindo</h1>
            <h2 id="texto-lateral-alt">Acesse o sistema de Conselho através do formulário ao lado</h2>
        </div>
        <div id="div-right">
        <form id="form" action="login_ok.php" method="POST" class="flex-row">         
            <div class="div-label">
                <label class="label">Matricula</label>
            </div>
            <input type="text"  name="matricula" class="inputs">
            <div  class="div-label">
                <label  class="label">Senha</label>
            </div>
            <input type="password" name="senha" class="inputs">
            <?php
                if(isset($_GET['error'])){
                    echo"<p style='color:white; background-color: red; padding: 5px;'>Erro no Login</p>";
                }
            ?>
            <div>
                <button id="botao">Entrar</button>
            </div>
            
        </form>
        </div>
    </main>
        <footer class="flex-row-space">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>
</body>
</html>
