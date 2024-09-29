<?php
include_once "usuario.class.php";

class usuarioDAO{
    private $conexao = null;

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

    public function cargo($id) {
        $sql = $this->conexao->prepare("SELECT * FROM usuario WHERE idusuario = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $retorno = $sql->fetch();
        if($retorno['professor']==true){
            $sql = $this->conexao->prepare("SELECT * FROM professor WHERE Usuario_idusuario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            $retorno = $sql->fetch();
            if(is_null($retorno)){
                return 'p';
            }else{
                return $retorno['coordenador'];
            }
        }else{
            return 'a';
        }
    }
    
}
