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
        <img src="../../img/IFSUL.png" width="300">
        <h2>Sistema para Gestão de Conselho</h2>
    </header>
    <main class="flex-row" id="conteudo" style="flex-direction: column; gap: 10px;">
    <h1 id="texto-lateral">Tabela dos conselhos</h1>
    <table id="tabela-p">
        <thead id="tabela-p-h">
            <tr>
                <th>Turma</th>
                <th>Trimestre</th>
                <th>Status</th>
                <th>Visualizar</th>
            </tr>
        </thead>
        <tbody id="tabela-p-b">
            <tr>
                <td>INFO4</td>
                <td>3</td>
                <td>Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
            <tr>
                <td>SER3</td>
                <td>3</td>
                <td>Não Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
            <tr>
                <td>ELETRO3</td>
                <td>3</td>
                <td>Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
            <tr>
                <td>ELETRO3</td>
                <td>3</td>
                <td>Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
            <tr>
                <td>ELETRO3</td>
                <td>3</td>
                <td>Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
            <tr>
                <td>ELETRO3</td>
                <td>3</td>
                <td>Entregue</td>
                <td><a href="../aluno/formulario.php?idDocumento=X">Visualizar</a></td>
            </tr>
        </tbody>
    </table>
    </main>
    <footer class="flex-row-space">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>
</body>
</html>
