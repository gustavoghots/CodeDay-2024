<?php

include_once "documento.class.php"; 

class Resposta {
    private $id_resposta;
    private $valor;
    private $motivo;
    private $id_documento;
    private $id_pergunta;


    public function getId() {
        return $this->id_resposta;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getMotivo() {
        return $this->motivo;
    }

    public function getIdDocumento() {
        return $this->id_documento;
    }

    public function getIdPergunta() {
        return $this->id_pergunta;
    }

    public function setId($id) {
        $this->id_resposta = $id;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    public function setIdDocumento($id_documento) {
        $this->id_documento = $id_documento;
    }

    public function setIdPergunta($id_pergunta) {
        $this->id_pergunta = $id_pergunta;
    }
}

?>
