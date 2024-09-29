<?php
session_start();
include_once "../class/usuario.DAO.class.php";
include_once "../class/usuario.class.php";

$matricula = $_POST['matricula'];
$senha = $_POST['senha'];

$objUsuario = new Usuario();
$objUsuario->setLogin($matricula);
$objUsuario->setSenha($senha);

$objUsuarioDAO = new usuarioDAO();
$retorno = $objUsuarioDAO->login($objUsuario);

if (is_array($retorno)) {
    $_SESSION['idUsuario'] = $retorno['idusuario'];
    $cargo = $objUsuarioDAO->cargo($retorno['idusuario']);
    switch ($cargo){
        case 'a':
            header("Location: ../aluno/formulario.php");
            exit();
        case 'p':
            header(("Location: ../professor/index.php"));
            exit();
        default:
            header(("Location: ../coordenador/index.php"));
            exit();
    }
 
} else {
    switch ($retorno) {
        case 2:
            header("Location: login.php?error=senha");
            exit();
        case 3:
            header("Location: login.php?error=login");
            exit();
        default:
            header("Location: login.php?error=erro");
            exit();
    }
}
?>
