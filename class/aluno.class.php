<?php

include_once "usuario.class.php";

class Aluno extends Usuario {
	
    private $matricula;
    private $turma;

    public function getMatricula() {
        return $this->matricula;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setTurma($turma) {
        $this->turma = $turma;
    }
}


?>
