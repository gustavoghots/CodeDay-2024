<?php

session_start();
include_once "../../class/DAO/documento.DAO.class.php";
include_once "../../class/DAO/usuario.DAO.class.php";
include_once "../../class/usuario.class.php";
include_once "../../class/aluno.class.php"; 

$objDoc = new Documento_DAO();
$query = $objDoc->listarDocumentosProfessor($_SESSION['idUsuario']);

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$matricula = $_POST['matricula'];
$turma = $_POST['turma'];

$objAluno = new Aluno();

$objAluno->setNome($nome);
$objAluno->setLogin($login);
$objAluno->setSenha($senha);
$objAluno->setProfessor(0);
$objAluno->setMatricula($matricula);
$objAluno->setTurma($turma);

$objusuDAO = new UsuarioDAO();
$retorno = $objusuDAO->inserirAluno($objAluno); 

if ($retorno) {
    header("location:index.php?Ok");
} else {
    header("location:?error");
}

?>
