<?php


include_once "disciplina.class.php"; 
include_once "curso.class.php"; 
include_once "professor.class.php"; 
include_once "documento.class.php";

class DisciplinaCurso {
	
    private $id_disciplina;
    private $id_curso;
    private $id_professor;
    private $id_documento;

    public function getIdDisciplina() {
        return $this->id_disciplina;
    }

    public function getIdCurso() {
        return $this->id_curso;
    }

    public function getIdProfessor() {
        return $this->id_professor;
    }

    public function getIdDocumento() {
        return $this->id_documento;
    }




    public function setIdDisciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

    public function setIdCurso($id_curso) {
        $this->id_curso = $id_curso;
    }

    public function setIdProfessor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function setIdDocumento($id_documento) {
        $this->id_documento = $id_documento;
    }
}

?>
