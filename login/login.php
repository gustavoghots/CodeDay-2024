<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header class="flex-row-space">
        <img src="../imagens/IFSUL.png" width="300">
        <h2>Sistema para Gestão de Conselho</h2>
    </header>
    <main class="flex-row" id="conteudo">
        <h2 id="texto-lateral">Acesse o sistema de Conselho através do formulário ao lado</h2>
        <form id="form" action="login_ok.php" method="POST" class="flex-row">         
            <div class="div">
                <label>Matricula</label>
            </div>
            <input type="text"  name="matricula" class="inputs">
            <div>
                <label>Senha</label>
            </div>
            <input type="password" name="senha" class="inputs">
            <div>
                <button id="botao">Entrar</button>
            </div>
        </form>
    </main>
</body>
</html>
