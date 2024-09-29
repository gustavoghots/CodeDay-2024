<?php

class Usuario {
    private $idusuario;
    private $login;
    private $senha;
    private $professor;
    private $nome;


    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getProfessor() {
        return $this->professor;
    }

    public function getNome() {
        return $this->nome;
    }


    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setProfessor($professor) {
        $this->professor = $professor;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}

?>
