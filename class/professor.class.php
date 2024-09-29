<?php

include_once "usuario.class.php"; 

class Professor extends Usuario {
	
    private $coordenador;


    public function getCoordenador() {
        return $this->coordenador;
    }

    public function setCoordenador($coordenador) {
        $this->coordenador = $coordenador;
    }
}

?>
