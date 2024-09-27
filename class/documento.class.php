<?php

include_once "aluno.class.php"; 

class Documento {
    private $id;
    private $prazo;
    private $participantes;
    private $id_aluno;
    private $conselheiro;      
    private $representantes;   

    public function getId() {
        return $this->id;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function getParticipantes() {
        return $this->participantes;
    }

    public function getIdAluno() {
        return $this->id_aluno;
    }

    public function getConselheiro() {
        return $this->conselheiro;
    }

    public function getRepresentantes() {
        return $this->representantes;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
    }

    public function setParticipantes(array $participantes) {
        $this->participantes = $participantes;
    }

    public function setIdAluno($id_aluno) {
        $this->id_aluno = $id_aluno;
    }

    public function setConselheiro($conselheiro) {
        $this->conselheiro = $conselheiro;
    }

    public function setRepresentantes(array $representantes) {
        $this->representantes = $representantes;
    }
}

?>

