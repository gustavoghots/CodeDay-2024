<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estiloForm.css">
</head>
<body id="body-form">
    <header class="flex-row-space">
        <img src="../imagens/IFSUL.png" width="300">
        <h2>Sistema para Gestão de Conselho</h2>
    </header>
    <main class="flex-row" id="main-form">
        <form id="formulario" class="flex-row" action="formulario_ok.php" method="POST">
            <h5>Postura da turma no que se refere à pontualidade, assiduidade, interesse, participação e cumprimento dos prazos nas entregas de atividades.</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor1">
                    <input type="radio" value="2" name="valor1">
                    <input type="radio" value="3" name="valor1">
                    <input type="radio" value="4" name="valor1">
                    <input type="radio" value="5" name="valor1">
                </div>
                <div class="flex-row-space texts">
                    <p>Muito Ruim</p>
                    <p>Ruim</p>
                    <p>Normal</p>
                    <p>Bom</p>
                    <p>Muito Bom</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo1" class="inputs" maxlength="255"></textarea>
            <h5>Dificuldades da turma e possíveis causas.</h5>
            <textarea name="motivo2" class="inputs"  maxlength="255"></textarea>
            <h5>Com relação à metodologia, distribuição de conteúdos e avaliações, como consideram as disciplinas trabalhadas pelos docentes?</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor3">
                    <input type="radio" value="2" name="valor3">
                    <input type="radio" value="3" name="valor3">
                    <input type="radio" value="4" name="valor3">
                    <input type="radio" value="5" name="valor3">
                </div>
                <div class="flex-row-space texts">
                    <p>Muito Ruim</p>
                    <p>Ruim</p>
                    <p>Normal</p>
                    <p>Bom</p>
                    <p>Muito Bom</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo3" class="inputs"  maxlength="255"></textarea>
            <h5>A turma procura os horários de atendimento disponibilizados pelos professores, para sanar dúvidas com relação as dificuldades nos conteúdos apresentados?</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor4">
                    <input type="radio" value="2" name="valor4">
                    <input type="radio" value="3" name="valor4">
                </div>
                <div class="flex-row-space texts">
                    <p>Não</p>
                    <p>Raramente</p>
                    <p>Sim</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo4" class="inputs"  maxlength="255"></textarea>
            <h5>Como a turma avalia os serviços prestados dentro do IFSUL (recepção, atendimento de setores, limpeza, etc.):</h5> 
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor5">
                    <input type="radio" value="2" name="valor5">
                    <input type="radio" value="3" name="valor5">
                    <input type="radio" value="4" name="valor5">
                    <input type="radio" value="5" name="valor5">
                </div>
                <div class="flex-row-space texts">
                    <p>Muito Ruim</p>
                    <p>Ruim</p>
                    <p>Normal</p>
                    <p>Bom</p>
                    <p>Muito Bom</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo5" class="inputs"  maxlength="255"></textarea>
            <h5>Relação turma/professores e professores/turma:</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor6">
                    <input type="radio" value="2" name="valor6">
                    <input type="radio" value="3" name="valor6">
                    <input type="radio" value="4" name="valor6">
                    <input type="radio" value="5" name="valor6">
                </div>
                <div class="flex-row-space texts">
                    <p>Muito Ruim</p>
                    <p>Ruim</p>
                    <p>Normal</p>
                    <p>Bom</p>
                    <p>Muito Bom</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo6" class="inputs"  maxlength="255"></textarea>
            <h5>Relacionamento entre os colegas da turma:</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="1" name="valor7">
                    <input type="radio" value="2" name="valor7">
                    <input type="radio" value="3" name="valor7">
                    <input type="radio" value="4" name="valor7">
                    <input type="radio" value="5" name="valor7">
                </div>
                <div class="flex-row-space texts">
                    <p>Muito Ruim</p>
                    <p>Ruim</p>
                    <p>Normal</p>
                    <p>Bom</p>
                    <p>Muito Bom</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo7" class="inputs"  maxlength="255"></textarea>
            <h5>Podemos ponderar que a turma é um território livre de racismo e homofobia? São inclusivos, ecologicamente sustentáveis e respeitam a diversidade?</h5>
            <div class="flex-row radios">
                <div class="flex-row radios-sub">
                    <input type="radio" value="0" name="valor8">
                    <input type="radio" value="1" name="valor8">
                </div>
                <div class="flex-row-space texts">
                    <p>Sim</p>
                    <p>Não</p>
                </div>            
            </div>
            <p>Motivo</p>
            <textarea name="motivo8" class="inputs"  maxlength="255"></textarea>
            <p>Nome dos Participantes: </p>
            <textarea name="Participantes" class="inputs"  maxlength="255"></textarea>
            <button>Enviar Formulário</button>
        </form>
    </main>
    <footer class="flex-row-space">
        <img src="../imagens/logofooter.svg" width="80">
        <p>Site experimental criado para o CodeDay 2024</p>
    </footer>    
</body>
</html>
