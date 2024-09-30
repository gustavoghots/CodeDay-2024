<?php

session_start();
include_once "../../class/DAO/documento.DAO.class.php";
include_once "../../class/DAO/usuario.DAO.class.php";
include_once "../../class/professor.class.php";

$objDoc = new Documento_DAO();
$query = $objDoc->listarDocumentosProfessor($_SESSION['idUsuario']);


$nome = $_POST['nome'];
$login = $_POST['login'];
$senha  = $_POST['senha'];


$objusu = new Professor();

$objusu->setNome($nome);
$objusu->setLogin($login);
$objusu->setSenha($senha);
$objusu->setProfessor(1);


$objusuDAO = new UsuarioDAO();
$retorno = $objusuDAO->inserirP($objusu);
if($retorno)
    header("location:index.php?Ok");
else
    header("location:?index.php?error");

?>