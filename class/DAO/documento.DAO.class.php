<?php
    class Documento_DAO {
        private $conexao;

        public function __construct(){
            $this->conexao = 
            new PDO("mysql:host=localhost; dbname=conselho", 
            "root", "");
        }

        public function documentoValidoAluno($idUsuario){
            $sql = $this->conexao->prepare("SELECT idDocumento 
                                                FROM documento d 
                                                WHERE d.prazo > now() 
                                                AND d.Aluno_Usuario_idusuario = :idUsuario");
            $sql->bindValue(":idUsuario", $idUsuario);
            $sql->execute();
            return $sql->fetch();
        }

        public function Dados($idDocumento){
            $sql = $this->conexao->prepare("SELECT r.questao, r.valor, r.texto, d.representantes, d.conselheiro, d.participantes, d.Aluno_Usuario_idusuario
                                                FROM documento d INNER JOIN resposta r
	                                                ON d.idDocumento = r.Documento_idDocumento
                                                WHERE d.idDocumento = :idDocumento");
            $sql->bindValue(":idDocumento", $idDocumento);
            $sql->execute();
            return $sql->fetchAll();
        }
    }
?>