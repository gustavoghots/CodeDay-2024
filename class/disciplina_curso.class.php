<?php


include_once "disciplina.class.php"; 
include_once "curso.class.php"; 
include_once "professor.class.php"; 
include_once "grade.class.php";

class DisciplinaCurso {
	
    private $id_disciplina;
    private $id_curso;
    private $id_professor;
    private $id_grade;

    public function getIdDisciplina() {
        return $this->id_disciplina;
    }

    public function getIdCurso() {
        return $this->id_curso;
    }

    public function getIdProfessor() {
        return $this->id_professor;
    }

    public function getIdGrade() {
        return $this->id_grade;
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

    public function setIdGrade($id_grade) {
        $this->id_grade = $id_grade;
    }
}

?>
