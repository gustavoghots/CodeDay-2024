<?php
include_once "usuario.class.php";

class usuarioDAO{

    public function __construct(){
        $this->conexao = 
        new PDO("mysql:host=localhost; dbname=conselho", 
        "root", "");
    }

    public function login(Usuario $user) {
        $sql = $this->conexao->prepare("SELECT * FROM usuario WHERE login = :login");
        $sql->bindValue(":login", $user->getLogin());
        $sql->execute();
        $query = $sql->fetch();
        
        if ($sql->rowCount() == 1) {
            // password verify ja utiliza um sistema de hash aparentemente
            if ($user->getSenha() == $query['senha']) {
                return $query; 
            } else {
                return 2; 
            }
        } else {
            return 3; 
        }
    }

    public function lista($id) {
        $sql = $this->conexao->prepare("SELECT * FROM usuario WHERE idusuario = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }
    
}
?>