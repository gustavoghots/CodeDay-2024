<?php

include_once "aluno.class.php";
include_once "grade.class.php";

class Documento
{
    private $id;
    private $prazo_A;
    private $prazo_P;
    private $participantes;
    private $id_aluno;
    private $conselheiro;
    private $representantes;
    private $id_grade_curricular;
    private $trimestre;
    private $respostas; // vai vir uma  array

    public function getId()
    {
        return $this->id;
    }

    public function getPrazo_A()
    {
        return $this->prazo_A;
    }
    public function getPrazo_P()
    {
        return $this->prazo_P;
    }

    public function getParticipantes()
    {
        return $this->participantes;
    }

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function getConselheiro()
    {
        return $this->conselheiro;
    }

    public function getRepresentantes()
    {
        return $this->representantes;
    }

    public function getIdGradeCurricular()
    {
        return $this->id_grade_curricular;
    }

    public function getTrimestre()
    {
        return $this->trimestre;
    }

    public function getRespostas()
    {
        return $this->respostas;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPrazo_A($prazo_A)
    {
        $this->prazo_A = $prazo_A;
    }
    public function setPrazo_P($prazo_P)
    {
        $this->prazo_P = $prazo_P;
    }

    public function setParticipantes($participantes)
    {
        $this->participantes = $participantes;
    }

    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    public function setConselheiro($conselheiro)
    {
        $this->conselheiro = $conselheiro;
    }

    public function setRepresentantes($representantes)
    {
        $this->representantes = $representantes;
    }

    public function setIdGradeCurricular($id_grade_curricular)
    {
        $this->id_grade_curricular = $id_grade_curricular;
    }

    public function setTrimestre($trimestre)
    {
        $this->trimestre = $trimestre;
    }

    public function setRespostas($respostas)
    {
        $this->respostas = $respostas;
    }
}
