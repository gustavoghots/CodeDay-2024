<?php
@include_once '../documento.class.php';
class Documento_DAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao =
            new PDO(
                "mysql:host=localhost; dbname=conselho",
                "root",
                ""
            );
    }

    public function documentoValidoAluno($idUsuario)
    {
        $sql = $this->conexao->prepare("SELECT idDocumento 
                                                FROM documento d 
                                                WHERE d.prazo_A > now() 
                                                AND d.Aluno_Usuario_idusuario = :idUsuario
                                                ORDER BY trimestre
                                                LIMIT 1");
        $sql->bindValue(":idUsuario", $idUsuario);
        $sql->execute();
        return $sql->fetch();
    }

    public function Dados($idDocumento)
    {
        $sql = $this->conexao->prepare("SELECT r.questao, r.valor, r.texto, d.representantes, d.conselheiro, d.participantes, d.Aluno_Usuario_idusuario
                                                FROM documento d INNER JOIN resposta r
	                                                ON d.idDocumento = r.Documento_idDocumento
                                                WHERE d.idDocumento = :idDocumento");
        $sql->bindValue(":idDocumento", $idDocumento);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function listarDocumentosProfessor($idUsuario)
    {
        $sql = $this->conexao->prepare("SELECT di.nome as disciplina, a.turma, d.Aluno_Usuario_idusuario, d.trimestre, d.prazo_A, d.prazo_P, d.idDocumento
                                            FROM aluno a INNER JOIN documento d
                                                ON a.Usuario_idusuario = d.Aluno_Usuario_idusuario
                                                INNER JOIN disciplina_has_curso dc
                                                    ON d.Grade_curricular_anual_idGrade = dc.Grade_curricular_anual_idGrade
                                                    INNER JOIN disciplina di
                                                        ON dc.Disciplina_idDisciplina = di.idDisciplina
                                            WHERE dc.Professor_Usuario_idusuario = :idUsuario
                                            ORDER BY d.trimestre, a.turma, d.Prazo_A asc");
        $sql->bindValue(":idUsuario", $idUsuario);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AtualizarForm(Documento $objDocumento)
    {
        // Iniciar a transação
        $this->conexao->beginTransaction();

        try {
            // Atualizar o documento
            $sql = $this->conexao->prepare("UPDATE documento
                                            SET representantes = :representantes,
                                                conselheiro = :conselheiro,
                                                participantes = :participantes
                                            WHERE idDocumento = :idDocumento;");

            $sql->bindValue(":representantes", $objDocumento->getRepresentantes());
            $sql->bindValue(":conselheiro", $objDocumento->getConselheiro());
            $sql->bindValue(":participantes", $objDocumento->getParticipantes());
            $sql->bindValue(":idDocumento", $objDocumento->getId());
            $sql->execute();

            // Exibe mensagem de atualização do documento
            echo "<br>Documento atualizado: ID " . $objDocumento->getId() . "<br>";

            // Atualizar as respostas
            $respostas = $objDocumento->getRespostas();

            if (!empty($respostas)) {
                $caseValor = '';
                $caseTexto = '';
                $questoes = [];

                foreach ($respostas as $resposta) {
                    if (isset($resposta['questao'], $resposta['valor'], $resposta['texto'])) {
                        $questao = (int)$resposta['questao'];
                        $valor = $resposta['valor'];
                        $texto = $resposta['texto'];

                        $caseValor .= "WHEN questao = $questao THEN '$valor' ";
                        $caseTexto .= "WHEN questao = $questao THEN '$texto' ";
                        $questoes[] = $questao;
                    }
                }

                // Montar a query para atualizar respostas
                $sql = $this->conexao->prepare("UPDATE resposta
                                                SET valor = CASE 
                                                    " . $caseValor . "
                                                    END,
                                                    texto = CASE 
                                                    " . $caseTexto . "
                                                    END
                                                WHERE questao IN (" . implode(',', array_unique($questoes)) . ") 
                                                AND Documento_idDocumento = :idDocumento;");

                $sql->bindValue(":idDocumento", $objDocumento->getId());
                $sql->execute();

                // Exibe mensagem de atualização das respostas
                echo "Respostas atualizadas para o documento ID " . $objDocumento->getId() . "<br>";
            }

            // Confirmar a transação
            $this->conexao->commit();
            echo "Transação confirmada para o documento ID " . $objDocumento->getId() . "<br>";
        } catch (Exception $e) {
            // Reverter em caso de erro
            $this->conexao->rollBack();
            echo "Erro na atualização do documento ID " . $objDocumento->getId() . ": " . $e->getMessage() . "<br>";
            throw $e; // Lançar a exceção para tratamento
        }
    }

    public function getQuestao($id) {
        $sql = $this->conexao->prepare("SELECT * FROM resposta WHERE idResposta = :id"); // Ajuste aqui
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function atualizarQuestao($id, $texto) {
        $sql = $this->conexao->prepare("UPDATE resposta SET texto = :texto WHERE idResposta = :id"); // Ajuste aqui
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
}
