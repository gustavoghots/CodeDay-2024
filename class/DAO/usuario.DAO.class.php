<?php
@include_once "../usuario.class.php";

class usuarioDAO{
    private $conexao;

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
            print_r($retorno);
            if(is_null($retorno['coordenador'])){
                return 'p';
            }else{
                return $retorno['coordenador'];
            }
        }else{
            return 'a';
        }
    }

    public function listarProfs() {
        $sql = $this->conexao->prepare("SELECT * FROM usuario INNER JOIN professor ON usuario.idusuario = professor.Usuario_idusuario WHERE usuario.professor = 1");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function retornaCoord() {
        $sql = $this->conexao->prepare("SELECT * FROM usuario INNER JOIN professor ON usuario.idusuario = professor.Usuario_idusuario WHERE usuario.professor = 1 AND professor.coordenador = 'i' ");
        $sql->execute();
        return $sql->fetch();
    }

    public function renovarCoord($idCoord,$idProf) {
        $sql = $this->conexao->prepare("UPDATE professor SET coordenador = 'i' WHERE Usuario_idusuario = :idProf");
        $sql->bindValue(":idProf",$idProf);
        $sql->execute();
        $sql = $this->conexao->prepare("UPDATE professor SET coordenador = null WHERE Usuario_idusuario = :idCoord");
        $sql->bindValue(":idCoord",$idCoord);
        return $sql->execute();
    }

    public function inserirP(Usuario $user) {
        
        $sql = $this->conexao->prepare("INSERT INTO usuario (login, senha, professor, nome) VALUES (:login, :senha, :professor, :nome)");
        $sql->bindValue(":login", $user->getLogin());
        $sql->bindValue(":senha", $user->getSenha()); 
        $sql->bindValue(":professor", $user->getProfessor());
        $sql->bindValue(":nome", $user->getNome());
        $sql->execute();
        
        
        $usuarioId = $this->conexao->lastInsertId();
        
        
        $sql = $this->conexao->prepare("INSERT INTO professor (Usuario_idusuario, coordenador) VALUES (:usuarioId, :coordenador)");
        $sql->bindValue(":usuarioId", $usuarioId);
        $sql->bindValue(":coordenador", $user->getCoordenador());
        
        return $sql->execute();
    }

    public function inserirAluno(Usuario $aluno) {
        $sql = $this->conexao->prepare("INSERT INTO usuario (login, senha, professor, nome) VALUES (:login, :senha, :professor, :nome)");
        $sql->bindValue(":login", $aluno->getLogin()); 
        $sql->bindValue(":senha", $aluno->getSenha()); 
        $sql->bindValue(":professor", 0); 
        $sql->bindValue(":nome", $aluno->getNome());
        $sql->execute();
        
        $usuarioId = $this->conexao->lastInsertId();
        $sql = $this->conexao->prepare("INSERT INTO aluno (Usuario_idusuario, matricula, Turma) VALUES (:usuarioId, :matricula, :turma)");
        $sql->bindValue(":usuarioId", $usuarioId); 
        $sql->bindValue(":matricula", $aluno->getMatricula());
        $sql->bindValue(":turma", $aluno->getTurma()); 
        
        return $sql->execute();
    }
    
    
}
