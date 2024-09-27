<?php

class Aviso {
    private $id;
    private $id_professor;
    private $id_usuario;

   
    public function getId() {
        return $this->id;
    }

    public function getIdProfessor() {
        return $this->id_professor;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdProfessor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
}

?>
